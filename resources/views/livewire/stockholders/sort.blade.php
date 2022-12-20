<div>
    @if ($roundId)
        <x-admin.elements.button wire:click='openModal' value="{{ __('Sort') }}" />
    @endif

    <x-admin.elements.dialog-modal wire:model="modal">
        <x-slot name="title">{{ __('Set stockholders priorities') }}</x-slot>

        <x-slot name="content" class="max-h-3">
            @if ($stockholders !== null)
                <ul wire:sortable="updatePriority">
                    @foreach ($stockholders as $stockholder)
                        <li wire:sortable.item="{{ $stockholder->id }}" wire:key="wish-{{ $stockholder->id }}"
                            wire:sortable.handle>
                            <span class="w-2 mr-2">
                                {{ $stockholder->pivot->priority }}.
                            </span>
                            {{ $stockholder->name }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </x-slot>

        <x-slot name="footer">
            <x-admin.elements.button wire:click="$set('modal', false)" wire:loading.attr='disabled'>
                {{ __('Done') }}
            </x-admin.elements.button>
        </x-slot>
    </x-admin.elements.dialog-modal>
</div>

@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/livewire/sortable@v0.x.x/dist/livewire-sortable.js"></script>
@endpush
