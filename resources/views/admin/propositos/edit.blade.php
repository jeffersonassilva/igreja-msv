<x-app-layout>
    <h2 class="font-thin text-2xl text-gray-500 p-3">
        Editar Propósito
    </h2>

    <div class="p-3">
        <div class="bg-white p-6 shadow-sm rounded-sm border-[1px] border-gray-200">
            <form class="form-horizontal" role="form"
                  action="{{ route('propositos.update', array('id' => $proposito->id)) }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col mb-6">
                    <label for="titulo" class="text-gray-500">Título</label>
                    <input type="text" name="titulo" id="titulo" maxlength="30"
                           class="@error('titulo') border-[1px] border-red-500 @enderror"
                           value="{{ old('titulo') ?? $proposito->titulo }}">
                    @error('titulo')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex flex-col mb-6">
                    <label for="descricao" class="text-gray-500">Descrição</label>
                    <textarea name="descricao" id="descricao" cols="30" rows="5"
                              class="@error('titulo') border-[1px] border-red-500 @enderror">{{ $proposito->descricao }}</textarea>
                    @error('descricao')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-6">
                    <button aria-label="Salvar" type="submit"
                       class="outline-0 rounded-md text-blue-400 border border-blue-400
                                            hover:text-white hover:bg-blue-400
                                            focus:text-white focus:bg-blue-400
                                            px-2 py-1 inline-flex justify-center items-center">
                        <span class="ml-1">Salvar</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
