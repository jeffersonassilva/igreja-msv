@props([
    'label', 'name', 'type' => 'text',
    'maxlength' => '255',
    'required' => false,
    'disabled' => false,
    'observacoes' => [],
    'value' => null,
    'size' => null,
    'mask' => null,
    'spacing' => 'mb-4 p-4'
    ])

<div class="flex flex-col bg-white dark:bg-[#252c47] @if($spacing) {{ $spacing }} @endif">
    <label for="{{ $name }}" class="text-gray-900 mb-2 dark:text-[#d0d9e6]">
        {!! $label !!} @if($required)<span class="text-red-500 font-bold">*</span>@endif
    </label>

    @foreach ($observacoes as $obs)
        <span class="text-sm font-thin text-gray-500 dark:text-gray-400 @if($loop->last) mb-2 @endif">
            - {!! $obs !!}
        </span>
    @endforeach

    <input {{ $attributes->merge([
                    'type' => $type,
                    'name' => $name,
                    'id' => $name,
                    'maxlength' => $maxlength,
                    'disabled' => $disabled ]) }}
           class="border-gray-400 rounded-sm text-gray-700
           dark:bg-[#1c2039] dark:border-[#343d61] dark:text-[#d0d9e6] dark-autofill
           dark:focus:border-[#7380b3] dark:focus:ring-[#7380b3]
           disabled:border-gray-300 disabled:opacity-60 disabled:bg-gray-100
           @if($mask) {{ $mask }} @endif
           @if($size) {{ $size }} @endif
           @error($name) border-[1px] border-red-500 dark:border-[#642828] @enderror"
           value="{{ $value ?: old($name) }}" autocomplete="false">
    @error($name)
    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
    @enderror
</div>
