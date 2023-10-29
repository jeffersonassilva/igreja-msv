<x-app-layout>
    <x-slot name="header">
        Adicionar Permissão
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('permissoes.store') }}"
              method="post">
            @csrf

            <x-form.input label="Nome"
                          name="nome"
                          maxlength="50"
                          :required="true"
                          :observacoes='["Máximo de 50 caracteres."]' />

            <x-form.input label="Descrição"
                          name="descricao"
                          maxlength="150"
                          :required="true"
                          :observacoes='["Máximo de 150 caracteres."]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('permissoes')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
