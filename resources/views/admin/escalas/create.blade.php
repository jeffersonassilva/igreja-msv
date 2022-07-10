<x-app-layout>
    <x-slot name="header">
        Adicionar Escala
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('escalas.store') }}"
              method="post">
            @csrf
            <input type="hidden" name="data" />
            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="dt_escala" class="text-gray-900 mb-2">Data <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Informe a data da escala.</span>
                <input type="date" min="{{ date('Y-m-d') }}" max="{{ date("Y-m-d", strtotime("+1 month")) }}"
                       name="dt_escala" id="dt_escala"
                       class="md:max-w-[250px] border-gray-400 rounded-sm text-gray-700 @error('dt_escala') border-[1px] border-red-500 @enderror"
                       value="{{ old('dt_escala') }}">
                @error('dt_escala')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="hr_escala" class="text-gray-900 mb-2">Hora <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Informe o horário de início da escala.</span>
                <input type="time" name="hr_escala" id="hr_escala"
                       class="md:max-w-[250px] border-gray-400 rounded-sm text-gray-700 @error('hr_escala') border-[1px] border-red-500 @enderror"
                       value="{{ old('hr_escala') }}">
                @error('hr_escala')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="evento_id" class="text-gray-900 mb-2">Evento <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Selecione o evento a qual a escala estará atrelada.</span>
                <select name="evento_id" id="evento_id" @error('hr_escala') class="border-[1px] border-red-500" @enderror>
                    <option value=""></option>
                    @foreach($eventos as $evento)
                    <option value="{{ $evento->id }}">{{ $evento->descricao }}</option>
                    @endforeach
                </select>
                @error('evento_id')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-between flex-col sm:flex-row">
                <div class="mb-6 flex items-center gap-2">
                    <button aria-label="Salvar" type="submit"
                            class="outline-0 rounded-md text-white font-normal border border-blue-400 bg-blue-400
                                    hover:bg-blue-500
                                    focus:bg-blue-500
                                    px-3 py-1 inline-flex justify-center items-center">
                        <ion-icon name="save-outline"></ion-icon><span class="ml-2">Salvar</span>
                    </button>
                    <a href="{{ route('escalas') }}" aria-label="Voltar"
                       class="outline-0 rounded-md text-blue-400 font-normal border border-blue-400
                                    hover:text-white hover:bg-blue-400
                                    focus:text-white focus:bg-blue-400
                                    px-3 py-1 inline-flex justify-center items-center">
                        <ion-icon name="arrow-back-outline"></ion-icon><span class="ml-2">Voltar</span>
                    </a>
                </div>

                <div class="text-gray-400 text-xs font-thin mb-2">
                    <span class="text-red-500 font-bold">*</span> Preenchimento obrigatório
                </div>
            </div>
        </form>
    </section>
</x-app-layout>
