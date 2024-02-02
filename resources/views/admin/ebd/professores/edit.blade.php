<x-app-layout>
    <x-slot name="header">
        Editar Professor
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('professores.update', $data) }}"
              method="post">
            @method('PUT')
            @csrf

            <x-form.input label="Nome"
                          name="nome"
                          maxlength="255"
                          :required="true"
                          value="{{ old('nome') ?? $data->nome }}"
                          :observacoes='["Máximo de 255 caracteres."]' />

            <x-form.select label="Situação"
                           name="situacao"
                           size="md:max-w-[150px]"
                           :reference="$data->situacao"
                           :required="true"
                           :options='[["id" => 1, "descricao" => "Ativo"], ["id" => 0, "descricao" => "Inativo" ]]'
                           :observacoes='[
                                "Por padrão, todo professor novo é cadastrado como ativo.",
                                "Se a situação for <span class=\"text-blue-400\">Inativo</span>, o professor não aparecerá como opção para lecionar."
                           ]' />

            <x-form.checkboxes label="Classes"
                               name="classes[]"
                               :items="$classes"
                               :observacoes='["Selecione as classes que o professor leciona."]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('professores')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
