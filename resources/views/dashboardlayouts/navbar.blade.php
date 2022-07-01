<form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a>
        </li>
    </ul>
    <div class="search-element">
        <form class="search-element" name="search" method="get" action="/post">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}"
                    aria-label="Search"data-width="250">
            @endif
            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}"
                    aria-label="Search"data-width="250">
            @endif
            <input class="form-control" name="search" placeholder="Search Here....." type="search"
                value="{{ request('search') }}" aria-label="Search"data-width="250">
            <button class="btn" value="search" type="submit"><i class="fas fa-search"></i></button>
        </form>
        {{-- <input class="form-control" type="search" placeholder="Search" aria-label="Search"data-width="250">
        <button class="btn" type="submit"><i class="fas fa-search"></i></button>
        <div class="search-backdrop"></div>
        <div class="search-result">
            <div class="search-header">
                Histories
            </div>
            <div class="search-item">
                <a href="#">How to hack NASA using CSS</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
            </div>
            <div class="search-item">
                <a href="#">Kodinger.com</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
            </div>
            <div class="search-item">
                <a href="#">#Stisla</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
            </div>
        </div> --}}
    </div>
</form>
<ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown"
            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="{{ asset('storage/' . auth()->user()->image) }}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">
                {{ auth()->user()->name }}
            </div>
        </a>
        <div class="dropdown-menu dropdown-menu-right">
            <div class="dropdown-title">Hi! {{ auth()->user()->name }}</div>
            <a href="/dashboard/profile/{{ auth()->user()->username }}" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
            </a>
            <div class="dropdown-divider"></div>
            <a href=""></a>
            <form action="{{ url('/logout') }}" method="POST">
                @csrf
                <button type="submit" class="dropdown-item has-icon text-danger d-inline">
                    <i class="fas
                    fa-sign-out-alt"> Logout</i>
                </button>
            </form>
        </div>
    </li>
</ul>
