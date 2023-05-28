<x-app-layout>
    <x-slot name="header">
        Adicionar Evento
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('eventos.store') }}"
              method="post">
            @csrf

            <x-form.input label="Descrição"
                          name="descricao"
                          maxlength="150"
                          :required="true"
                          :observacoes='["Máximo de 150 caracteres."]' />

            <x-form.select label="Situação"
                           name="situacao"
                           size="md:max-w-[150px]"
                           :required="true"
                           :options='[["id" => "1", "descricao" => "Ativo"], ["id" => "0", "descricao" => "Inativo" ]]'
                           :observacoes='[
                                "Por padrão, todo evento novo é cadastrado como ativo.",
                                "Se a situação for <span class=\"text-blue-400\">Inativo</span>, as escalas relacionadas a este evento não serão exibidas."
                           ]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('eventos')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
