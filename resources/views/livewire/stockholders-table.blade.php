<div class="card">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 p-2">
        <x-elements.round-selector :round="$round" :rounds="$rounds" :route="'admin.stockholders'">
        </x-elements.round-selector>

        <x-elements.table-search>
        </x-elements.table-search>

        <x-elements.card-action-buttons :buttons="[
            'Download all' => ['icon' => 'download', 'route' => 'admin.stockholders.full-export'],
            'Download by round' => [
                'icon' => 'file-download',
                'route' => 'admin.stockholders.round-export',
            ],
            'Add new' => ['icon' => 'user-plus', 'route' => 'admin.stockholders.create'],
        ]">
        </x-elements.card-action-buttons>
    </div>

    <div id="card-stockholders" class="card-body table-responsive p-0">
        <table id="table-stockholders" class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>{{ __('Stockholder') }}</th>
                    <th>{{ __('Email') }}</th>
                    <th class="text-center">{{ __('Available weeks') }}</th>
                </tr>
            </thead>
            <tbody id="stockholders-index">
                @foreach ($stockholders as $stockholder)
                    <tr id="priority-{{ $stockholder->priority_id }}">

                        <td>{{ $stockholder->name }}</td>

                        <td>
                            <a href="mailto:{{ $stockholder->email }}">{{ $stockholder->email }}</a>
                        </td>

                        <td class="text-center">
                            {{ $stockholder->available_weeks }}
                        </td>

                        <td>
                            <x-elements.table-action-buttons :id="$stockholder->id" route="admin.stockholders">
                            </x-elements.table-action-buttons>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
