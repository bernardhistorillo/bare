<ul class="navbar-nav sidebar accordion" id="accordionSidebar" style="border-right:1px solid rgba(16,77,34,0.2); background-color:#8E7764">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home.index') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/home/bare-white.png') }}" alt="{{ config('app.name') }}" width="54" />
        </div>
        <div class="sidebar-brand-text mx-3">
            <img src="{{ asset('img/home/bare-white.png') }}" alt="{{ config('app.name') }}" height="22" />
        </div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item text-white {{ (Route::currentRouteName() == 'admin.subscribers.index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.subscribers.index') }}">
            <i class="fa-solid fa-fw fa-envelope"></i>
            <span>Subscribers</span>
        </a>
    </li>

    <hr class="sidebar-divider d-none d-md-block">

    <div class="text-center d-none d-md-inline mb-4">
        <button class="rounded-circle btn-custom-3 border-0" id="sidebarToggle"></button>
    </div>
</ul>
