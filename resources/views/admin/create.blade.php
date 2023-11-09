<x-app-layout>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">Criar Usuário</div>
            <div class="card-body">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nome:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="access_level" class="form-label">Nível de Acesso:</label>
                        <select class="form-select" id="access_level" name="access_level">
                            <option value="admin">Admin</option>
                            <option value="common">Comum</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary" style="background: #0275d8">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
