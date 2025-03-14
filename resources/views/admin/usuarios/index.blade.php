<x-app-layout>
    <x-slot name="header">
        Usuários
    </x-slot>

    <section>
        <div class="h-16 mb-4 bg-white rounded-md flex items-center justify-center dark:bg-[#252c47]">
            <div class="text-sm">
                @can('adm-adicionar-usuario')
                    <x-button.link title="Adicionar Usuário" :route="route('usuarios.create')"></x-button.link>
                @endcan
            </div>
        </div>
        <div class="grid md:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4 gap-2 md:gap-4">
            @foreach($usuarios as $usuario)
                <div class="flex flex-row gap-2 items-center bg-white p-3 rounded-sm dark:bg-[#252c47]">
                    <div class="flex-1">
                        <h3 class="text-gray-700 dark:text-white">
                            {{ $usuario->name }}
                        </h3>
                        <p class="text-sm font-thin text-gray-500 dark:text-[#d0d9e6] break-all line-clamp-1">
                            {{ $usuario->email }}
                        </p>
                    </div>
                    @if($usuario->email !== 'jeffersonassilva@gmail.com')
                        @canany(['adm-resetar-senha-usuario', 'adm-editar-usuario', 'adm-excluir-usuario'])
                            <div class="text-sm flex gap-2 md:gap-2">
                                @can('adm-resetar-senha-usuario')
                                    <x-button.reset title=""
                                                    icon="lock-open-outline"
                                                    class="text-lg py-3"
                                                    :route="route('configuracoes.reset', $usuario)"
                                                    formId="form-resetar-senha-usuario-{{ $usuario->id }}">
                                    </x-button.reset>
                                @endcan

                                @can('adm-editar-usuario')
                                    <x-button.link title=""
                                                   class="text-lg py-3"
                                                   icon="create-outline"
                                                   :lighter="true"
                                                   :route="route('usuarios.edit', $usuario)">
                                    </x-button.link>
                                @endcan

                                @can('adm-excluir-usuario')
                                    <x-button.delete title=""
                                                     icon="trash-outline"
                                                     class="text-lg text-red-500 py-3"
                                                     :route="route('usuarios.destroy', $usuario)"
                                                     formId="form-excluir-usuario-{{ $usuario->id }}">
                                    </x-button.delete>
                                @endcan
                            </div>
                        @endcanany
                    @endif
                </div>
            @endforeach
        </div>
    </section>

    <x-dialog.confirm></x-dialog.confirm>

    <x-dialog.generic-confirm
        id="modal_resetar_senha"
        message="Deseja realmente resetar a senha do usuário?"
        confirmButtonTitle="Pode resetar"
        cancelButtonTitle="Cancelar"
    ></x-dialog.generic-confirm>

    <form class="form-horizontal"
        id="submit-form-resetar-senha-usuario"
        role="form"
        action="{{ route("configuracoes.reset") }}"
        method="POST">
        @csrf
    </form>

    <script type="text/javascript">
        function modalConfirmAction(modalId) {
            $('#' + modalId).hide();
            $('#submit-form-resetar-senha-usuario').submit();
        }

        function modalCancelAction(modalId) {
            $('#' + modalId).hide();
        }

        function modalCloseAction(modalId) {
            $('#' + modalId).hide();
        }

        $(document).ready(function () {
            $('.btn-dialog-reset-senha-open').on('click', function () {
                let userId = $(this).attr('data-form-reference').replace('form-resetar-senha-usuario-', '');
                $('#modal_resetar_senha').show();
                $('#submit-form-resetar-senha-usuario').append('<input hidden name="userId" value="' + userId + '" />');
            });
        });
    </script>
</x-app-layout>
