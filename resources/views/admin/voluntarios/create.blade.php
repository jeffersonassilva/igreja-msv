<x-app-layout>
    <x-slot name="header">
        Adicionar Voluntário
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('voluntarios.store') }}"
              method="post">
            @csrf
            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="nome" class="text-gray-900 mb-2">Nome <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Máximo de 100 caracteres.</span>
                <input type="text" name="nome" id="nome" maxlength="100"
                       class="border-gray-400 rounded-sm text-gray-700 @error('nome') border-[1px] border-red-500 @enderror"
                       value="{{ old('nome') }}">
                @error('nome')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="sexo" class="text-gray-900 mb-2">Sexo <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Esse campo será utilizado para o voluntariado em funções específicas.</span>
                <select name="sexo" id="sexo" class="md:max-w-[180px] text-gray-700 border-gray-400 @error('sexo') border-red-500 @enderror">
                    <option value=""></option>
                    <option value="M" @if(old('sexo') === 'M') selected @endif>Masculino</option>
                    <option value="F" @if(old('sexo') === 'F') selected @endif>Feminino</option>
                </select>
                @error('sexo')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="professor_ebd" class="text-gray-900 mb-2">Professor EBD <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Esse campo define se o voluntário participará da escala dos professores da EBD.</span>
                <select name="professor_ebd" id="professor_ebd" class="md:max-w-[180px] text-gray-700 border-gray-400 @error('professor_ebd') border-red-500 @enderror">
                    <option value=""></option>
                    <option value="1" @if(old('professor_ebd') == '1') selected @endif>Sim</option>
                    <option value="0" @if(old('professor_ebd') == '0') selected @endif>Não</option>
                </select>
                @error('professor_ebd')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label class="text-gray-900 mb-2">Disponibilidade</label>
                <span class="text-sm font-thin text-gray-500 mb-4">- Selecione os dias que o voluntário está disponível.</span>
                <div class="grid gap-4 grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 xl:grid-cols-7 py-4">
                    @foreach($disponibilidades as $disponibilidade)
                        <div class="flex border border-gray-200 rounded p-2">
                            <div class="flex items-center h-5">
                                <input name="disponibilidades[]" id="role-checkbox-{{ $disponibilidade['id'] }}"
                                       type="checkbox" checked value="{{ $disponibilidade['id'] }}"
                                       class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                            </div>
                            <div class="ml-2 text-sm">
                                <label for="role-checkbox-{{ $disponibilidade['id'] }}"
                                       class="font-medium text-gray-700 cursor-pointer select-none">
                                    {{ $disponibilidade['descricao'] }}
                                </label>
                            </div>
                        </div>
                    @endforeach
                </div>
                @error('disponibilidades')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="observacao" class="text-gray-900 mb-2">Observações</label>
                <span class="text-sm font-thin text-gray-500">- Esse campo serve para informar as particularidades de cada voluntário.</span>
                <span class="text-sm font-thin text-gray-500 mb-2">- Máximo de 1000 caracteres.</span>
                <textarea name="observacao" id="observacao" rows="4" class="border-gray-400 rounded-sm text-gray-700 w-full @error('observacao') border-[1px] border-red-500 @enderror">{{ old('observacao') }}</textarea>
                @error('observacao')
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
                    <a href="{{ route('voluntarios') }}" aria-label="Voltar"
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
