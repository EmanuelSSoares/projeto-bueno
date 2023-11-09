<x-app-layout>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">Editar Usuário</div>
            <div class="card-body">
                <form action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $user->name }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="{{ $user->email }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background: #0275d8">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
