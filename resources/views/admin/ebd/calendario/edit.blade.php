<x-app-layout>
    <x-slot name="header">
        Editar Calendário
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

            <x-form.input label="Responsável pela EBD"
                          name="responsavel"
                          maxlength="255"
                          :required="true"
                          value="{{ old('responsavel') ?? $data->responsavel }}"
                          :observacoes='["Máximo de 255 caracteres."]' />

            <x-form.input label="Responsável pela Secretaria"
                          name="secretario"
                          maxlength="255"
                          :required="true"
                          value="{{ old('secretario') ?? $data->secretario }}"
                          :observacoes='["Máximo de 255 caracteres."]' />

            <x-form.checkboxes label="Classes"
                               name="classes[]"
                               :items="$classes"
                               :observacoes='["Selecione as classes que terão aulas no dia."]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('calendario')"
                            :infoRequired="true"/>
        </form>
    </section>
</x-app-layout>
