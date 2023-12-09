@props([
    'label', 'name',
    'required' => false,
    'observacoes' => [],
    'value' => null,
    'spacing' => 'mb-4 p-4'
    ])

<div class="bg-white dark:bg-[#252c47] mb-4 p-4">
    <div class="flex gap-2">
        <input type="checkbox" {{ $attributes->merge(['name' => $name, 'id' => $name]) }} value="1"
               @if(old($name) ?? $value) checked="checked" @endif
               class="w-6 h-6 text-blue-600 bg-gray-100 rounded border-gray-300
                       dark:text-yellow-400 dark:border-[#343d61] dark:bg-[#252c47]
                       @error($name) border-[1px] border-red-500 dark:border-[#642828] @enderror">
        @error($name)
        <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
        @enderror

        <label for="{{ $name }}" class="text-gray-900 mb-2 dark:text-[#d0d9e6]">
            {{ $label }} @if($required)<span class="text-red-500 font-bold">*</span>@endif
        </label>
    </div>
    @foreach ($observacoes as $obs)
        <span class="text-sm font-thin text-gray-500 dark:text-gray-400 @if($loop->last) mb-2 @endif">
            - {!! $obs !!}
        </span>
    @endforeach
</div>
