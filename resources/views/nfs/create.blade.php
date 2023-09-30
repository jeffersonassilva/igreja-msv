@extends('layouts.blank')

@section('titulo')
    <h2 class="text-white text-xl sm:text-3xl">Notas Fiscais</h2>
@endsection
@section('content')
    <section class="container mx-auto max-w-[1080px] px-4 pb-4">
        @if (session('message'))
            <div id="message_alert" class="bg-yellow-200 p-4 my-4 rounded-md flex justify-between items-center">
                <span class="text-gray-700">
                    {{ session('message') }}
                </span>
                <span class="text-2xl flex items-center cursor-pointer" id="close-message-btn">
                    <ion-icon name="close-outline"></ion-icon>
                </span>
            </div>
        @endif

        <div
            class="p-6 sm:p-8 my-4 sm:my-8 text-center text-gray-600 bg-white border border-gray-100 rounded-lg font-thin italic sm:text-lg">
            Utilize esse formulário para enviar as notas fiscais para o departamento financeiro da igreja.
        </div>
        <form class="form-horizontal" role="form"
              action="{{ route('notas-fiscais.store') }}"
              method="post" enctype="multipart/form-data">
            @csrf

            <div class="grid md:grid-cols-3 lg:grid-cols-4 bg-white dark:bg-[#252c47] mb-4 p-4">
                <div>Responsável pelo envio:</div>
                <div class="md:col-span-2 lg:col-span-3"><strong class="uppercase">{{ $membro['membro']['nome'] }}</strong></div>
                <div class="pt-4 md:pt-2">Número Cartão:</div>
                <div class="md:col-span-2 lg:col-span-3 md:pt-2">
                    <strong>{{ \App\Helpers\Strings::getCartaoFormatado($cartao['numero']) }}</strong>
                </div>
            </div>

            <x-form.input label="Data da compra:"
                          name="data"
                          type="date"
                          min="{{ date('Y') . '-01-01' }}"
                          max="{{ date('Y-m-d') }}"
                          size="md:max-w-[300px]"
                          :required="true"/>

            <x-form.input label="Valor da compra:"
                          name="valor"
                          size="md:max-w-[300px]"
                          mask="moeda"
                          :required="true"/>

            <x-form.input label="Descrição da compra:"
                          name="descricao"
                          maxlength="150"
                          :required="true"/>

            <x-form.select label="Categoria:"
                           name="categoria"
                           size="md:max-w-[300px]"
                           :blank="true"
                           :required="true"
                           :options="$categorias"
            />

            <x-form.textarea label="Observações"
                             name="observacao"
                             :observacoes='[
                                "Utilize esse campo para informar alguma informação importante a respeito desta despesa.",
                                "Máximo de 1000 caracteres."
                             ]'/>

            <x-form.file label="Arquivo"
                         name="arquivo"
                         accept=".png, .jpg, .jpeg"
                         :required="true"
                         :observacoes='[
                            "Extensões válidas: jpg, jpeg e png."
                         ]'/>

            <input type="hidden" name="responsavel" value="{{ $membro['membro']['nome'] }}">
            <input type="hidden" name="cartao" value="{{ \App\Helpers\Strings::getCartaoFormatado($cartao['numero']) }}">

            <div class="flex flex-col mb-4 rounded-md">
                <div class="mt-6 mb-6 flex items-center gap-2">
                    <button aria-label="Salvar" type="submit"
                            class="outline-0 rounded-md text-white font-normal bg-blue-800
                            hover:bg-blue-900 focus:bg-blue-900
                            px-4 py-2 md:px-6 inline-flex justify-center items-center">
                        Enviar
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection
