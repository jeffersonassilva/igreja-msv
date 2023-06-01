@props(['label', 'name', 'items', 'required' => false, 'observacoes' => [], 'errorName' => null])

<div class="flex flex-col mb-4 p-4 bg-white dark:bg-[#252c47]">
    <label class="text-gray-900 mb-2 dark:text-[#d0d9e6]">
        {{ $label }} @if($required)<span class="text-red-500 font-bold">*</span>@endif
    </label>

    @foreach ($observacoes as $obs)
        <span class="text-sm font-thin text-gray-500 dark:text-gray-400 @if($loop->last) mb-2 @endif">
            - {{ $obs }}
        </span>
    @endforeach

    <div class="grid gap-4 md:gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 py-4">
        @foreach($items as $item)
            <div class="flex border border-gray-200 rounded p-2 dark:bg-[#1c2039] dark:border-[#343d61] dark:text-[#d0d9e6]">
                <div class="flex items-center h-5">
                    <input name="{{ $name }}" id="item-checkbox-{{ $item['id'] }}"
                           type="checkbox" value="{{ $item['id'] }}"
                           @if($item['checked']) checked="checked" @endif
                           class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300
                           dark:text-yellow-400 dark:border-[#343d61] dark:bg-[#252c47]">
                </div>
                <div class="ml-2 text-sm">
                    <label for="item-checkbox-{{ $item['id'] }}"
                           class="font-medium text-gray-700 cursor-pointer select-none dark:text-[#d0d9e6]">
                        {{ $item['descricao'] }}
                    </label>
                    @isset($item['nome'])
                    <p id="permissao-checkbox-{{ $item['id'] }}"
                       class="text-xs font-normal text-gray-500">
                        {{ $item['nome'] }}
                    </p>
                    @endif
                </div>
            </div>
        @endforeach

    </div>
    @error($errorName)
    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
    @enderror
</div>
