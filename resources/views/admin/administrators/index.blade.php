@extends('layouts.admin.datatables', ['title' => __('admin.administrators')])

@section('content')
    <div class="content-wrapper">

        <x-elements.page-header title="admin.administrators" :breadcrumbs="[ 'admin.administrators' => '#']" />

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('admin.administrators.create') }}" class="btn btn-secondary btn-sm mr-1 float-right">
                                    {{ __('admin.create') }}
                                </a>
                            </div>

                            <div class="card-body table-responsive p-0">
                                <table class="table table-hover text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>{{ __('admin.id') }}</th>
                                            <th>{{ __('admin.administrator') }}</th>
                                            <th>{{ __('admin.email') }}</th>
                                            <th>{{ __('admin.created_at') }}</th>
                                            <th>{{ __('admin.updated_at') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($administrators as $administrator)
                                            <tr>
                                                <td>{{ $administrator->id }}</td>
                                                <td><a
                                                        href="{{ route('admin.administrators.edit', $administrator) }}">{{ $administrator->name }}</a>
                                                </td>
                                                <td><a
                                                        href="mailto:{{ $administrator->email }}">{{ $administrator->email }}</a>
                                                </td>
                                                <td>{{ date('j F, Y', strtotime($administrator->created_at)) }}</td>
                                                <td>{{ date('j F, Y', strtotime($administrator->updated_at)) }}</td>
                                                <td>
                                                    <x-elements.table-action-buttons :id="$administrator->id" route="admin.administrators" />
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
