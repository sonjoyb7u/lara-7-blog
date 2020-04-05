<header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4 pt-1">
            <a class="text-muted" href="#">{{ date('D Y-m-d, T h:i:s A') }}</a>
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
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('dashboard') }}">Dashboard</a>&nbsp;&nbsp;&nbsp;
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('logout') }}">Logout</a>
            @endauth

            @guest()
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Login</a>&nbsp;&nbsp;
                <a class="btn btn-sm btn-outline-secondary" href="{{ route('register') }}">Sign up</a>
            @endguest
        </div>
    </div>
</header>

<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <a class="p-3 text-muted" href="{{ route('blog.index') }}">
            HOME
        </a>
    </nav>
</div>

<hr>
