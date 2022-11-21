<div class="md:col-span-1 flex justify-between">
    <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium text-gray-900">{{ $title }}</h3>

        <p class="mt-2 text-sm text-gray-600">
            {{ $description }}
        </p>

        <div class="mt-2 text-sm">
            {{ $details }}
        </div>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
