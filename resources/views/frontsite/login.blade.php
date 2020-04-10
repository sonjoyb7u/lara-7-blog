@extends('components.blog-master')

@section('title')
    Lara-Blog-7 || Login
@endsection

@section('header')
    @includeIf('components.partials.header')
@endsection

@section('thumbnail')
    @includeIf('components.partials.thumbnail')
@endsection

@section('front-content')
    <div class="card">
        <div class="card-header">
            <h2 class="text-center p-2">Login Form : </h2>
        </div>

        <div class="card-body">
            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                </div>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
@endsection

@section('right-sidebar')
    @includeIf('components.partials.right-sidebar')
@endsection

@section('footer')
    @includeIf('components.partials.footer')
@endsection
