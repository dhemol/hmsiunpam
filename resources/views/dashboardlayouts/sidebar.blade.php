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
        </li>
        @can('superadmin')
            <li class="{{ Request::is('dashboard/admin*') ? 'active' : '' }}"><a class="nav-link"
                    href="{{ url('/dashboard/admin') }}"><i class="fas fa-user"></i>
                    <span>Data Admin</span></a></li>
        @endcan
        @can('superadmin')
            <li class="{{ Request::is('dashboard/archive*') ? 'active' : '' }}"><a class="nav-link "
                    href="{{ url('/dashboard/archive') }}"><i class="fas fa-file"></i>
                    <span>Data Arsip</span></a></li>
        @elsecan('admin')
            <li class="{{ Request::is('dashboard/archive*') ? 'active' : '' }}"><a class="nav-link "
                    href="{{ url('/dashboard/archive') }}"><i class="fas fa-file"></i>
                    <span>Data Arsip</span></a></li>
        @endcan
        @can('superadmin')
            <li
                class="nav-item dropdown {{ Request::is('dashboard/post') && 'dashboard/event' && 'dashboard/about' && 'dashboard/faq' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><i class="fas fa-home"></i>
                    <span>Data Organisasi</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('dashboard/field*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/field') }}">Daftar Bidang</a></li>
                    <li class="{{ Request::is('dashboard/department*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/department') }}">Daftar Departement</a></li>
                    <li class="{{ Request::is('dashboard/position*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/position') }}">Daftar Jabatan</a></li>
                    <li class="{{ Request::is('dashboard/member*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/member') }}">Daftar Anggota</a></li>
                </ul>
            </li>
        @elsecan('admin')
            <li
                class="nav-item dropdown {{ Request::is('dashboard/post') && 'dashboard/event' && 'dashboard/about' && 'dashboard/faq' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><i class="fas fa-home"></i>
                    <span>Data Organisasi</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('dashboard/field*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/field') }}">Daftar Bidang</a></li>
                    <li class="{{ Request::is('dashboard/department*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/department') }}">Daftar Department</a></li>
                    <li class="{{ Request::is('dashboard/position*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/position') }}">Daftar Jabatan</a></li>
                    <li class="{{ Request::is('dashboard/member*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/member') }}">Daftar Anggota</a></li>
                </ul>
            </li>
        @endcan
        @can('superadmin')
            <li class="nav-item dropdown"
                class="{{ Request::is('dashboard/post') && 'dashboard/event' && 'dashboard/about' && 'dashboard/faq' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><i class="fas fa-newspaper"></i>
                    <span>Data Konten</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('dashboard/post*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/post') }}">Blog</a></li>
                    <li class="{{ Request::is('dashboard/category*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/category') }}">Category</a></li>
                    <li class="{{ Request::is('dashboard/event*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/event') }}">Agenda</a></li>
                    <li class="{{ Request::is('dashboard/about*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/about') }}">About</a></li>
                    <li class="{{ Request::is('dashboard/faq*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/faq') }}">FAQ</a></li>
                </ul>
            </li>
        @elsecan('admin')
            <li class="nav-item dropdown"
                class="{{ Request::is('dashboard/post') && 'dashboard/event' && 'dashboard/about' && 'dashboard/faq' ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown " data-toggle="dropdown"><i class="fas fa-newspaper"></i>
                    <span>Data Konten</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('dashboard/post*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/post') }}">Blog</a></li>
                    <li class="{{ Request::is('dashboard/category*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/category') }}">Category</a></li>
                    <li class="{{ Request::is('dashboard/event*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/event') }}">Agenda</a></li>
                    <li class="{{ Request::is('dashboard/about*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/about') }}">About</a></li>
                    <li class="{{ Request::is('dashboard/faq*') ? 'active' : '' }}"><a class="nav-link "
                            href="{{ url('/dashboard/faq') }}">FAQ</a></li>
                </ul>
            </li>
        @endcan
        <li class="menu-header">Main Menu</li>
        <li class="{{ Request::is('dashboard/post*') ? 'active' : '' }}"><a class="nav-link "
                href="{{ url('/dashboard/post') }}"><i class="fas fa-newspaper"></i>
                <span>Blog</span></a></li>
        <li class="{{ Request::is('dashboard/kategori*') ? 'active' : '' }}"><a class="nav-link "
                href="{{ url('/dashboard/kategori') }}"><i class="fas fa-newspaper"></i>
                <span>Category</span></a></li>
        <li class="{{ Request::is('dashboard/agenda*') ? 'active' : '' }}"><a class="nav-link "
                href="{{ url('/dashboard/agenda') }}"><i class="fas fa-calendar"></i>
                <span>Agenda</span></a></li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
        <a href="{{ url('/') }}" class="btn btn-primary btn-lg btn-block btn-icon-split">
            <i class="fas fa-rocket"></i> Back To BASI
        </a>
    </div>
</aside>
