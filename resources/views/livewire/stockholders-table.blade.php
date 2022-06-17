<table id="table-stockholders" class="table table-hover text-nowrap" wire:sortable="updateStockholdersPriority">
    <thead>
        <tr>
            <th>Priority</th>
            <th>Stockholder</th>
            <th>Email</th>
            <th class="text-center">Available weeks</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="stockholders-index">
        @foreach ($stockholders as $stockholder)
            <tr  wire:sortable.item="{{ $stockholder->id }}" wire:key="stockholder-{{ $stockholder->id }}">
                <td>
                    <span style="display:inline-block; width: 35px;">
                        {{ $stockholder->priority }}
                    </span>
                    <div class="btn-group ml-2">
                        <button type="button"
                            class="btn btn-sm btn-default priority-up {{ $stockholder->priority > 1 ? '' : 'disabled' }}"
                            data-user_id="{{ $stockholder->id }}" data-round_id="{{ $stockholder->round_id }}">
                            <i class="fas fa-arrow-up"></i>
                        </button>

                        <button type="button"
                            class="btn btn-sm btn-default priority-down {{ $stockholder->priority < $maxPriority ? '' : 'disabled' }}"
                            data-user_id="{{ $stockholder->id }}" data-round_id="{{ $stockholder->round_id }}">
                            <i class="fas fa-arrow-down"></i>
                        </button>
                    </div>
                </td>

                <td>{{ $stockholder->name }}</td>

                <td>
                    <a href="mailto:{{ $stockholder->email }}">{{ $stockholder->email }}</a>
                </td>

                <td class="text-center">
                    {{ $stockholder->available_weeks }}
                </td>

                <td>
                    <x-elements.table-action-buttons :stockholderId="$stockholder->id" :route="'stockholders'">
                    </x-elements.table-action-buttons>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
