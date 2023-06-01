<x-app-layout>
    <x-slot name="header">
        Editar Propósito
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('propositos.update', $proposito) }}"
              method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <x-form.input label="Título"
                          name="titulo"
                          maxlength="30"
                          value="{{ old('titulo') ?? $proposito->titulo }}"
                          :required="true"
                          :observacoes='["Máximo de 30 caracteres."]' />

            <x-form.textarea label="Descrição"
                             name="descricao"
                             value="{{ old('descricao') ?? $proposito->descricao }}"
                             rows="5"
                             :required="true"
                             :observacoes='["Máximo de 1000 caracteres."]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('site')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
