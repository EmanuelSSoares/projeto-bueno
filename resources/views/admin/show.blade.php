<x-app-layout>
    <div class="container mt-5">
        <h1>Detalhes do Usuário</h1>
        <p><strong>Nome:</strong> {{ $user->name }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
    </div>
</x-app-layout>
