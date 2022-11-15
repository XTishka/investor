@props(['anchor'])

<div>
    <div>
        @if (session()->has($anchor))
            <span class="text-green-700 text-sm">
                {{ session($anchor) }}
            </span>
        @endif

        @if (session()->has('form_save__error'))
            <span class="text-red-700 text-sm" x-data="{ message: false }" x-show="!message" x-init="() => { setTimeout(() => message = true, 6000) }">
                {{ session('form_save__error') }}
            </span>
        @endif
    </div>
</div>
