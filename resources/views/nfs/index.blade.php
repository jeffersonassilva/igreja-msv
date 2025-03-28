@extends('layouts.blank')

@section('titulo')
    <h2 class="text-white text-xl sm:text-3xl">Notas Fiscais</h2>
@endsection

@section('content')
    <section class="container mx-auto max-w-[1080px] px-4 pb-4">
        <div class="p-6 sm:p-8 my-4 sm:my-8 text-center text-gray-600 bg-white border border-gray-100 rounded-lg font-thin italic sm:text-lg">
            Informe o código de acesso para enviar as notas fiscais para o financeiro.
        </div>
        <form class="form-horizontal" role="form"
              action="{{ route('notas-fiscais.check') }}">

            <x-form.input label="Código de Acesso"
                          name="access_code"
                          size="md:max-w-[250px]"
                          :required="true" />

            <div class="flex flex-col mb-4 rounded-md">
                <div class="mt-6 mb-6 flex items-center gap-2">
                    <button aria-label="Salvar" type="submit"
                            class="outline-0 rounded-md text-white font-normal bg-blue-800
                        hover:bg-blue-900
                        focus:bg-blue-900
                        px-4 py-2 md:px-6 inline-flex justify-center items-center">
                        Verificar
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection
