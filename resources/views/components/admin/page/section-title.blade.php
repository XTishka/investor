@props(['title' => null, 'description' => null, 'details' => null])
<div class="md:col-span-1 flex justify-between">
    <div class="px-4 sm:px-0">
        @if ($title != null)
            <h3 class="text-lg font-medium text-gray-900">
                {{ $title }}
            </h3>
        @endif

        @if ($description != null)
            <p class="mt-2 text-sm text-gray-600">
                {{ $description }}
            </p>
        @endif

        @if ($details != null)
            <div class="mt-2 text-sm">
                {{ $details }}
            </div>
        @endif
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
