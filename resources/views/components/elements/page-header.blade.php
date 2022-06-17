<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>{{ __($title) }}</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right text-capitalize">
                    <li class="breadcrumb-item">
                        <a href="{{ route('admin.dashboard') }}">
                            <i class="nav-icon fas fa-tachometer-alt text-sm mr-2"></i>
                            {{ __('admin.dashboard') }}
                        </a>
                    </li>
                    @foreach ($breadcrumbs as $key => $route)
                        @if ($route != '#')
                            <li class="breadcrumb-item">
                                <a href="{{ route($route) }}">{{ __($key) }}</a>
                            </li>
                        @else
                            <li class="breadcrumb-item active">{{ __($key) }}</li>
                        @endif
                    @endforeach
                </ol>
            </div>
        </div>
    </div>
</section>
