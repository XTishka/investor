@extends('layouts.admin.datatables', ['title' => __('Stockholders')])

@section('content')
    <div class="content-wrapper">

        <x-elements.page-header title="Stockholders" :breadcrumbs="['Stockholders' => '#']">
        </x-elements.page-header>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        @livewire('stockholders-table', ['round' => $round, 'rounds' => $rounds])
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endpush

@push('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
@endpush

@push('scripts')
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script>
        $(function() {

            $('#stockholders-index').sortable({
                start: function(event, ui) {
                    let start_pos = ui.item.index();
                    ui.item.data('start_pos', start_pos);
                },
                change: function(event, ui) {
                    let start_pos = ui.item.data('start_pos');
                    let index = ui.placeholder.index();
                    if (start_pos < index) {
                        $('#stockholders-index li:nth-child(' + index + ')').addClass('highlights');
                    } else {
                        $('#stockholders-index li:eq(' + (index + 1) + ')').addClass('highlights');
                    }
                },
                update: function(event, ui) {
                    $('#stockholders-index li').removeClass('highlights');

                    let order = $("#stockholders-index").sortable("toArray");
                    let _token = $('meta[name="csrf-token"]').attr('content');

                    $.ajax({
                        url: "{{ route('admin.stockholders.order') }}",
                        type: 'POST',
                        data: {
                            order: order,
                            _token: _token
                        },
                        success: function(data) {
                            $('#message').html(data.html);
                        }
                    });
                }
            });
        });
    </script>
@endpush
