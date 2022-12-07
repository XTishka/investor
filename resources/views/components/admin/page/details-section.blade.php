@props(['title' => null, 'description' => null, 'details' => null, 'data' => null])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-admin.page.section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>

        <x-slot name="details">{{ $details }}</x-slot>
    </x-admin.page.section-title>

    <div class="mt-5 md:mt-0 md:col-span-2">
        {{ $data }}
    </div>
</div>
