<x-app-layout>
    <x-slot name="header">
        Editar Permissão
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('permissoes.update', $data) }}"
              method="post">
            @method('PUT')
            @csrf

            <x-form.input label="Nome"
                          name="nome"
                          maxlength="50"
                          value="{{ old('nome') ?? $data->nome }}"
                          :required="true"
                          :observacoes='["Máximo de 50 caracteres."]' />

            <x-form.input label="Descrição"
                          name="descricao"
                          maxlength="150"
                          value="{{ old('descricao') ?? $data->descricao }}"
                          :required="true"
                          :observacoes='["Máximo de 150 caracteres."]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('permissoes')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
