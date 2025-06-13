<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? '' : 'collapsed' }}" href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('users.index') ? '' : 'collapsed' }}" href="{{ route('users.index') }}">
                <i class="bi bi-person"></i>
                <span>Users</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('products.index') ? '' : 'collapsed' }}" href="{{ route('products.index') }}">
                <i class="bi bi-person"></i>
                <span>Products</span>
            </a>
        </li>
       
        <!-- <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('get_order_list') ? '' : 'collapsed' }}" href="{{ route('get_order_list') }}">
                <i class="bi bi-person"></i>
                <span>Orders</span>
            </a>
        </li> -->
       
    </ul>
</aside>
