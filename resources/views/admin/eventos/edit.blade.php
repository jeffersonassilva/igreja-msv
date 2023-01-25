<x-app-layout>
    <x-slot name="header">
        Editar Evento
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('eventos.update', $data) }}"
              method="post">
            @method('PUT')
            @csrf
            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="descricao" class="text-gray-900 mb-2">Descrição <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Máximo de 150 caracteres.</span>
                <input type="text" name="descricao" id="descricao" maxlength="150"
                       class="border-gray-400 rounded-sm text-gray-700 @error('descricao') border-[1px] border-red-500 @enderror"
                       value="{{ old('descricao') ?? $data->descricao }}">
                @error('descricao')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="situacao" class="text-gray-900 mb-2">Situação <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500">- Por padrão, todo evento novo é cadastrado como ativo.</span>
                <span class="text-sm font-thin text-gray-500 mb-2">- Se a situação for "Inativo", as escalas relacionadas a este evento não serão exibidas.</span>
                <select name="situacao" id="situacao" class="md:max-w-[150px] @error('situacao') border-[1px] border-red-500 @enderror">
                    <option value="1" @if($data->situacao === 1) selected @endif>Ativo</option>
                    <option value="0" @if($data->situacao === 0) selected @endif>Inativo</option>
                </select>
                @error('situacao')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="qntd_voluntarios" class="text-gray-900 mb-2">Quantidade de Voluntários</label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Informe a quantidade necessária de voluntários para este evento.</span>
                <input type="number" pattern="[0-9]*" name="qntd_voluntarios" id="qntd_voluntarios"
                       class="max-w-[75px] border-gray-400 rounded-sm text-gray-700 @error('qntd_voluntarios') border-[1px] border-red-500 @enderror"
                       value="{{ old('qntd_voluntarios') ?? $data->qntd_voluntarios }}">
                @error('qntd_voluntarios')
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
                    <a href="{{ route('eventos') }}" aria-label="Voltar"
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
