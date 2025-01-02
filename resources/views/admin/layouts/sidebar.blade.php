<aside class="main-sidebar sidebar-dark-primary elevation-4">


    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            @auth
             
            <div class="info">
                <a href="#" class="d-block text-capitalize">{{ auth()->user()->name }}</a>
            </div>
            @endauth
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item has-treeview">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('customers.index') }}"
                        class="nav-link {{ request()->routeIs(['customers.index', 'customers.create', 'customers.edit']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-clock"></i>
                        <p>
                            Customers
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('vendors.index') }}"
                        class="nav-link {{ request()->routeIs(['vendors.index', 'vendors.create', 'vendors.edit']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-school"></i>
                        <p>
                            Vendors
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('services.index') }}"
                        class="nav-link {{ request()->routeIs(['services.index', 'services.create', 'services.edit']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-house-user"></i>
                        <p>
                            Serivces
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('events.index') }}"
                        class="nav-link {{ request()->routeIs(['events.index', 'events.create', 'events.edit']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Events
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ route('bookings.index') }}"
                        class="nav-link {{ request()->routeIs(['bookings.index', 'bookings.create', 'bookings.edit']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Bookings
                        </p>
                    </a>
                </li>
               

                <li class="nav-item has-treeview">
                    <a href="{{ route('admin.contacts') }}"
                        class="nav-link {{ request()->routeIs(['admin.contacts']) ? 'active' : '' }}">
                        <i class="nav-icon fas fa-user-graduate"></i>
                        <p>
                            Contacts
                        </p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a href="{{ route('profile.edit') }}" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            My Profile
                        </p>
                    </a>
                </li>

            </ul>
        </nav>

    </div>
 
</aside>