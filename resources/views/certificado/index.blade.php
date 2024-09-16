@extends('layouts.default')

@section('content')
    <section class="bg-gray-100">

        <div class="container mx-auto max-w-[1080px] p-4">
            <section>
                <div class="flex flex-col text-center my-8 border-t border-t-gray-200 pt-8">
                    <h2 class="text-gray-600 text-xl sm:text-3xl">Emitir Certificado</h2>
                    <h3 class="text-gray-600 text-sm sm:text-base sm:mt-1 font-thin">
                        Preencha os dados abaixo para gerar o certificado!
                    </h3>
                </div>
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
                        @php
                            $texto = 'foi batizado em nome do Pai, Filho e do Espírito Santo, conforme mandamento do Senhor Jesus Cristo em Mateus 28:19 no dia 15/09/2024.';
                        @endphp
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
        </div>
    </section>
@endsection
