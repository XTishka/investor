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
            <tr  wire:sortable.item="{{ $stockholder->priority_id }}" wire:key="stockholder-{{ $stockholder->priority }}">
                <td>
                    <span style="display:inline-block; width: 35px;">
                        {{ $stockholder->priority }} [{{ $stockholder->priority_id }}]
                    </span>
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
