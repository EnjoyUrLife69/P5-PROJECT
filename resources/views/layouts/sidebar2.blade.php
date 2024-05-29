<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="{{ route('home') }}"><img src="{{asset ('assets/images/logo.svg')}}" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="{{ route('home') }}"><img src="{{asset ('assets/images/logo-mini.svg')}}"
                alt="logo" /></a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="{{ route('home') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-bell-outline"></i>
                </span>
                <span class="menu-title">Artikel</span>
            </a>
        </li>
    </ul>
</nav>
