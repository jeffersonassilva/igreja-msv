@props(['label', 'name', 'required' => false, 'observacoes' => [], 'value' => null, 'size' => null, 'accept' => null])

<div class="flex flex-col mb-4 p-4 bg-white dark:bg-[#252c47]">
    <label for="{{ $name }}" class="text-gray-900 mb-2 dark:text-[#d0d9e6]">
        {{ $label }} @if($required)<span class="text-red-500 font-bold">*</span>@endif
    </label>

    @foreach ($observacoes as $obs)
        <span class="text-sm font-thin text-gray-500 dark:text-gray-400 @if($loop->last) mb-2 @endif">
            - {!! $obs !!}
        </span>
    @endforeach

    <label for="{{ $name }}"
           class="md:hidden text-gray-900 mb-2 bg-gray-200 border-b rounded-md p-3
           flex justify-center items-center sm:max-w-[200px] text-sm
           dark:bg-[#343d61] dark:border dark:border-[#343d61] dark:text-[#d0d9e6]">
        Selecionar arquivo
    </label>
    <input type="file" name="{{ $name }}" id="{{ $name }}"
           @if($accept) accept="{{ $accept }}" @endif
           class="@error($name) border-[1px] border-red-500 dark:border-[#642828] @enderror hidden md:block"
           value="{{ $value ?: old($name) }}">
    @error($name)
    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
    @enderror
</div>
