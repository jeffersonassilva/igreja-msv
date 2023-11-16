@props(['label', 'name', 'required' => false, 'value' => null, 'spacing' => 'mb-4 p-4'])

<div class="flex flex-col bg-white dark:bg-[#252c47] @if($spacing) {{ $spacing }} @endif">
    <label for="{{ $name }}" class="text-gray-900 mb-2 dark:text-[#d0d9e6]">
        {{ $label }} @if($required)
            <span class="text-red-500 font-bold">*</span>
        @endif
    </label>

    <div class="grid grid-cols-2 gap-2 sm:pt-2 sm:grid-cols-[1fr,4fr,1fr] md:grid-cols-[100px,400px,100px]">
        <div class="sm:text-center sm:order-1 font-thin text-sm text-gray-500">Muito<br>Improvável</div>
        <div class="text-right sm:text-center sm:order-3 font-thin text-sm text-gray-500">Muito<br>Provável</div>

        <div class="col-span-2 sm:col-span-1 sm:order-2 flex flex-row gap-2 justify-between">
            @for ($i = 1; $i <= 5; $i++)
                <div class="flex items-center flex-1">
                    <input type="radio" id="{{ $name . $i }}" name="{{ $name }}" value="{{ $i }}"
                           {{ (($value && $value == $i) || old($name) && old($name) == $i) ? 'checked' : '' }}
                           class="hidden" onchange="handleRadioChange(this)">
                    <label for="{{ $name . $i }}"
                           class="radio-label cursor-pointer flex items-center justify-center
                           w-full min-h-[40px] bg-gray-100 border border-gray-300">
                        {{ $i }}
                    </label>
                </div>
            @endfor
        </div>
    </div>

    @error($name)
    <span class="text-red-500 text-xs mt-2">{{ $message }}</span>
    @enderror

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.querySelectorAll('input[type="radio"]:checked').forEach(function (radio) {
                radio.nextElementSibling.classList.add('bg-gray-300');
            });
        });

        function handleRadioChange(radio) {
            document.querySelectorAll('.radio-label').forEach(function (label) {
                label.classList.remove('bg-gray-300');
            });

            if (radio.checked) {
                radio.nextElementSibling.classList.add('bg-gray-300');
            }
        }
    </script>
</div>
