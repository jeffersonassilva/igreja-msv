<x-app-layout>
    <x-slot name="header">
        Adicionar Função
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('funcoes.store') }}"
              method="post">
            @csrf

            <x-form.input label="Abreviação"
                          name="abreviacao"
                          maxlength="3"
                          :required="true"
                          :observacoes='["Máximo de 3 caracteres."]' />

            <x-form.input label="Descrição"
                          name="descricao"
                          maxlength="50"
                          :required="true"
                          :observacoes='["Máximo de 50 caracteres."]' />

            <x-form.select label="Situação"
                           name="situacao"
                           size="md:max-w-[150px]"
                           :required="true"
                           :options='[["id" => "1", "descricao" => "Ativo"], ["id" => "0", "descricao" => "Inativo" ]]'
                           :observacoes='[
                                "Por padrão, toda função nova é cadastrada como ativo.",
                           ]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('funcoes')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
