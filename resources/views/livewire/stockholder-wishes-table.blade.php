<div class="card">
    <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 p-2">
        <span class="ml-3">
            <i class="fas fa-user-alt mr-2"></i>
            <span class="mr-2">{{ $stockholder->name }}</span>
            <a href="mailto:{{ $stockholder->email }}" class="d-block">{{ $stockholder->email }}</a>
        </span>

        <x-elements.table-search />

        <div class="p-2">
            <a href="{{ route('admin.stockholders') }}" class="btn btn-secondary mr-1">
                <i class="fas fa-arrow-left mr-3"></i>
                {{ __('admin.back') }}
            </a>

            <a href="{{ route('admin.stockholders') }}" class="btn btn-secondary mr-1">
                <i class="fas fa-edit mr-3"></i>
                {{ __('admin.edit') }}
            </a>
        </div>
    </div>

    <div id="card-stockholders" class="card-body table-responsive p-0">
        <table id="table-stockholders" class="table table-hover text-nowrap  table-striped">
            <thead>
                <tr>
                    <th>{{ __('admin.round') }}</th>
                    <th>{{ __('admin.week') }}</th>
                    <th>{{ __('admin.country') }}</th>
                    <th>{{ __('admin.property') }}</th>
                    <th class="text-center">{{ __('admin.status') }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody id="stockholders-index">
                @foreach ($wishes as $wish)
                    <tr>

                        <td>
                            <a href="{{ route('admin.rounds.show', $wish->round_id) }}">
                                {{ $wish->round_name }}
                            </a>
                        </td>

                        <td>
                            <a href="{{ route('admin.wishes.edit', $wish->id) }}">
                                <strong>#{{ $wish->week_number }}</strong>
                                <span class="text-sm">
                                    ({{ date('j F, Y', strtotime($wish->week_start_date)) }} -
                                    {{ date('j F, Y', strtotime($wish->week_end_date)) }})
                                </span>
                            </a>
                        </td>

                        <td>{{ $wish->property_country }}</td>
                        <td>{{ $wish->property_name }}</td>
                        <td class="text-center">
                            @if ($wish->status === 'Confirmed')
                                <span class="right badge badge-success">
                                    {{ __($wish->status) }}
                                </span>
                            @elseif ($wish->status === 'Not confirmed')
                                <span class="right badge bg-lightblue">
                                    {{ __($wish->status) }}
                                </span>
                            @elseif ($wish->status === 'Failed')
                                <span class="right badge badge-warning">
                                    {{ __($wish->status) }}
                                </span>
                            @else
                                <span class="right badge badge-danger">
                                    {{ __('Error!') }}
                                </span>
                            @endif
                        </td>

                        <td>
                            <x-elements.table-action-buttons :id="$wish->id" route="admin.wishes" />
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
