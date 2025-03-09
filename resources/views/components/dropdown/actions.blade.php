@props([
    'buttonId' => "dropdownMenuIconButton",
    'dropdownId' => "dropdownDots"
])

<div>
    <button id="{{ $buttonId }}"
            data-dropdown-toggle="{{ $dropdownId }}"
            class="inline-flex items-center p-2 text-sm font-medium text-center
                    text-primary-dark bg-neutral rounded-md hover:bg-neutral-dark
                    focus:ring-2 focus:ring-gray-200 focus:outline-none
                    dark:text-[#d0d9e6] dark:bg-[#51596b] dark:hover:bg-[#656b7b]
                    dark:focus:ring-gray-500" type="button">
        <svg class="w-5 h-5"
             aria-hidden="true"
             xmlns="http://www.w3.org/2000/svg"
             fill="currentColor"
             viewBox="0 0 4 15">
            <path
                d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z"/>
        </svg>
    </button>

    <!-- Dropdown menu -->
    <div id="{{ $dropdownId }}"
         class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg border border-gray-200
             shadow w-40 dark:border-gray-500 dark:text-[#d0d9e6] dark:bg-[#51596b]">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="{{ $buttonId }}">
            {{ $slot }}
        </ul>
    </div>
</div>
