@extends('layouts.admin.datatables')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>{{ __('admin.page_title_show_round') }}</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right text-capitalize">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <i class="nav-icon fas fa-tachometer-alt text-sm mr-2"></i>
                                    {{ __('admin.dashboard') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.rounds') }}">
                                    {{ __('admin.breadcrumbs_rounds_index') }}
                                </a>
                            </li>
                            <li class="breadcrumb-item active">{{ $round->name }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="invoice p-3 mb-3">

                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-recycle mr-2"></i> {{ $round->name }}

                                        <a href="{{ route('rounds.edit', $round->id) }}"
                                           class="btn btn-primary btn-sm mr-1 float-right">
                                            <i class="fas fa-edit"></i>
                                            {{ __('admin.button_edit_round') }}
                                        </a>
                                    </h4>
                                </div>

                            </div>

                            <div class="row invoice-info">

                                <div class="col-sm-4 invoice-col">
                                    <strong>Start round date: </strong>{{ date('j F, Y', strtotime($round->start_round_date)) }}<br>
                                    <strong>End wishes date: </strong>{{ date('j F, Y', strtotime($round->end_wishes_date)) }}<br>
                                    <strong>End round date: </strong>{{ date('j F, Y', strtotime($round->end_round_date)) }}<br>
                                    <strong>Weeks QTY: </strong>{{ $weeks['weekQty'] }} weeks<br>
                                </div>

                                <div class="col-sm-4 invoice-col">
                                    <strong>Description</strong><br>
                                    {{ $round->description }}
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <div class="invoice p-3 mb-3">

                            <div class="row mt-4">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Qty</th>
                                            <th>Product</th>
                                            <th>Serial #</th>
                                            <th>Description</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Call of Duty</td>
                                            <td>455-981-221</td>
                                            <td>El snort testosterone trophy driving gloves handsome</td>
                                            <td>$64.50</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Need for Speed IV</td>
                                            <td>247-925-726</td>
                                            <td>Wes Anderson umami biodiesel</td>
                                            <td>$50.00</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Monsters DVD</td>
                                            <td>735-845-642</td>
                                            <td>Terry Richardson helvetica tousled street art master</td>
                                            <td>$10.70</td>
                                        </tr>
                                        <tr>
                                            <td>1</td>
                                            <td>Grown Ups Blue Ray</td>
                                            <td>422-568-642</td>
                                            <td>Tousled lomo letterpress</td>
                                            <td>$25.99</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i
                                            class="fas fa-print"></i> Print</a>
                                    <button type="button" class="btn btn-success float-right"><i
                                            class="far fa-credit-card"></i> Submit
                                        Payment
                                    </button>
                                    <button type="button" class="btn btn-primary float-right"
                                            style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Generate PDF
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
