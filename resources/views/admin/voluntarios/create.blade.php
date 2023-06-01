<x-app-layout>
    <x-slot name="header">
        Adicionar Voluntário
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('voluntarios.store') }}"
              method="post">
            @csrf

            <x-form.input label="Nome"
                          name="nome"
                          maxlength="100"
                          :required="true"
                          :observacoes='["Máximo de 100 caracteres."]' />

            <x-form.select label="Sexo"
                           name="sexo"
                           size="md:max-w-[180px]"
                           :blank="true"
                           :required="true"
                           :options='[["id" => "M", "descricao" => "Masculino"], ["id" => "F", "descricao" => "Feminino" ]]'
                           :observacoes='["Esse campo será utilizado para o voluntariado em funções específicas."]' />

            <x-form.select label="Professor EBD"
                           name="professor_ebd"
                           size="md:max-w-[180px]"
                           :blank="true"
                           :required="true"
                           :options='[["id" => "1", "descricao" => "Sim"], ["id" => "0", "descricao" => "Não" ]]'
                           :observacoes='["Esse campo define se o voluntário participará da escala dos professores da EBD."]' />

            <x-form.checkboxes label="Disponibilidade"
                               name="disponibilidades[]"
                               errorName="disponibilidades"
                               :required="true"
                               :items="$disponibilidades"
                               :observacoes='["Selecione os dias que o voluntário está disponível."]' />

            <x-form.textarea label="Observações"
                             name="observacao"
                             :observacoes='[
                                "Esse campo serve para informar as particularidades de cada voluntário.",
                                "Máximo de 1000 caracteres."
                             ]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('voluntarios')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
