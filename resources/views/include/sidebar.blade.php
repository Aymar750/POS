<div class="app-sidebar colored">
    <div class="sidebar-header">
        <a class="header-brand" href="{{ route('dashboard') }}">
            <div class="logo-img">
                <img height="30" src="{{ asset('img/logo_white.png') }}" class="header-brand-img" title="RADMIN"> 
            </div>
        </a>
        <div class="sidebar-action"><i class="ik ik-arrow-left-circle"></i></div>
        <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
    </div>

    @php
        $segment1 = request()->segment(1);
        $user = Auth::user();
        $userRole = $user->roles->first()->name ?? ''; // Utilisation de la première relation de rôle ou une chaîne vide
    @endphp
    
    <div class="sidebar-content">
        <div class="nav-container">
            <nav id="main-menu-navigation" class="navigation-main">
                <div class="nav-item {{ ($segment1 == 'dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}"><i class="ik ik-bar-chart-2"></i><span>{{ __('Tableau de bord') }}</span></a>
                </div>

                @if($userRole == 'Super Admin')
                <div class="nav-item {{ ($segment1 == 'inventory') ? 'active' : '' }}">
                    <a href="{{ url('inventory') }}"><i class="ik ik-shopping-cart"></i><span>{{ __('Inventaire') }}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'pos') ? 'active' : '' }}">
                    <a href="{{ url('pos') }}"><i class="ik ik-printer"></i><span>{{ __('POS') }}</span></a>
                </div>
                <div class="nav-item {{ ($segment1 == 'users' || $segment1 == 'roles' || $segment1 == 'permission') ? 'active open' : '' }} has-sub">
                    <a href="#"><i class="ik ik-user"></i><span>{{ __('Administration') }}</span></a>
                    <div class="submenu-content">
                        @can('manage_user')
                        <a href="{{ url('users') }}" class="menu-item {{ ($segment1 == 'users') ? 'active' : '' }}">{{ __('Utilisateurs') }}</a>
                        <a href="{{ url('user/create') }}" class="menu-item {{ ($segment1 == 'user' && $segment2 == 'create') ? 'active' : '' }}">{{ __('Ajout Utilisateur') }}</a>
                        @endcan
                        @can('manage_roles')
                        <a href="{{ url('roles') }}" class="menu-item {{ ($segment1 == 'roles') ? 'active' : '' }}">{{ __('Roles') }}</a>
                        @endcan
                        @can('manage_permission')
                        <a href="{{ url('permission') }}" class="menu-item {{ ($segment1 == 'permission') ? 'active' : '' }}">{{ __('Permissions') }}</a>
                        @endcan
                    </div>
                </div>
                @elseif($userRole == 'Gestionnaire')
                <div class="nav-item {{ ($segment1 == 'inventory') ? 'active' : '' }}">
                    <a href="{{ url('inventory') }}"><i class="ik ik-shopping-cart"></i><span>{{ __('Inventaire') }}</span></a>
                </div>
                @elseif($userRole == 'Vendeur')
                <div class="nav-item {{ ($segment1 == 'pos') ? 'active' : '' }}">
                    <a href="{{ url('pos') }}"><i class="ik ik-printer"></i><span>{{ __('POS') }}</span></a>
                </div>
                @endif
            </nav>   
        </div>
    </div>
</div>

 {{-- 
                <!-- Include demo pages inside sidebar start-->
                @include('pages.sidebar-menu')
                <!-- Include demo pages inside sidebar end--> --}}
