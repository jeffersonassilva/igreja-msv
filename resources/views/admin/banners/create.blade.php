<x-app-layout>
    <x-slot name="header">
        Adicionar Banner
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('banners.store') }}"
              method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="descricao" class="text-gray-900 mb-2">Descrição <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Máximo de 100 caracteres.</span>
                <input type="text" name="descricao" id="descricao" maxlength="100"
                       class="border-gray-400 rounded-sm text-gray-700 @error('descricao') border-[1px] border-red-500 @enderror"
                       value="{{ old('descricao') }}">
                @error('descricao')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="img_mobile" class="text-gray-900 mb-2">Imagem Mobile <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500">- A imagem deve respeitar a proporção 16/9.</span>
                <span class="text-sm font-thin text-gray-500">- O tamanho mínimo é de 640x360.</span>
                <span class="text-sm font-thin text-gray-500 mb-2"> - Extensões válidas: jpg, jpeg e png.</span>
                <label for="img_mobile" class="md:hidden text-gray-900 mb-2 bg-gray-200 border-b rounded-md p-3 flex justify-center items-center sm:max-w-[200px] text-sm">
                    Selecionar arquivo
                </label>
                <input type="file" name="img_mobile" id="img_mobile"
                       class="@error('img_mobile') border-[1px] border-red-500 @enderror hidden md:block"
                       value="{{ old('img_mobile') }}">
                @error('img_mobile')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="img_web" class="text-gray-900 mb-2">Imagem Web <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500"> - A imagem deve ter o tamanho de 1920x400.</span>
                <span class="text-sm font-thin text-gray-500 mb-2"> - Extensões válidas: jpg, jpeg e png.</span>
                <label for="img_web" class="md:hidden text-gray-900 mb-2 bg-gray-200 border-b rounded-md p-3 flex justify-center items-center sm:max-w-[200px] text-sm">
                    Selecionar arquivo
                </label>
                <input type="file" name="img_web" id="img_web"
                       class="@error('img_web') border-[1px] border-red-500 @enderror hidden md:block"
                       value="{{ old('img_web') }}">
                @error('img_web')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="link" class="text-gray-900 mb-2">Link</label>
                <span class="text-sm font-thin text-gray-500">- Máximo de 255 caracteres.</span>
                <span class="text-sm font-thin text-gray-500 mb-2">- Você pode criar um link externo dessa forma <b class="text-blue-400">http://link.com</b>, ou pode fazer um link interno <b class="text-blue-400">/ofertas</b> para uma página do próprio site.</span>
                <input type="text" name="link" id="link" maxlength="100"
                       class="border-gray-400 rounded-sm text-gray-700 @error('link') border-[1px] border-red-500 @enderror"
                       value="{{ old('link') }}">
                @error('link')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="ordem" class="text-gray-900 mb-2">Ordem</label>
                <span class="text-sm font-thin text-gray-500">- Quanto menor o número, maior é a prioridade.</span>
                <span class="text-sm font-thin text-gray-500 mb-2">- Se houver outro banner com a mesma prioridade, será considerada a data de cadastro.</span>
                <input type="number" pattern="[0-9]*" name="ordem" id="ordem"
                       class="max-w-[75px] border-gray-400 rounded-sm text-gray-700 @error('ordem') border-[1px] border-red-500 @enderror"
                       value="{{ old('ordem') }}">
                @error('ordem')
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
                    <a href="{{ route('dashboard') }}" aria-label="Voltar"
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
