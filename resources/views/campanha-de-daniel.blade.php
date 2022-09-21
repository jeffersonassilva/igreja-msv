@extends('layouts.default')

@section('content')
    <section class="bg-gray-100">

        <div class="container mx-auto max-w-[1080px] md:p-4">
            <div>
                <img class="" src="{{ asset('img/campanha-de-daniel.jpg') }}" alt="adoracao">
            </div>
        </div>

        <div class="container mx-auto max-w-[1080px] px-4 pb-4">
            <section>
                <div class="flex flex-col text-center my-4 md:my-8 border-t border-t-gray-200 pt-2 md:pt-8">
                    <h2 class="text-gray-600 text-xl sm:text-3xl">Participe !!</h2>
                    <div class="p-6 sm:p-8 my-4 sm:my-8 text-gray-600 bg-white border border-gray-100 rounded-lg font-thin italic sm:text-lg">
                        &ldquo;Naqueles dias, eu, Daniel, pranteei durante três semanas.
                        Manjar desejável não comi, nem carne, nem vinho encontraram na minha boca,
                        nem me ungi com óleo algum, até que passaram as três semanas inteiras.&rdquo; (Dn 10:2-3)
                    </div>
                </div>
                <form class="form-horizontal" role="form"
                      action="{{ route('campanha.store') }}"
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

                        <div class="flex-[10%] flex flex-col mb-4 rounded-md">
                            <label for="data" class="text-gray-600">Data <span class="text-red-500 font-bold">*</span></label>
                            <input type="date" min="2022-09-11" max="2022-10-01" name="data" id="data" maxlength="255"
                                   class="border-gray-200 rounded-md text-gray-600 @error('data') border-[1px] border-red-500 @enderror"
                                   value="{{ old('data') }}">
                            @error('data')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex-[10%] flex flex-col mb-4 rounded-md">
                            <label for="periodo" class="text-gray-600">Período <span class="text-red-500 font-bold">*</span></label>
                            <select name="periodo" id="periodo"
                                    class="border-gray-200 rounded-md text-gray-600 @error('periodo') border-[1px] border-red-500 @enderror">
                                <option value=""></option>
                                <option value="Manhã">Manhã</option>
                                <option value="Tarde">Tarde</option>
                                <option value="Noite">Noite</option>
                                <option value="Dia inteiro">Dia inteiro</option>
                            </select>
                            @error('periodo')
                            <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="flex-[10%] flex flex-col mb-4 rounded-md">
                            <label for="btn" class="text-gray-600 hidden md:block">&nbsp;</label>
                            <div class="mb-6 flex items-center gap-2">
                                <button aria-label="Salvar" type="submit"
                                        class="outline-0 rounded-md text-white font-normal bg-blue-800
                                    hover:bg-blue-900
                                    focus:bg-blue-900
                                    px-4 py-2 md:px-6 inline-flex justify-center items-center">
                                    Participar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </section>

            <section class="mb-6">
                <div class="w-full text-center md:text-lg text-gray-500 pb-4 md:p-6">Lista de participantes</div>
                <div class="overflow-x-auto relative border border-gray-200 rounded-lg">
                    <table class="w-full text-left text-gray-700">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-200 border-b">
                        <tr class="text-sm sm:text-base">
                            <th scope="row" class="p-4 sm:px-6">Nome</th>
                            <th scope="row" class="p-4 sm:px-6 text-center">Data</th>
                            <th scope="row" class="p-4 sm:px-6 w-[1%]">Período</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($participantes as $participante)
                            <tr class="bg-gray-50 odd:bg-white border-b text-sm sm:text-base">
                                <th scope="row" class="p-4 sm:px-6 whitespace-nowrap font-normal">
                                    {{ $participante['nome'] }}
                                </th>
                                <td class="py-4 px-6 whitespace-nowrap text-center">
                                    {{ $participante['data_br'] }}
                                </td>
                                <td class="py-4 px-6 whitespace-nowrap">
                                    @switch($participante['periodo'])
                                        @case('Manhã')
                                        <ion-icon name="sunny-outline"></ion-icon>
                                        @break
                                        @case('Tarde')
                                        <ion-icon name="cloud-outline"></ion-icon>
                                        @break
                                        @case('Noite')
                                        <ion-icon name="moon-outline"></ion-icon>
                                        @break
                                        @default
                                        <ion-icon name="cloudy-night-outline"></ion-icon>
                                        @break
                                    @endswitch
                                    <span class="pl-2 md:pl-4">{{ $participante['periodo'] }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>

        </div>
    </section>
@endsection
