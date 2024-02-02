<x-app-layout>
    <x-slot name="header">
        Adicionar Classe
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('classes.store') }}"
              method="post">
            @csrf

            <x-form.input label="Nome"
                          name="nome"
                          maxlength="50"
                          :required="true"
                          :observacoes='["Máximo de 50 caracteres."]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('classes')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
