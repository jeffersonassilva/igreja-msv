<x-app-layout>
    <x-slot name="header">
        Editar Evento
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('eventos.update', $data) }}"
              method="post">
            @method('PUT')
            @csrf

            <x-form.input label="Descrição"
                          name="descricao"
                          maxlength="150"
                          value="{{ old('descricao') ?? $data->descricao }}"
                          :required="true"
                          :observacoes='["Máximo de 150 caracteres."]' />

            <x-form.select label="Situação"
                           name="situacao"
                           size="md:max-w-[150px]"
                           :reference="$data->situacao"
                           :required="true"
                           :options='[["id" => 1, "descricao" => "Ativo"], ["id" => 0, "descricao" => "Inativo" ]]'
                           :observacoes='[
                                "Por padrão, todo evento novo é cadastrado como ativo.",
                                "Se a situação for <span class=\"text-blue-400\">Inativo</span>, as escalas relacionadas a este evento não serão exibidas."
                           ]' />

            <x-form.input label="Quantidade de Voluntários"
                          name="qntd_voluntarios"
                          type="number"
                          maxlength="150"
                          pattern="[0-9]*"
                          size="max-w-[75px]"
                          value="{{ old('qntd_voluntarios') ?? $data->qntd_voluntarios }}"
                          :observacoes='["Informe a quantidade necessária de voluntários para este evento."]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('eventos')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
