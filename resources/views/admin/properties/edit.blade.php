@extends('layouts.admin.forms', ['title' => __('Edit property')])

@section('content')
    <div class="content-wrapper">

        <x-elements.page-header title="admin.property_edit" :breadcrumbs="[ 'admin.properties' => 'admin.properties', 'admin.edit' => '#' ]" />

        <section class="content">

            <div class="row">
                <div class="col-md-6">

                    <x-elements.form-card :title="$property->name" form="property-edit" submitButtonStyle="primary"
                        submitButtonText="admin.save">

                        <form action="{{ route('admin.properties.update', $property) }}" method="POST" id="property-edit">
                            @csrf
                            @method('PUT')

                            <x-elements.form-input-field id="name" type="text" name="name" label="admin.name"
                                placeholder="{{ __('admin.enter_property_name') }}" :value="$property->name" />

                            <x-elements.form-input-field id="country" type="text" name="country" label="admin.country"
                                placeholder="{{ __('admin.enter_property_country') }}" :value="$property->country" />

                            <x-elements.form-input-field id="address" type="text" name="address" label="admin.address"
                                placeholder="{{ __('admin.enter_property_address') }}" :value="$property->address" />

                            <x-elements.form-textarea-field id="description" name="description" label="admin.description"
                                placeholder="{{ __('admin.enter_property_descriprion') }}" rows="3" :value="$property->description" />

                        </form>

                    </x-elements.form-card>

                </div>
            </div>


        </section>
    </div>
@endsection
