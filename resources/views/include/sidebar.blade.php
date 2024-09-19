<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="{{ route('dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-heading">Kelola Admin</li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('user.index') }}">
                <i class="bi bi-people"></i>
                <span>Kelola User</span>
            </a>
        </li><!-- End Kelola User Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('product.index') }}">
                <i class="bi bi-bag-check"></i>
                <span>Kelola Produk</span>
            </a>
        </li><!-- End Kelola Produk Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('supplier.index') }}">
                <i class="bi bi-person-badge"></i>
                <span>Kelola Supplier</span>
            </a>
        </li><!-- End Kelola Supplier Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('order.index') }}">
                <i class="bi bi-cart-check"></i>
                <span>Kelola Order</span>
            </a>
        </li><!-- End Kelola Order Page Nav -->

    </ul>

</aside><!-- End Sidebar-->
