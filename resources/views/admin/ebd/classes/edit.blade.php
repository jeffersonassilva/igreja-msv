<x-app-layout>
    <x-slot name="header">
        Editar Classe
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('classes.update', $data) }}"
              method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <x-form.input label="Nome"
                          name="nome"
                          maxlength="50"
                          :required="true"
                          value="{{ old('nome') ?? $data->nome }}"
                          :observacoes='["Máximo de 50 caracteres."]' />

            <x-form.input label="Link da revista"
                          name="link"
                          value="{{ old('link') ?? $data->link }}"
                          :observacoes='["Máximo de 255 caracteres."]' />

            <x-form.file label="Capa da revista"
                         name="revista"
                         value="{{ old('revista') ?? $data->revista }}"
                         accept=".png, .jpg, .jpeg"
                         :observacoes='[
                            "Extensões válidas: jpg, jpeg e png."
                         ]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('classes')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
