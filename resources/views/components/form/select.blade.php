@props([
    'label',
    'name',
    'required' => false,
    'disabled' => false,
    'observacoes' => [],
    'options' => [],
    'reference' => null,
    'size' => null,
    'blank' => false,
    'blankName' => null,
    'spacing' => 'mb-4 p-4'
])

<div class="flex flex-col bg-white dark:bg-[#252c47] @if($spacing) {{ $spacing }} @endif">
    <label for="{{ $name }}" class="text-gray-900 mb-2 dark:text-[#d0d9e6]">
        {{ $label }} @if($required)
            <span class="text-red-500 font-bold">*</span>
        @endif
    </label>

    @foreach ($observacoes as $obs)
        <span class="text-sm font-thin text-gray-500 dark:text-gray-400 @if($loop->last) mb-2 @endif">
            - {!! $obs !!}
        </span>
    @endforeach

    <select name="{{ $name }}" id="{{ $name }}" @if($disabled) disabled @endif
            class="rounded-sm border-gray-400 text-gray-700
                dark:bg-[#1c2039] dark:border-[#343d61] dark:text-[#d0d9e6]
                   dark:focus:border-[#7380b3] dark:focus:ring-[#7380b3]
                   disabled:border-gray-300 disabled:opacity-60 disabled:bg-gray-100
                   @error($name) border-[1px] border-red-500 dark:border-[#642828] @enderror
                   @if($size) {{ $size }} @endif">

        @if($blank)
            <option value="">{{ $blankName }}</option>
        @endif
        @foreach ($options as $option)
            <option value="{{ $option['id'] }}"
                    @if($reference == $option['id']) selected @endif>{{ $option['descricao'] }}</option>
        @endforeach
    </select>
    @error($name)
    <span class="text-red-500 text-xs mt-1">{{ $message }}</span>
    @enderror
</div>
