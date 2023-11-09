<section class="space-y-6">
    <header class="text-left">
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Excluir Conta') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Uma vez que sua conta for excluída, todos os recursos e dados associados serão permanentemente apagados. Antes de excluir sua conta, por favor, faça o download de qualquer dado ou informação que deseja manter.') }}
        </p>
    </header>

    <div class="text-left">
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirm-user-deletion"
            style="background: #d73c36;">
            {{ __('Excluir Conta') }}
        </button>
    </div>

    <div class="modal fade" id="confirm-user-deletion" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="{{ route('profile.destroy') }}" class="modal-content">
                @csrf
                @method('delete')

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        {{ __('Tem certeza de que deseja excluir sua conta?') }}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Uma vez que sua conta for excluída, todos os recursos e dados associados serão permanentemente apagados. Por favor, insira sua senha para confirmar que deseja excluir permanentemente sua conta.') }}
                    </p>

                    <div class="form-group mt-4">
                        <label for="password" class="sr-only">{{ __('Senha') }}</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="{{ __('Senha') }}">
                        <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Cancelar') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('Excluir Conta') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>
