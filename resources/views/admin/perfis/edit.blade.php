<x-app-layout>
    <x-slot name="header">
        Editar Perfil
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('perfis.update', $data) }}"
              method="post">
            @method('PUT')
            @csrf
            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="descricao" class="text-gray-900 mb-2">Descrição <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Máximo de 100 caracteres.</span>
                <input type="text" name="descricao" id="descricao" maxlength="100"
                       class="border-gray-400 rounded-sm text-gray-700 @error('descricao') border-red-500 @enderror"
                       value="{{ old('descricao') ?? $data->descricao }}">
                @error('descricao')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="permissoes" class="text-gray-900 mb-2">Permissões</label>
                <span class="text-sm font-thin text-gray-500 mb-4">- Selecione todas as permissões que o perfil possui.</span>

                <div class="grid gap-4 md:gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 py-4">
                    @foreach($permissoes as $permissao)
                        <div class="flex">
                            <div class="flex items-center h-5">
                                <input name="permissions[]" id="permissao-checkbox-{{ $permissao['id'] }}"
                                       type="checkbox" value="{{ $permissao['id'] }}"
                                       @if($permissao['checked']) checked="checked" @endif
                                       class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300">
                            </div>
                            <div class="ml-2 text-sm">
                                <label for="permissao-checkbox-{{ $permissao['id'] }}" class="font-medium text-gray-700">
                                    {{ $permissao['descricao'] }}
                                </label>
                                <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500">
                                    {{ $permissao['nome'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
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
                    <a href="{{ route('perfis') }}" aria-label="Voltar"
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
