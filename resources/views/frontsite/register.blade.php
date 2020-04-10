@extends('components.blog-master')

@section('title')
    Lara-Blog-7 || Register
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
            <h2 class="text-center p-2">Registration Form : </h2>
        </div>

        @includeIf('message.message')

        <div class="card-body">
            <form action="{{ route('register') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" class="form-control" id="full_name" name="full_name" placeholder="Enter Full Name" value="{{ old('full_name') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email Address" value="{{ old('email') }}">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="user_name">User Name</label>
                    <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Enter User Name" value="{{ old('user_name') }}">
                </div>
                <div class="form-group">
                    <label for="image">Choose Image</label>
                    <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                </div>
                <div class="form-group">
                    <label for="c_password">Confirm Password</label>
                    <input type="password" class="form-control" id="c_password" name="password_confirmation" placeholder="Enter Confirm Password">
                </div>

                <button type="submit" class="btn btn-primary">Register</button>
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
