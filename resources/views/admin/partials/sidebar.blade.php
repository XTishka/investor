<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ asset('dist/img/investering-logo.png') }}" alt="{{ __('admin.logo_alt') }}"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><strong>Investering</strong></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src=" {{ asset('dist/img/user-avatar-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="{{ __('admin.user_image_alt') }}">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                @RoundIsset
                    <li class="nav-item">
                        <a href="{{ route('admin.dashboard') }}"
                            class="nav-link text-capitalize 
                    @if (request()->routeIs('admin.dashboard')) active @endif ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p class="text">{{ __('admin.dashboard') }}</p>
                        </a>
                    </li>
                @endRoundIsset


                <li class="nav-header text-uppercase">{{ __('admin.data') }}</li>

                @RoundIsset
                    <li class="nav-item">
                        <a href="{{ route('admin.stockholders') }}"
                            class="nav-link text-capitalize
                    @if (request()->routeIs('admin.stockholders')) active @endif ">
                            <i class="nav-icon fas fa-users"></i>
                            <p class="text">{{ __('admin.stockholders') }}</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.properties') }}"
                            class="nav-link text-capitalize @if (request()->routeIs('admin.properties')) active @endif ">
                            <i class="nav-icon fas fa-laptop-house"></i>
                            <p class="text">{{ __('admin.properties') }}</p>
                        </a>
                    </li>
                @endRoundIsset

                <li class="nav-item">
                    <a href="{{ route('admin.rounds') }}"
                        class="nav-link text-capitalize @if (request()->routeIs('admin.rounds')) active @endif ">
                        <i class="nav-icon fas fa-recycle"></i>
                        <p class="text">{{ __('admin.rounds') }}</p>
                    </a>
                </li>

                @RoundIsset
                    <li class="nav-item">
                        <a href="{{ route('admin.wishes') }}"
                            class="nav-link text-capitalize @if (request()->routeIs('admin.wish_index')) active @endif ">
                            <i class="nav-icon fas fa-star-half-alt"></i>
                            <p class="text">{{ __('admin.wishes') }}</p>
                        </a>
                    </li>
                @endRoundIsset

                <li class="nav-header text-uppercase">{{ __('admin.settings') }}</li>

                <li class="nav-item">
                    <a href="{{ route('admin.administrators') }}"
                        class="nav-link text-capitalize @if (request()->routeIs('admin.administrators')) active @endif ">
                        <i class="nav-icon fas fa-users"></i>
                        <p class="text">{{ __('Administrators') }}</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
