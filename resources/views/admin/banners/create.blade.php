<x-app-layout>
    <x-slot name="header">
        Adicionar Banner
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('banners.store') }}"
              method="post" enctype="multipart/form-data">
            @csrf

            <x-form.input label="Descrição"
                          name="descricao"
                          maxlength="100"
                          :required="true"
                          :observacoes='["Máximo de 100 caracteres."]' />

            <x-form.file label="Imagem Mobile"
                         name="img_mobile"
                         accept=".png, .jpg, .jpeg"
                         :required="true"
                         :observacoes='[
                            "A imagem deve respeitar a proporção 16/9.",
                            "O tamanho mínimo é de 640x360.",
                            "Extensões válidas: jpg, jpeg e png."
                         ]' />

            <x-form.file label="Imagem Web"
                         name="img_web"
                         accept=".png, .jpg, .jpeg"
                         :required="true"
                         :observacoes='[
                            "A imagem deve ter o tamanho de 1920x400.",
                            "Extensões válidas: jpg, jpeg e png."
                         ]' />

            <x-form.input label="Link"
                          name="link"
                          maxlength="100"
                          :observacoes='[
                            "Máximo de 100 caracteres.",
                            "Você pode criar um link externo dessa forma <b class=\"text-blue-400\">http://link.com</b>, ou pode fazer um link interno <b class=\"text-blue-400\">/ofertas</b> para uma página do próprio site."
                          ]' />

            <x-form.input label="Ordem"
                          name="ordem"
                          type="number"
                          pattern="[0-9]*"
                          size="max-w-[75px]"
                          :observacoes='[
                            "Quanto menor o número, maior é a prioridade.",
                            "Se houver outro banner com a mesma prioridade, será considerada a data de cadastro."
                          ]' />

            <x-form.actions backLabel="Voltar"
                            :backRoute="route('site')"
                            :infoRequired="true" />
        </form>
    </section>
</x-app-layout>
