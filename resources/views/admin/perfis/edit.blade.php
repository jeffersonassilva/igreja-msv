<x-app-layout>
    <x-slot name="header">
        Editar Perfil
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('perfis.update', $data) }}"
              method="post">
            @method('PUT')
            @csrf

            <x-form.input label="Descrição"
                          name="descricao"
                          maxlength="100"
                          :required="true"
                          value="{{ old('descricao') ?? $data->descricao }}"
                          :observacoes='["Máximo de 100 caracteres."]' />

            <x-form.checkboxes label="Permissões"
                               name="permissions[]"
                               :items="$permissoes"
                               :observacoes='["Selecione todas as permissões que o perfil possui."]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('perfis')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
