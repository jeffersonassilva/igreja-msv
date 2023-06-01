<x-app-layout>
    <x-slot name="header">
        Adicionar Escala
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('escalas.store') }}"
              method="post">
            @csrf
            <input type="hidden" name="data" />

            <x-form.input label="Data"
                          name="dt_escala"
                          type="date"
                          min="{{ date('Y-m-d') }}"
                          max="{{ date('Y-m-d', strtotime('+2 month')) }}"
                          size="md:max-w-[250px]"
                          :required="true"
                          :observacoes='["Informe a data da escala."]' />

            <x-form.input label="Hora"
                          name="hr_escala"
                          type="time"
                          size="md:max-w-[250px]"
                          :required="true"
                          :observacoes='["Informe o horário de início da escala."]' />

            <x-form.select label="Evento"
                           name="evento_id"
                           size="md:max-w-[250px]"
                           :blank="true"
                           :required="true"
                           :options="$eventos"
                           :observacoes='["Selecione o evento a qual a escala se refere."]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('escalas')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
