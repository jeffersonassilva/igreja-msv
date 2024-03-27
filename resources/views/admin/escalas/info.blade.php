<x-app-layout>
    <x-slot name="header">
        Editar Escala
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('escalas.update.info', $data) }}"
              method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <x-form.input label="Dirigente"
                          name="dirigente"
                          maxlength="255"
                          value="{{ old('dirigente') ?? $data->dirigente }}"
                          :observacoes='["Máximo de 255 caracteres."]' />

            <x-form.input label="Pregador"
                          name="pregador"
                          maxlength="255"
                          value="{{ old('pregador') ?? $data->pregador }}"
                          :observacoes='["Máximo de 255 caracteres."]' />

            <x-form.input label="Tema"
                          name="tema"
                          maxlength="255"
                          value="{{ old('tema') ?? $data->tema }}"
                          :observacoes='["Máximo de 255 caracteres."]' />

            <x-form.input label="Ministrio de Louvor"
                          name="ministro"
                          maxlength="255"
                          value="{{ old('ministro') ?? $data->ministro }}"
                          :observacoes='["Máximo de 255 caracteres."]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('escalas')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>

