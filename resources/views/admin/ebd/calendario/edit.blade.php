<x-app-layout>
    <x-slot name="header">
        Editar Item
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('calendario.update', $data) }}"
              method="post">
            @method('PUT')
            @csrf

            <x-form.input label="Data"
                          name="data"
                          type="date"
                          min="{{ date('Y-m-d', strtotime('-2 week')) }}"
                          max="{{ date('Y-m-d', strtotime('+2 month')) }}"
                          size="md:max-w-[250px]"
                          value="{{ old('data') ?? $data->data }}"
                          :required="true"
                          :observacoes='["Informe a data da aula."]'/>

            <x-form.input label="Tema"
                          name="tema"
                          maxlength="255"
                          :required="false"
                          value="{{ old('tema') ?? $data->tema }}"
                          :observacoes='["Máximo de 255 caracteres."]'/>

            <x-form.select label="Professor"
                           name="professor_id"
                           size="md:max-w-[250px]"
                           :blank="true"
                           :reference="$data->professor_id"
                           :options="$professores"
                           :required="true"
                           :observacoes='["Selecione uma das opções."]'/>

            <x-form.input label="Monitor(a)"
                          name="monitor"
                          maxlength="255"
                          :required="false"
                          value="{{ old('monitor') ?? $data->monitor }}"
                          :observacoes='["Máximo de 255 caracteres."]'/>

            <x-form.select label="Classe"
                           name="classe_id"
                           size="md:max-w-[250px]"
                           :reference="$data->classe_id"
                           :options="$classes"
                           :required="true"
                           :observacoes='["Selecione uma das opções."]'/>

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('calendario')"
                            :infoRequired="true"/>
        </form>
    </section>
</x-app-layout>
