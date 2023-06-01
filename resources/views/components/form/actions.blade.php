@props(['backRoute' => false, 'backLabel' => false, 'infoRequired' => false ])

<div class="flex justify-between flex-col sm:flex-row">
    <div class="mb-6 flex items-center gap-2">
        <button aria-label="Salvar" type="submit"
                class="outline-0 rounded-md text-white font-normal border border-blue-400 bg-blue-400
                        hover:bg-blue-500 focus:bg-blue-500
                        px-3 py-1 inline-flex justify-center items-center
                        dark:text-gray-900 dark:bg-yellow-400 dark:hover:bg-yellow-300 dark:border-yellow-400">
            <ion-icon name="save-outline"></ion-icon><span class="ml-2">Salvar</span>
        </button>
        @if($backRoute)
        <a href="{{ $backRoute }}" aria-label="{{ $backLabel }}"
           class="outline-0 rounded-md text-blue-400 font-normal border border-blue-400
                hover:text-white hover:bg-blue-400 focus:text-white focus:bg-blue-400
                px-3 py-1 inline-flex justify-center items-center
                dark:bg-[#1c2039] dark:text-yellow-400 dark:hover:text-yellow-300 dark:border-yellow-400">
            <ion-icon name="arrow-back-outline"></ion-icon><span class="ml-2">{{ $backLabel }}</span>
        </a>
        @endif
    </div>

    @if($infoRequired)
    <div class="text-gray-400 text-xs font-thin mb-2">
        <span class="text-red-500 font-bold">*</span> Preenchimento obrigatório
    </div>
    @endif
</div>
