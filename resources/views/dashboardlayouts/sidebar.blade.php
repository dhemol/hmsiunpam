<aside id="sidebar-wrapper">
    <div class="sidebar-brand">
        <img src="{{ url('/img/hmsi.png') }}" alt="" width="30px">
        <a href="#">ADMINISTRATOR</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <a href="#">HMSI</a>
    </div>
    <ul class="sidebar-menu">
        <li class="menu-header">Dashboard</li>
        <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link"
                href="{{ url('/dashboard') }}"><i class="fas fa-fire"></i>
                <span>Beranda</span></a>
        <li><a class="nav-link" href="{{ url('/') }}"><i class="fas fa-newspaper"></i>
                <span>BASI</span></a></li>
        </li>
        <li class="menu-header">Main Menu</li>
        <li class="{{ Request::is('dashboard/member') ? 'active' : '' }}"><a class="nav-link"
                href="{{ url('/dashboard/member') }}"><i class="fas fa-user"></i>
                <span>Anggota</span></a></li>
        <li class="{{ Request::is('dashboard/archive') ? 'active' : '' }}"><a class="nav-link "
                href="{{ url('/dashboard/archive') }}"><i class="fas fa-file"></i>
                <span>Arsip</span></a></li>
        <li class="{{ Request::is('dashboard/event') ? 'active' : '' }}"><a class="nav-link "
                href="{{ url('/dashboard/event') }}"><i class="fas fa-calendar"></i>
                <span>Agenda</span></a></li>
        <li class="nav-item dropdown"
            class="{{ Request::is('dashboard/post') && 'dashboard/event' && 'dashboard/about' && 'dashboard/faq' ? 'active' : '' }}">
            <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><i class="fas fa-newspaper"></i>
                <span>Konten</span></a>
            <ul class="dropdown-menu">
                <li class="{{ Request::is('dashboard/post') ? 'active' : '' }}"><a class="nav-link "
                        href="{{ url('/dashboard/post') }}">Article</a></li>
                <li class="{{ Request::is('dashboard/event') ? 'active' : '' }}"><a class="nav-link "
                        href="{{ url('/dashboard/event') }}">Event</a></li>
                <li class="{{ Request::is('dashboard/about') ? 'active' : '' }}"><a class="nav-link "
                        href="{{ url('/dashboard/about') }}">About</a></li>
                <li class="{{ Request::is('dashboard/faq') ? 'active' : '' }}"><a class="nav-link "
                        href="{{ url('/dashboard/faq') }}">FAQ</a></li>
            </ul>
        </li>
        <li class="{{ Request::is('dashboard/gallery') ? 'active' : '' }}"><a class="nav-link "
                href="{{ url('/dashboard/gallery') }}"><i class="far fa-images"></i>
                <span>Galeri</span></a></li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="{{ url('/') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Print Your FIle
        </a>
    </div>
</aside>
