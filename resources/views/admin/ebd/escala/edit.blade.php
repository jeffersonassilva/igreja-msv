<x-app-layout>
    <x-slot name="header">
        Editar Escala
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('calendario.escala.update', [$data->calendario_id, $data]) }}"
              method="post">
            @method('PUT')
            @csrf

            <x-form.select label="Classe"
                           name="classe_id"
                           size="md:max-w-[250px]"
                           :reference="$data->classe_id"
                           :options="$classes"
                           :required="false"
                           :disabled="true"
                           :observacoes='["Selecione uma das opções."]'/>

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
                           :required="false"
                           :observacoes='["Selecione uma das opções."]'/>

            <x-form.input label="Monitor(a)"
                          name="monitor"
                          maxlength="255"
                          :required="false"
                          value="{{ old('monitor') ?? $data->monitor }}"
                          :observacoes='["Máximo de 255 caracteres."]'/>

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('calendario')"
                            :infoRequired="true"/>
        </form>
    </section>
</x-app-layout>
