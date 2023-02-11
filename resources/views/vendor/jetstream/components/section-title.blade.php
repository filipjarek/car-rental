<div class="md:col-span-1 flex justify-between">
    <div class="px-4 sm:px-0">
        <h3 class="text-lg font-bold text-gray-900 dark:text-slate-300">{{ $title }}</h3>

        <p class="mt-1 text-sm text-gray-600 dark:text-slate-200">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
