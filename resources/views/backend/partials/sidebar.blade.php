@php
    $user = Auth::user();
@endphp

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('/') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ url('/') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Modules
    </div>

    <!-- Nav Item - Category -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCategory"
            aria-expanded="true" aria-controls="collapseCategory">
            <i class="fas fa-fw fa-th"></i>
            <span>Category</span>
        </a>
        <div id="collapseCategory"
            class="collapse {{ Route::is('categories.index') || Route::is('categories.create') || Route::is('categories.edit') || Route::is('categories-two.index') ? 'show' : '' }}"
            aria-labelledby="collapseCategory" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item {{ Route::is('categories.index') || Route::is('categories.edit') ? 'active' : '' }}"
                    href="{{ route('categories.index') }}">Yajra Categories</a>

                <a class="collapse-item {{ Route::is('categories-two.index') ? 'active' : '' }}"
                    href="{{ route('categories-two.index') }}">Normal Categories</a>

            </div>
        </div>
    </li>

</ul>
