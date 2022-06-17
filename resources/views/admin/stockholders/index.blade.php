@extends('layouts.admin.datatables', ['title' => __('Stockholders')])

@section('content')
    <div class="content-wrapper">

        <!-- Content Header (Page header) -->
        <x-elements.page-header title="{{ __('Stockholders') }}" :breadcrumbs="['Stockholders' => '#']">
        </x-elements.page-header>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="d-flex flex-wrap justify-content-between align-items-center mb-3 p-2">
                                {{-- Round selector --}}
                                <x-elements.round-selector :round="$round" :rounds="$rounds" :route="'admin.stockholders'">
                                </x-elements.round-selector>

                                {{-- Search --}}
                                <x-elements.table-search>
                                </x-elements.table-search>

                                {{-- Action buttons --}}
                                <x-elements.card-action-buttons :buttons="[
                                    'Download all' => ['icon' => 'download', 'route' => 'stockholders.create'],
                                    'Download by round' => ['icon' => 'file-download', 'route' => 'stockholders.create'],
                                    'Add new' => ['icon' => 'user-plus', 'route' => 'stockholders.create'],
                                ]">
                                </x-elements.card-action-buttons>
                            </div>

                            <div id="card-stockholders" class="card-body table-responsive p-0">
                                <table id="table-stockholders" class="table table-hover text-nowrap">
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
                                            <tr>
                                                <td>
                                                    <span style="display:inline-block; width: 35px;">
                                                        {{ $stockholder->priority }}
                                                    </span>
                                                    <div class="btn-group ml-2">
                                                        <button type="button"
                                                            class="btn btn-sm btn-default priority-up {{ $stockholder->priority > 1 ? '' : 'disabled' }}"
                                                            data-user_id="{{ $stockholder->id }}"
                                                            data-round_id="{{ $stockholder->round_id }}">
                                                            <i class="fas fa-arrow-up"></i>
                                                        </button>

                                                        <button type="button"
                                                            class="btn btn-sm btn-default priority-down {{ $stockholder->priority < $maxPriority ? '' : 'disabled' }}"
                                                            data-user_id="{{ $stockholder->id }}"
                                                            data-round_id="{{ $stockholder->round_id }}">
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection


@push('scripts')
    <script>
        $(function() {
            $(".priority-up").click(function() {
                let $userId = $(this).attr("data-user_id");
                let $roundId = $(this).attr("data-round_id");
                console.log($userId);
                console.log($roundId);
                $.ajax({
                    url: "{{ route('admin.priority_up') }}?user_id=" + $userId + '&round_id=' +
                        $roundId,
                    method: 'GET',
                    success: function(data) {
                        $('#button_scripts').html(data.html);
                        $('#table-stockholders').load(location.href + " #card-stockholders");
                    }
                });
            });

            $(".priority-down").click(function() {
                let $userId = $(this).attr("data-user_id");
                let $roundId = $(this).attr("data-round_id");
                console.log($userId);
                console.log($roundId);
                $.ajax({
                    url: "{{ route('admin.priority_down') }}?user_id=" + $userId + '&round_id=' +
                        $roundId,
                    method: 'GET',
                    success: function(data) {
                        $('#stockholders-index').html(data.html);
                    }
                });
            });
        });
    </script>
@endpush
