<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-sm text-white uppercase hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 focus:bg-primary-dark dark:text-gray-900 dark:bg-yellow-400 dark:hover:bg-yellow-300']) }}>
    {{ $slot }}
</button>
