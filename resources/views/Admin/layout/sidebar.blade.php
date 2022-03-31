<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">
    <div class="logo">
        <a href="#">
            <img src="{{ asset ('admin_assets/images/icon/logo.png')}}" alt="Cool Admin" />
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li class="has-sub">
                    <a class="js-arrow" href="{{ url('/dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                </li>
                <li>
                    <a href="{{ url('/category_add')}}">
                        <i class="fas fa-cart-plus"></i>Add Categories</a>
                </li>
                <li>
                    <a href="{{ url('/categories')}}">
                        <i class="fas fa-cart-plus"></i>Categories</a>
                </li>
                <li>
                    <a href="{{ url('/product')}}">
                        <i class="fab fa-product-hunt"></i>Add Product</a>
                </li>
                <li>
                    <a href="{{ url('/products')}}">
                        <i class="fab fa-product-hunt"></i>Product</a>
                </li>
                <li>
                    <a href="{{ url('/Orders')}}">
                        <i class="fas fa-cart-plus"></i>Orders</a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<!-- END MENU SIDEBAR-->
