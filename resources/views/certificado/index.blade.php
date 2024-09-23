@extends('layouts.default')

@php
    $texto = 'foi batizado em nome do Pai, Filho e do Espírito Santo, conforme mandamento do Senhor Jesus Cristo em Mateus 28:19 no dia 15/09/2024.';
@endphp

@section('content')
    <section class="bg-gray-100">

        <div class="container mx-auto max-w-[1080px] p-8 text-center border-b border-b-gray-200 mb-4">
            <h2 class="text-gray-600 text-xl sm:text-3xl">Emitir Certificado</h2>
            <h3 class="text-gray-600 text-sm sm:text-base sm:mt-1 font-thin">
                Preencha os dados abaixo para gerar o certificado!
            </h3>
        </div>

        <div class="container mx-auto max-w-[1080px] p-4 flex gap-8 items-start">
            <section class="flex-1">
                <form class="form-horizontal" role="form" method="post" action="{{ route('certificado.store') }}">
                    @csrf

                    <div class="flex flex-col mb-4 rounded-md">
                        <label for="titulo" class="text-gray-600">
                            Título <span class="text-red-500 font-bold">*</span>
                        </label>
                        <input type="text" name="titulo" id="titulo" maxlength="255"
                               class="border-gray-200 rounded-md text-gray-600
                               @error('titulo') border-[1px] border-red-500 @enderror"
                               value="{{ old('titulo', 'Certificado de Batismo') }}">
                        @error('nome')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-4 rounded-md">
                        <label for="nome" class="text-gray-600">
                            Nome do membro <span class="text-red-500 font-bold">*</span>
                        </label>
                        <input type="text" name="nome" id="nome" maxlength="255"
                               class="border-gray-200 rounded-md text-gray-600
                               @error('nome') border-[1px] border-red-500 @enderror"
                               value="{{ old('nome', 'Jefferson Alessandro Santos da Silva') }}">
                        @error('nome')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-4 rounded-md">
                        <label for="mensagem" class="text-gray-600">
                            Mensagem <span class="text-red-500 font-bold">*</span>
                        </label>
                        <textarea name="mensagem" id="mensagem"
                                  class="border-gray-200 rounded-md text-gray-600 w-full min-h-[120px]
                                  @error('mensagem') border-[1px] border-red-500 @enderror">{{ old('mensagem', $texto) }}</textarea>
                        @error('mensagem')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col mb-4 rounded-md">
                        <label for="assinatura" class="text-gray-600">
                            Assinatura <span class="text-red-500 font-bold">*</span>
                        </label>
                        <input type="text" name="assinatura" id="assinatura" maxlength="255"
                               class="border-gray-200 rounded-md text-gray-600
                               @error('assinatura') border-[1px] border-red-500 @enderror"
                               value="{{ old('assinatura', 'Pr. Samuel Novais') }}">
                        @error('nome')
                        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-between items-center sm:items-start flex-col sm:flex-row">
                        <div class="mb-6 flex items-center gap-2">
                            <button aria-label="Salvar" type="submit"
                                    class="outline-0 rounded-md text-white font-normal bg-blue-800
                                    hover:bg-blue-900
                                    focus:bg-blue-900
                                    px-4 py-2 md:px-6 inline-flex justify-center items-center">
                                Gerar Certificado
                            </button>
                        </div>

                        <div class="text-gray-400 text-xs font-thin mb-2">
                            <span class="text-red-500 font-bold">*</span> Preenchimento obrigatório
                        </div>
                    </div>
                </form>
            </section>

            <div class="hidden md:flex items-center">
                <div class="w-[280px] md:w-[450px] pt-6 flex justify-center certificado relative">
                    <img class="w-[280px] md:w-[450px] max-w-[550px]" src="{{ asset('img/diploma-fundo.png') }}"
                         alt="logo">
                    <div class="w-[280px] md:w-[450px] max-w-[550px] absolute p-4 md:p-6">
                        <div class="flex justify-center">
                            <img class="w-[8px] md:w-[15px]" src="{{ asset('img/logo-vazada.png') }}" alt="logo">
                        </div>
                        <div class="text-center mt-1 text-[7px] md:text-[11px]">
                            Igreja Evangélica Ministério Semeando a Verdade
                        </div>
                        <div class="text-center text-[6px] md:text-[8px] tracking-tight font-thin">
                            PA 03 Lote 02 - Jardins Mangueiral - DF &nbsp;&nbsp;&nbsp;&nbsp; CNPJ: 23.244.224/0001-44
                        </div>
                        <div class="flex flex-col items-center">
                            <div id="text-titulo"
                                 class="text-[13px] md:text-[20px] m-1 md:m-3
                                 font-bold font-serif italic uppercase tracking-tight text-center">
                                {{ old('titulo', 'Certificado de Batismo') }}
                            </div>
                            <div class="text-[7px] md:text-[10px]">Certificamos que</div>
                            <div id="text-nome"
                                 class="m-1 md:m-3 text-[13px] md:text-[20px]
                                 font-bold italic font-serif tracking-tight text-center">
                                {{ old('nome', 'Jefferson Alessandro Santos da Silva') }}
                            </div>
                            <div id="text-mensagem" class="text-[7px] md:text-[10px] text-center w-10/12">
                                {{ old('mensagem', $texto) }}
                            </div>
                            <div class="text-center text-[5px] md:text-[10px] mt-4">
                                <div>_______________________________________</div>
                                <div id="text-assinatura">{{ old('assinatura', 'Pr. Samuel Novais') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('add-scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            let titulo = $('#titulo');
            titulo.keyup(function () {
                $('#text-titulo').text(titulo.val());
            });

            let nome = $('#nome');
            nome.keyup(function () {
                $('#text-nome').text(nome.val());
            });

            let mensagem = $('#mensagem');
            mensagem.keyup(function () {
                $('#text-mensagem').text(mensagem.val());
            });

            let assinatura = $('#assinatura');
            assinatura.keyup(function () {
                $('#text-assinatura').text(assinatura.val());
            });
        });
    </script>
@endsection
