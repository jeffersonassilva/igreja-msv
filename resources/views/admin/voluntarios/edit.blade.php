<x-app-layout>
    <x-slot name="header">
        Editar Voluntário
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('voluntarios.update', $data) }}"
              method="post">
            @method('PUT')
            @csrf
            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="nome" class="text-gray-900 mb-2">Nome <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Máximo de 100 caracteres.</span>
                <input type="text" name="nome" id="nome" maxlength="100"
                       class="border-gray-400 rounded-sm text-gray-700 @error('nome') border-red-500 @enderror"
                       value="{{ old('nome') ?? $data->nome }}">
                @error('nome')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="sexo" class="text-gray-900 mb-2">Sexo <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Esse campo será utilizado para o voluntariado em funções específicas.</span>
                <select name="sexo" id="sexo" class="md:max-w-[180px] text-gray-700 border-gray-400 @error('sexo') border-red-500 @enderror">
                    <option value="M" @if($data->sexo === 'M') selected @endif>Masculino</option>
                    <option value="F" @if($data->sexo === 'F') selected @endif>Feminino</option>
                </select>
                @error('sexo')
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
