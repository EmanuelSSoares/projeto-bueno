<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AccessLevel;
use App\Notifications\NovoUsuarioCriado;

class UserController extends Controller
{
    // Método para exibir a lista de usuários
    public function index()
    {
        $users = User::all();
        return view('admin.index', compact('users'));
    }

    // Método para exibir o formulário de criação de usuário
    public function create()
    {
        return view('admin.create');
    }

    // Método para salvar um novo usuário
    public function store(Request $request)
{
    // Validação dos dados
    $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required|min:6',
        'access_level' => 'required|in:admin,common', // Garante que o nível de acesso seja válido
    ]);

    // Criação do usuário
    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password')),
    ]);

    // Associação do nível de acesso ao usuário
    $accessLevel = AccessLevel::where('name', $request->input('access_level'))->first();
    if ($accessLevel) {
        $user->accessLevels()->attach($accessLevel->id);
    }

    // Redirecionamento ou retorno de uma resposta JSON
    return redirect()->route('users.index')->with('success', 'Usuário criado com sucesso!');
}

    // Métodos para editar e atualizar um usuário
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
        ]);

        // Atualização do usuário
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ]);

        return redirect()->route('users.index')->with('success', 'Usuário atualizado com sucesso!');
    }

    // Método para deletar um usuário
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        // Excluir os registros relacionados em user_access_levels
        $user->accessLevels()->detach();

        // Agora é seguro excluir o usuário
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Usuário deletado com sucesso!');
    }
}
