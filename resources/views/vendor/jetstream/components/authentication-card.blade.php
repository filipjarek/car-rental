<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-slate-50 dark:bg-slate-800 border border-gray-300  dark:border-gray-700">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-slate-100 dark:bg-gray-800 border border-gray-300  dark:border-gray-700  shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>