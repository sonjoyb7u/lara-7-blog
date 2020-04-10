<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <a class="text-muted" href="#">{{ date('D Y-m-d, h:i:s A') }}</a>
        </div>
        <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="{{ route('blog.index') }}">[ LARA BLOG ]</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="text-muted" href="#" aria-label="Search">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
            </a>
            @auth()
                <span>Hello, Mr. {{ ucwords(auth()->user()->full_name) }}</span>&nbsp;
                <a class="btn btn-sm btn-outline-secondary" href="#">Profile</a>&nbsp;
                <a target="_blank" class="btn btn-sm btn-outline-secondary" href="{{ route('dashboard') }}">Dashboard</a>&nbsp;&nbsp;&nbsp;
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('logout') }}">Logout</a>
            @endauth

            @guest()
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Login</a>&nbsp;&nbsp;
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">Sign up</a>
            @endguest
        </div>
    </div>
</header>

<div class="m-3">
    <nav class="nav navbar-expand-sm">
        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="p-3 text-muted" href="{{ route('blog.index') }}">
                    HOME
                </a>
            </li>
            <!-- Dropdown -->
            <li class="nav-item dropdown">
                <a class="p-3 text-muted dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    CATEGORIES
                </a>
                <div class="dropdown-menu">
                    @foreach($categories as $category)
                        <a class="dropdown-item" href="{{ route('blog.category', $category->slug) }}">{{ $category->name }}</a>
                    @endforeach
                </div>
            </li>
        </ul>
    </nav>
</div>

<hr>
