@extends('components.blog-master')

@section('title')
    Lara-Blog-7 || Admin Dashboard
@endsection

@section('header')
    @includeIf('backsite.admin.header')
@endsection

@section('left-sidebar')
    <h3 class="text-center">Left-Sidebar</h3>
    <div class="py-1 mb-5">
        <nav class="nav navbar-nav">
            <ul>
                <li style="list-style: none;">
                    <a class="p-3 text-muted {{ request()->is('category') ? 'active' : '' }}" href="{{ route('categories.index') }}">
                        All Categories
                    </a>
                </li>
                <li style="list-style: none;">
                    <a class="p-3 text-muted {{ request()->is('post') ? 'active' : '' }}" href="{{ route('posts.index') }}">
                        All Posts
                    </a>
                </li>

            </ul>

        </nav>
    </div>
@endsection

@section('content')
    <h2 class="text-center">Admin Dashboard</h2>
@endsection



@section('footer')
    @includeIf('components.partials.footer')
@endsection
