<x-app-layout>
    <x-slot name="header">
        Editar Classe
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('classes.update', $data) }}"
              method="post">
            @method('PUT')
            @csrf

            <x-form.input label="Nome"
                          name="nome"
                          maxlength="50"
                          :required="true"
                          value="{{ old('nome') ?? $data->nome }}"
                          :observacoes='["Máximo de 50 caracteres."]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('classes')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
