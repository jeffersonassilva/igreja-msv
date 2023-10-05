@extends('layouts.default')

@section('content')
    <section class="bg-gray-100">

        <div class="flex">
            <div class="flex-1 h-[70px] sm:h-[160px] hidden md:block"><img class="w-full h-full opacity-40 object-cover" src="{{ asset('img/adoracao/1.jpg') }}" alt="adoracao"></div>
            <div class="flex-1 h-[70px] sm:h-[160px]"><img class="w-full h-full opacity-40 object-cover" src="{{ asset('img/adoracao/2.jpg') }}" alt="adoracao"></div>
            <div class="flex-1 h-[70px] sm:h-[160px]"><img class="w-full h-full opacity-40 object-cover" src="{{ asset('img/adoracao/3.jpg') }}" alt="adoracao"></div>
            <div class="flex-1 h-[70px] sm:h-[160px]"><img class="w-full h-full opacity-40 object-cover" src="{{ asset('img/adoracao/4.jpg') }}" alt="adoracao"></div>
            <div class="flex-1 h-[70px] sm:h-[160px]"><img class="w-full h-full opacity-40 object-cover" src="{{ asset('img/adoracao/5.jpg') }}" alt="adoracao"></div>
            <div class="flex-1 h-[70px] sm:h-[160px]"><img class="w-full h-full opacity-40 object-cover" src="{{ asset('img/adoracao/6.jpg') }}" alt="adoracao"></div>
            <div class="flex-1 h-[70px] sm:h-[160px] hidden md:block"><img class="w-full h-full opacity-40 object-cover" src="{{ asset('img/adoracao/7.jpg') }}" alt="adoracao"></div>
        </div>

        <x-alert class="pt-4 px-4" />

        <div class="container mx-auto max-w-[1080px] p-4">
            @if($testemunhos->count())

                <h1 class="titulo-separador">Testemunhos</h1>
                @if (session('nome'))
                    <div id="message_alert" class="border border-l-4 border-green-400 bg-white p-4 sm:p-4 mb-4 rounded-md flex justify-between items-start">
                        <span class="text-gray-700">
                            <p class="text-md sm:text-xl flex items-center">
                                <span class="text-green-400 text-2xl sm:text-3xl flex items-center mr-1 sm:mr-2">
                                    <ion-icon name="checkmark-circle"></ion-icon>
                                </span> Seu testemunho foi enviado!
                            </p>
                            <p class="mt-3 font-thin text-sm sm:text-base">
                                Muito obrigado por compartilhar seu testemunho conosco <b>{{ session('nome') }}!</b>
                            </p>
                            <p class="mt-3 font-thin text-sm sm:text-base">
                                Em breve seu testumunho ficará visível no site, assim que for aprovado pelo responsável.
                            </p>
                            <p class="mt-3 font-thin text-sm sm:text-base">
                                Que Deus o(a) abençoe!
                            </p>
                        </span>
    {{--                    <span class="text-2xl flex items-center cursor-pointer" id="close-message-btn">--}}
    {{--                        <ion-icon name="close-outline"></ion-icon>--}}
    {{--                    </span>--}}
                    </div>
                @endif

                <div class="mb-8">
                    @foreach($testemunhos as $testemunho)
                        <section class="p-6 sm:p-8 my-4 sm:my-8 text-gray-600 bg-white border border-gray-100 rounded-lg">
                            <div class="font-thin italic sm:text-lg">
                                <ion-icon name="remove-outline"></ion-icon> &ldquo;{{ $testemunho->mensagem }}&rdquo;
                            </div>
                            <div class="flex flex-col items-start sm:items-end mt-4">
                                <div class="font-medium text-sm sm:text-base md:text-lg">
                                    {{ $testemunho->nome }}
                                </div>
                                <div class="text-xs sm:text-sm text-gray-500">
                                    {{ \Carbon\Carbon::parse($testemunho->created_at)->format('d/m/Y') }}
                                </div>
                            </div>
                        </section>
                    @endforeach
                </div>

            {{ $testemunhos->links() }}
            @endif

            <section>
                <div class="flex flex-col text-center my-8 border-t border-t-gray-200 pt-8">
                    <h2 class="text-gray-600 text-xl sm:text-3xl">Envie seu Testemunho</h2>
                    <h3 class="text-gray-600 text-sm sm:text-base sm:mt-1 font-thin">Compartilhe sua benção para que outras pessoas sejam edificadas pelo poder do nosso Senhor Jesus Cristo!</h3>
                </div>
                <form class="form-horizontal" role="form"
                      action="{{ route('testemunhos.store') }}"
                      method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="flex flex-col md:flex-row md:gap-2">
                        <div class="flex-[70%] flex flex-col mb-4 rounded-md">
                            <label for="nome" class="text-gray-600">Nome <span class="text-red-500 font-bold">*</span></label>
                            <input type="text" name="nome" id="nome" maxlength="255"
                                   class="border-gray-200 rounded-md text-gray-600 @error('nome') border-[1px] border-red-500 @enderror"
                                   value="{{ old('nome') }}">
                            @error('nome')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex-[30%] flex flex-col mb-4 rounded-md">
                            <label for="telefone" class="text-gray-600">Telefone <span class="text-red-500 font-bold">*</span></label>
                            <input type="text" name="telefone" id="telefone" maxlength="255"
                                   class="telefone border-gray-200 rounded-md text-gray-600 @error('telefone') border-[1px] border-red-500 @enderror"
                                   value="{{ old('telefone') }}">
                            @error('telefone')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col mb-4 rounded-md">
                        <label for="mensagem" class="text-gray-600">Mensagem <span class="text-red-500 font-bold">*</span></label>
                        <textarea name="mensagem" id="mensagem"
                                  class="border-gray-200 rounded-md text-gray-600 w-full min-h-[120px] @error('mensagem') border-[1px] border-red-500 @enderror">{{ old('mensagem') }}</textarea>
                        @error('mensagem')
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
                                Enviar Testemunho
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
