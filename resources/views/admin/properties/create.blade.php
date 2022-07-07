@extends('layouts.admin.forms', ['title' => __('admin.create') . ' ' . __('admin.property')])

@section('content')
    <div class="content-wrapper">

        <x-elements.page-header title="admin.property_create" :breadcrumbs="[ 'admin.properties' => 'admin.properties', 'admin.create' => '#']" />

        <section class="content">

            <div class="row">
                <div class="col-md-6">

                    <x-elements.form-card title="{{ 'admin.add_new_property' }}" form="create-property" submitButtonStyle="primary"
                        submitButtonText="admin.create">

                        <form action="{{ route('admin.properties.store') }}" method="POST" id="create-property">
                            @csrf

                            <x-elements.form-input-field id="name" type="text" name="name" label="admin.name"
                                placeholder="{{ __('admin.enter_property_name') }}" :value="old('name')" />

                            <x-elements.form-input-field id="country" type="text" name="country" label="admin.country"
                                placeholder="{{ __('admin.enter_property_country') }}" :value="old('country')" />

                            <x-elements.form-input-field id="address" type="text" name="address" label="admin.address"
                                placeholder="{{ __('admin.enter_property_address') }}" :value="old('address')" />

                        </form>

                    </x-elements.form-card>

                </div>

                <div class="col-md-6">

                    <x-elements.form-card title="{{ 'admin.upload_csv_with_properties' }}" form="import-properties"
                        submitButtonStyle="primary" submitButtonText="admin.upload_csv">

                        <form action="{{ route('admin.properties.import') }}" method="POST" id="import-properties"
                            enctype="multipart/form-data">
                            @csrf

                            <x-elements.form-file-field id="file" name="file" label="CSV file"
                                placeholder="admin.choose_file" value="{{ old('name') }}" />

                        </form>

                    </x-elements.form-card>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h5><i class="icon fas fa-ban"></i> {{ __('Alert') }}!</h5>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>


        </section>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
@endpush
