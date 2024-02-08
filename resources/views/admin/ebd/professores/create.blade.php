<x-app-layout>
    <x-slot name="header">
        Adicionar Professor
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('professores.store') }}"
              method="post">
            @csrf

            <x-form.input label="Nome"
                          name="nome"
                          maxlength="255"
                          :required="true"
                          :observacoes='["Máximo de 255 caracteres."]' />

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
