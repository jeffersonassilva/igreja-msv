<x-app-layout>
    <x-slot name="header">
        Editar Cartão
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('cartoes.update', $data) }}"
              method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <x-form.input label="Identificador"
                          name="identificador"
                          maxlength="20"
                          value="{{ old('identificador') ?? $data->identificador }}"
                          :required="true"
                          :observacoes='["Máximo de 20 caracteres."]' />

            <x-form.input label="Número"
                          name="numero"
                          maxlength="16"
                          value="{{ old('numero') ?? $data->numero }}"
                          :required="true"
                          :observacoes='["Máximo de 16 caracteres."]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('cartoes')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
