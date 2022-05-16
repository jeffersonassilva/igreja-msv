<x-app-layout>
    <x-slot name="header">
        Configurações
    </x-slot>

    <section>
        <form class="form-horizontal" role="form"
              action="{{ route('configuracoes.update', $data) }}"
              method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="current-password" class="text-gray-900 mb-2">Senha atual <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Caso não saiba sua senha atual, favor entrar em contato com o administrador do sistema.</span>
                <input type="password" name="current-password" id="current-password" maxlength="255"
                       class="border-gray-400 rounded-sm text-gray-700 @error('current-password') border-[1px] border-red-500 @enderror"
                       value="{{ old('current-password') }}">
                @error('current-password')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="new-password" class="text-gray-900 mb-2">Nova senha <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500">- Mínimo de 8 caracteres.</span>
                <span class="text-sm font-thin text-gray-500 mb-2">- Sugerimos que você adicione letras, números e caracteres especiais para maior segurança.</span>
                <input type="password" name="new-password" id="new-password" maxlength="255"
                       class="border-gray-400 rounded-sm text-gray-700 @error('new-password') border-[1px] border-red-500 @enderror"
                       value="{{ old('new-password') }}">
                @error('new-password')
                <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col mb-4 p-4 bg-white">
                <label for="new-password_confirmation" class="text-gray-900 mb-2">Confirmar nova senha <span class="text-red-500 font-bold">*</span></label>
                <span class="text-sm font-thin text-gray-500 mb-2">- Deve ser a mesma senha utilizada no campo "Nova senha".</span>
                <input type="password" name="new-password_confirmation" id="new-password_confirmation" maxlength="255"
                       class="border-gray-400 rounded-sm text-gray-700 @error('new-password_confirmation') border-[1px] border-red-500 @enderror"
                       value="{{ old('new-password_confirmation') }}">
                @error('new-password_confirmation')
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
                    <a href="{{ route('configuracoes') }}" aria-label="Voltar"
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
