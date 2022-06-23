<div class="card">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 p-2">
        <div></div>

        <x-elements.table-search />

        <x-elements.card-action-buttons :buttons="[
            'admin.download' => ['icon' => 'download', 'route' => 'admin.properties.export'],
            'admin.add_new' => ['icon' => 'laptop-house', 'route' => 'admin.properties.create'],
        ]" />
        
    </div>

    <div id="card-properties" class="card-body table-responsive p-0">
        <table id="table-properties" class="table table-hover text-nowrap table-striped">
            <thead>
                <tr>
                    <th>{{ __('admin.id') }}</th>
                    <th>{{ __('admin.name') }}</th>
                    <th>{{ __('admin.country') }}</th>
                    <th>{{ __('admin.address') }}</th>
                    <th>{{ __('admin.description') }}</th>
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
                            <x-elements.table-action-buttons :id="$property->id" route="admin.properties">
                            </x-elements.table-action-buttons>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
