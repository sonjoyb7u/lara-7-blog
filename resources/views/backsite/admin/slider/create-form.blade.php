@extends('components.blog-master')

@section('title')
    Lara-Blog-7 || Add Slider
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
                <li style="list-style: none;">
                    <a class="p-3 text-muted {{ request()->is('slider') ? 'active' : '' }}" href="{{ route('sliders.index') }}">
                        All Sliders
                    </a>
                </li>
            </ul>

        </nav>
    </div>
@endsection

@section('back-content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center p-2">Add Slider Form : </h2>
    </div>

    <div class="card-body">
        <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Slider Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Slider Title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="desc">Slider Description</label>
                <textarea name="desc" id="desc" cols="30" rows="6" class="form-control">
                    {{ old('desc') }}
                </textarea>
            </div>
            <div class="form-group">
                <label for="image">Slider Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
            <div class="form-group">
                <label for="link">Slider Link</label>
                <input type="text" class="form-control" id="link" name="link" value="{{ old('link') }}">
            </div>
            <div class="form-group">
                <label for="status">Slider Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="">Select Status</option>
                        <option value="1">Active</option>
                        <option value="0">In Active</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Add Slider</button>
        </form>
    </div>
</div>
@endsection



@section('footer')
    @includeIf('components.partials.footer')
@endsection
