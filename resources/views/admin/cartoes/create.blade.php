<x-app-layout>
    <x-slot name="header">
        Adicionar Cartão
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('cartoes.store') }}"
              method="post" enctype="multipart/form-data">
            @csrf

            <x-form.input label="Identificador"
                          name="identificador"
                          maxlength="20"
                          :required="true"
                          :observacoes='["Máximo de 20 caracteres."]' />

            <x-form.input label="Número"
                          name="numero"
                          maxlength="16"
                          :required="true"
                          :observacoes='["Máximo de 16 caracteres."]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('cartoes')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
