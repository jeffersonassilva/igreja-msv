<x-app-layout>
    <x-slot name="header">
        Configurações
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('configuracoes.update', $data) }}"
              method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <x-form.input label="Senha atual" name="current-password" type="password" maxlength="30" :required="true"
                          :observacoes='["Caso não saiba sua senha atual, favor entrar em contato com o administrador do sistema."]' />

            <x-form.input label="Nova senha" name="new-password" type="password" maxlength="30" :required="true"
                          :observacoes='[
                                "Mínimo de 8 caracteres",
                                "Sugerimos que você adicione letras, números e caracteres especiais para maior segurança."
                                ]' />

            <x-form.input label="Confirmar nova senha" name="new-password_confirmation" type="password" maxlength="30" :required="true"
                          :observacoes='["Deve ser a mesma senha utilizada no campo \"Nova senha\"."]' />

            <x-form.actions :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
