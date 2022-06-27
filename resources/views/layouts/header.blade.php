<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                <!-- Top Left -->
                @auth
                    <div class="top-left">
                        <ul class="list-main">
                            <li><i class="ti-microsoft"></i> <a href="{{ url('/dashboard') }}">Dashboard
                                    Administrator</li>
                        </ul>
                    </div>
                @else
                    <div class="top-left">
                        <ul class="list-main">
                            <li><a href="#">Welcome to HMSI UNPAM Websites</li>
                        </ul>
                    </div>
                @endauth
                <!--/ End Top Left -->
            </div>
            <div class="col-lg-6 col-md-12 col-12">
                <!-- Top Right -->
                @auth
                    <div class="right-content">
                        <ul class="list-main">
                            <li><i class="ti-anchor"></i><a href="#">{{ auth()->user()->name }}</a></li>
                            <li>
                                <form action="{{ url('/logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="list-main"><i class="ti-power-off"></i>Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <div class="right-content">
                        <ul class="list-main">
                            <li><i class="ti-user"></i><a href="{{ url('/login') }}">Login</a></li>
                        </ul>
                    </div>
                @endauth
                <!-- End Top Right -->
            </div>
        </div>
    </div>
</div>
<div class="middle-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-12">


                <!-- Logo -->
                <div class="logo">
                    <a href="index.php"><img src="{{ url('/img/hmsi.png') }}" style="max-width: 60px"
                            alt="logo"></a>
                    <a href="https://www.unpam.ac.id/"><img src="{{ url('/img/unpam.png') }}" style="max-width: 60px"
                            alt="logo"></a>
                </div>
                <!--/ End Logo -->
                <!-- Search Form -->
                <div class="search-top">
                    <div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
                    <!-- Search Form -->
                    <div class="search-top">
                        <form class="search-form" name="search" method="get" action="/post">
                            @if (request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if (request('author'))
                                <input type="hidden" name="author" value="{{ request('author') }}">
                            @endif
                            <input class="form-control "name="search" placeholder="Search Here....." type="search"
                                value="{{ request('search') }}">
                            <button value="search" type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                    <!--/ End Search Form -->
                </div>
                <!--/ End Search Form -->
                <div class="mobile-nav"></div>
            </div>
            <div class="col-lg-10 col-md-8 col-12">
                <div class="search-bar-top">
                    <div class="search-bar">
                        <form name="search" method="get" action="/post">
                            @if (request('category'))
                                <input type="hidden" name="category" value="{{ request('category') }}">
                            @endif
                            @if (request('author'))
                                <input type="hidden" name="author" value="{{ request('author') }}">
                            @endif
                            <input class="form-control "name="search" placeholder="Search Here....." type="search"
                                value="{{ request('search') }}">
                            <button class="btnn" type="submit"><i class="ti-search"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<div class="header-inner">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-12">
                <div class="menu-area">
                    <!-- Main Menu -->
                    <nav class="navbar navbar-expand-lg">
                        <div class="navbar-collapse">
                            <div class="nav-inner">
                                <ul class="nav main-menu menu navbar-nav">
                                    <li class="@if ($active == 'Home | HMSI UNPAM') active @endif"><a
                                            href="{{ url('/') }}">
                                            HOME
                                        </a>
                                    </li>
                                    <li class="@if ($active == 'About | HMSI UNPAM') active @endif"><a
                                            href="{{ url('/about') }}">ABOUT<i class="ti-angle-down"></i></a>
                                        <ul class="dropdown">
                                            <li><a href="{{ url('/visimisi') }}">VISI & MISI</a></li>
                                            <li><a href="{{ url('/struktural') }}">STRUKTUR ORGANISASI</a></li>
                                        </ul>
                                    </li>
                                    <li class="@if ($active == 'Event | HMSI UNPAM') active @endif"><a
                                            href="{{ url('/event') }}">EVENT</a>
                                    </li>
                                    <li class="@if ($active == 'Blog | HMSI UNPAM') active @endif">
                                        <a href="{{ url('/post') }}">BLOG<i class="ti-angle-down"></i></a>
                                        <ul class="dropdown">
                                            <li class="@if ($active == 'Blog | HMSI UNPAM') active @endif"><a
                                                    href="{{ url('/post') }}">BLOGS</a></li>
                                            <li class="@if ($active == 'Blog | HMSI UNPAM') active @endif"><a
                                                    href="{{ url('/category') }}">CATEGORIES</a></li>
                                        </ul>
                                    </li>
                                    <li class="@if ($active == 'FAQ | HMSI UNPAM') active @endif"><a
                                            href="{{ url('/faq') }}">FAQ</a></li>
                                    <li class="@if ($active == 'Contact | HMSI UNPAM') active @endif"><a
                                            href="{{ url('/contact') }}">CONTACT US</a></li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                    <!--/ End Main Menu -->
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ End Header Inner -->
