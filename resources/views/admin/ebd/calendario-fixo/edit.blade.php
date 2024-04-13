<x-app-layout>
    <x-slot name="header">
        Editar Item Fixo
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('calendario-fixo.update', $data) }}"
              method="post">
            @method('PUT')
            @csrf

            <x-form.input label="Título"
                          name="titulo"
                          maxlength="255"
                          :required="true"
                          value="{{ old('titulo') ?? $data->titulo }}"
                          :observacoes='["Máximo de 255 caracteres."]'/>

            <x-form.input label="Tema"
                          name="tema"
                          maxlength="255"
                          :required="false"
                          value="{{ old('tema') ?? $data->tema }}"
                          :observacoes='["Máximo de 255 caracteres."]'/>

            <x-form.input label="Local"
                          name="local"
                          maxlength="255"
                          value="{{ old('local') ?? $data->local }}"
                          :observacoes='[
                              "Máximo de 255 caracteres.",
                              "Informe o local da aula, se a mesma for presencial.",
                          ]'/>

            <x-form.input label="Link"
                          name="link"
                          maxlength="255"
                          value="{{ old('link') ?? $data->link }}"
                          :observacoes='[
                              "Máximo de 255 caracteres.",
                              "Informe o link da aula, se a mesma for online.",
                          ]'/>

            <x-form.select label="Professor"
                           name="professor_id"
                           size="md:max-w-[250px]"
                           :reference="$data->professor_id"
                           :options="$professores"
                           :required="true"
                           :observacoes='["Selecione uma das opções."]'
            />

            <x-form.select label="Classe"
                           name="classe_id"
                           size="md:max-w-[250px]"
                           :reference="$data->classe_id"
                           :options="$classes"
                           :required="true"
                           :observacoes='["Selecione uma das opções."]'
            />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('calendario-fixo')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
