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
                                @livewire('stockholders-table', ['stockholders' => $stockholders, 'maxPriority' => $maxPriority])
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
