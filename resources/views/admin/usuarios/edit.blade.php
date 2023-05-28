<x-app-layout>
    <x-slot name="header">
        Editar Usuário
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('usuarios.update', $data) }}"
              method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <x-form.input label="Nome"
                          name="name"
                          maxlength="255"
                          :required="true" value="{{ old('name') ?? $data->name }}"
                          :observacoes='["Máximo de 255 caracteres."]' />

            <x-form.input label="E-mail"
                          name="email"
                          maxlength="255"
                          :required="true"
                          value="{{ old('email') ?? $data->email }}"
                          :observacoes='["Máximo de 255 caracteres."]' />

            @can('adm-editar-perfil')
            <x-form.checkboxes label="Perfis"
                               name="roles[]"
                               :items="$perfis"
                               :observacoes='["Selecione os perfis que o usuário possui."]' />
            @endcan

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('usuarios')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
