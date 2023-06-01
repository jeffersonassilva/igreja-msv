<x-app-layout>
    <x-slot name="header">
        Editar Testemunho
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('testemunhos.update', $data) }}"
              method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <x-form.input label="Nome"
                          name="nome"
                          maxlength="100"
                          value="{{ old('nome') ?? $data->nome }}"
                          :required="true"
                          :observacoes='["Máximo de 100 caracteres."]' />

            <x-form.input label="Telefone"
                          name="telefone"
                          maxlength="15"
                          value="{{ old('telefone') ?? $data->telefone }}"
                          :required="true"
                          :observacoes='["Informe o DDD + Número do telefone. Ex: (61) 98765-4321"]' />

            <x-form.textarea label="Mensagem"
                             name="mensagem"
                             value="{{ old('mensagem') ?? $data->mensagem }}"
                             rows="6"
                             :required="true"
                             :observacoes='["Máximo de 1000 caracteres."]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('testemunhos')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
