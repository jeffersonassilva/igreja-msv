<x-app-layout>
    <x-slot name="header">
        Adicionar Data
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('calendario-fixo.store') }}"
              method="post">
            @csrf

            <x-form.input label="Título"
                          name="titulo"
                          maxlength="255"
                          :required="true"
                          :observacoes='["Máximo de 255 caracteres."]'/>

            <x-form.input label="Tema"
                          name="tema"
                          maxlength="255"
                          :required="false"
                          :observacoes='["Máximo de 255 caracteres."]'/>

            <x-form.input label="Local"
                          name="local"
                          maxlength="255"
                          :observacoes='[
                              "Máximo de 255 caracteres.",
                              "Informe o local da aula, se a mesma for presencial.",
                          ]'/>

            <x-form.input label="Link"
                          name="link"
                          maxlength="255"
                          :observacoes='[
                              "Máximo de 255 caracteres.",
                              "Informe o link da aula, se a mesma for online.",
                          ]'/>

            <x-form.select label="Professor"
                           name="professor_id"
                           size="md:max-w-[250px]"
                           :options="$professores"
                           :required="true"
                           :blank="true"
                           :observacoes='["Selecione uma das opções."]'
            />

            <x-form.select label="Classe"
                           name="classe_id"
                           size="md:max-w-[250px]"
                           :options="$classes"
                           :required="true"
                           :blank="true"
                           :observacoes='["Selecione uma das opções."]'
            />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('calendario-fixo')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
