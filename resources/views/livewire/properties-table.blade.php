<div class="card">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 p-2">
        <div></div>

        <x-elements.table-search>
        </x-elements.table-search>

        <x-elements.card-action-buttons :buttons="[
            'Download' => ['icon' => 'download', 'route' => 'admin.properties.export'],
            'Add new' => ['icon' => 'user-plus', 'route' => 'admin.properties.create'],
        ]">
        </x-elements.card-action-buttons>
    </div>

    <div id="card-stockholders" class="card-body table-responsive p-0">
        <table id="table-stockholders" class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>{{ __('ID') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Country') }}</th>
                    <th>{{ __('Address') }}</th>
                    <th>{{ __('Description') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="properties-index">
                @foreach ($properties as $property)
                    <tr>
                        <td>{{ $property->id }}</td>
                        <td>{{ $property->name }}</td>
                        <td>{{ $property->country }}</td>
                        <td>{{ $property->address }}</td>
                        <td>{{ $property->description }}</td>
                        <td>
                            <x-elements.table-action-buttons :id="$property->id" route="admin.properties" :round="$roundId">
                            </x-elements.table-action-buttons>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>