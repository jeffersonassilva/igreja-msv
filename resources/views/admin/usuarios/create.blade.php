<x-app-layout>
    <x-slot name="header">
        Adicionar Usuário
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('usuarios.store') }}"
              method="post" enctype="multipart/form-data">
            @csrf

            <x-form.input label="Nome"
                          name="name"
                          maxlength="255"
                          :required="true"
                          :observacoes='["Máximo de 255 caracteres."]' />

            <x-form.input label="E-mail"
                          name="email"
                          maxlength="255"
                          :required="true"
                          :observacoes='["Máximo de 255 caracteres."]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('usuarios')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
