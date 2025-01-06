@props(['label', 'name', 'required' => false, 'observacoes' => [], 'value' => null, 'rows' => 4])

<div class="flex flex-col mb-4 p-4 bg-white dark:bg-[#252c47]">
    <label for="{{ $name }}" class="text-gray-900 mb-2 dark:text-[#d0d9e6]">
        {{ $label }} @if($required)<span class="text-red-500 font-bold">*</span>@endif
    </label>

    @foreach ($observacoes as $obs)
        <span class="text-sm font-thin text-gray-500 dark:text-gray-400 @if($loop->last) mb-2 @endif">
            - {!! $obs !!}
        </span>
    @endforeach

    <textarea {{ $attributes->merge(['name' => $name, 'id' => $name, 'rows' => $rows]) }}
              class="border-gray-400 rounded-sm text-gray-700 w-full
              dark:bg-[#1c2039] dark:border-[#343d61] dark:text-[#d0d9e6] dark-autofill
              dark:focus:border-[#7380b3] dark:focus:ring-[#7380b3]
              @error($name) border-[1px] border-red-500 @enderror">{{ $value ?: old($name) }}</textarea>

    @error($name)
    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
    @enderror
</div>
