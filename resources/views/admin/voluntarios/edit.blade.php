<x-app-layout>
    <x-slot name="header">
        Editar Voluntário
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('voluntarios.update', $data) }}"
              method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <x-form.input label="Nome"
                          name="nome"
                          maxlength="100"
                          value="{{ old('nome') ?? $data->nome }}"
                          :required="true"
                          :observacoes='["Máximo de 100 caracteres."]' />

            <x-form.select label="Sexo"
                           name="sexo"
                           size="md:max-w-[180px]"
                           :required="true"
                           :reference="$data->sexo"
                           :options='[["id" => "M", "descricao" => "Masculino"], ["id" => "F", "descricao" => "Feminino" ]]'
                           :observacoes='["Esse campo será utilizado para o voluntariado em funções específicas."]' />

            <x-form.select label="Professor EBD"
                           name="professor_ebd"
                           size="md:max-w-[180px]"
                           :required="true"
                           :reference="$data->professor_ebd"
                           :options='[["id" => "1", "descricao" => "Sim"], ["id" => "0", "descricao" => "Não" ]]'
                           :observacoes='["Esse campo define se o voluntário participará da escala dos professores da EBD."]' />

            <x-form.checkboxes label="Disponibilidade"
                               name="disponibilidades[]"
                               errorName="disponibilidades"
                               :required="true"
                               :items="$disponibilidades"
                               :observacoes='["Selecione os dias que o voluntário está disponível."]' />

            <x-form.file label="Foto"
                          name="foto"
                          value="{{ old('foto') ?? $data->foto }}"
                         :observacoes='[
                            "O tamanho mínimo é de 240x240.",
                            "A imagem ideal é com a proporção 1/1 (formato quadrado).",
                            "Extensões válidas: jpg, jpeg e png."
                         ]' />

            <x-form.textarea label="Observações"
                             name="observacao"
                             value="{{ old('observacao') ?? $data->observacao }}"
                             :observacoes='[
                                "Esse campo serve para informar as particularidades de cada voluntário.",
                                "Máximo de 1000 caracteres."
                             ]' />

            <x-form.select label="Situação"
                           name="situacao"
                           size="md:max-w-[150px]"
                           :reference="$data->situacao"
                           :required="true"
                           :options='[["id" => 1, "descricao" => "Ativo"], ["id" => 0, "descricao" => "Inativo" ]]'
                           :observacoes='[
                                "Por padrão, todo voluntário novo é cadastrado como ativo.",
                                "Se a situação for <span class=\"text-blue-400\">Inativo</span>, o nome não aparecerá como opção na lista de voluntários."
                           ]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('voluntarios')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
