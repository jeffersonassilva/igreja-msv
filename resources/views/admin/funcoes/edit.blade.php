<x-app-layout>
    <x-slot name="header">
        Editar Função
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('funcoes.update', $data) }}"
              method="post">
            @method('PUT')
            @csrf

            <x-form.input label="Abreviação"
                          name="abreviacao"
                          maxlength="3"
                          value="{{ old('abreviacao') ?? $data->abreviacao }}"
                          :required="true"
                          :observacoes='["Máximo de 3 caracteres."]' />

            <x-form.input label="Descrição"
                          name="descricao"
                          maxlength="50"
                          value="{{ old('descricao') ?? $data->descricao }}"
                          :required="true"
                          :observacoes='["Máximo de 50 caracteres."]' />

            <x-form.select label="Situação"
                           name="situacao"
                           size="md:max-w-[150px]"
                           :reference="$data->situacao"
                           :required="true"
                           :options='[["id" => 1, "descricao" => "Ativo"], ["id" => 0, "descricao" => "Inativo" ]]'
                           :observacoes='[
                                "Por padrão, toda função nova é cadastrada como ativo.",
                           ]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('funcoes')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
