<x-app-layout>
    <x-slot name="header">
        Adicionar Data
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('calendario.store') }}"
              method="post">
            @csrf

            <x-form.input label="Data"
                          name="data"
                          type="date"
                          min="{{ date('Y-m-d', strtotime('-2 week')) }}"
                          max="{{ date('Y-m-d', strtotime('+2 month')) }}"
                          size="md:max-w-[250px]"
                          value="{{ date('Y-m-d') }}"
                          :required="true"
                          :observacoes='["Informe a data da aula."]' />

            <x-form.checkboxes label="Classes"
                               name="classes[]"
                               :items="$classes"
                               :observacoes='["Selecione as classes que terão aulas no dia selecionado acima."]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('calendario')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
