<x-app-layout>
    <h2 class="font-thin text-2xl text-gray-500 p-3">
        Editar Banner
    </h2>

    <div class="p-3">
        <div class="">
            <form class="form-horizontal" role="form"
                  action="{{ route('banners.update', array('id' => $data->id)) }}"
                  method="post" enctype="multipart/form-data">
                @csrf
                <div class="flex flex-col mb-6 p-6 bg-white">
                    <label for="descricao" class="text-gray-900 mb-2">Descrição</label>
                    <span class="text-sm font-thin text-gray-400 mb-2">- Máximo de 100 caracteres</span>
                    <input type="text" name="descricao" id="descricao" maxlength="100"
                           class="border-gray-400 rounded-sm text-gray-700 @error('descricao') border-[1px] border-red-500 @enderror"
                           value="{{ old('descricao') ?? $data->descricao }}">
                    @error('descricao')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col mb-6 p-6 bg-white">
                    <label for="img_mobile" class="text-gray-900 mb-2">Imagem Mobile</label>
                    <span class="text-sm font-thin text-gray-500">- A imagem deve respeitar a proporção 16/9.</span>
                    <span class="text-sm font-thin text-gray-500">- O tamanho mínimo é de 640x360.</span>
                    <span class="text-sm font-thin text-gray-500 mb-2"> - Extensões válidas: jpg, jpeg e png.</span>
                    <input type="file" name="img_mobile" id="img_mobile"
                           class="@error('img_mobile') border-[1px] border-red-500 @enderror"
                           value="{{ old('img_mobile') ?? $data->img_mobile }}">
                    @error('img_mobile')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col mb-6 p-6 bg-white">
                    <label for="img_web" class="text-gray-900 mb-2">Imagem Web</label>
                    <span class="text-sm font-thin text-gray-500"> - A imagem deve ter o tamanho de 1920x400.</span>
                    <span class="text-sm font-thin text-gray-500 mb-2"> - Extensões válidas: jpg, jpeg e png.</span>
                    <input type="file" name="img_web" id="img_web"
                           class="@error('img_web') border-[1px] border-red-500 @enderror"
                           value="{{ old('img_web') ?? $data->img_web }}">
                    @error('img_web')
                    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-6">
                    <button aria-label="Salvar" type="submit"
                       class="outline-0 rounded-md text-blue-400 border border-blue-400
                                            hover:text-white hover:bg-blue-400
                                            focus:text-white focus:bg-blue-400
                                            px-4 py-1 inline-flex justify-center items-center">
                        <span class="ml-1">Salvar</span>
                    </button>
                    <a href="{{ route('dashboard') }}" aria-label="Voltar" type="button"
                            class="outline-0 rounded-md text-blue-400 border border-blue-400
                                            hover:text-white hover:bg-blue-400
                                            focus:text-white focus:bg-blue-400
                                            px-4 py-1 ml-2 inline-flex justify-center items-center">
                        <span class="ml-1">Voltar</span>
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
