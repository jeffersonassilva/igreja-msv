<div class="sm:min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-[#1c2039]">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-4 md:px-6 py-4 bg-white dark:bg-[#343d61] shadow-sm overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
