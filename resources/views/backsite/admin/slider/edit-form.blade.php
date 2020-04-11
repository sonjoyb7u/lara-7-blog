@extends('components.blog-master')

@section('title')
    Lara-Blog-7 || Edit Post
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
            <h2 class="text-center p-2">Edit Post Form : </h2>
        </div>

        <div class="card-body">
            <form action="{{ route('sliders.update', base64_encode($slider_edit_data->id)) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="title">Slider Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $slider_edit_data->title }}">
                </div>
                <div class="form-group">
                    <label for="desc">Slider Description</label>
                    <textarea name="desc" id="desc" cols="30" rows="6" class="form-control">
                    {{ $slider_edit_data->desc }}
                </textarea>
                </div>
                <div class="form-group">
                    <label for="image">Slider Image</label>
                    &nbsp;&nbsp;&nbsp;
                    <span><img width="120" height="80" src="{{ asset('uploads/images/sliders/'.$slider_edit_data->image) }}" alt="{{ $slider_edit_data->image }}"></span>
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="link">Slider Link</label>
                    <input type="text" class="form-control" id="link" name="link" value="{{ $slider_edit_data->link }}">
                </div>
                <div class="form-group">
                    <label for="status">Slider Status</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input {{ $slider_edit_data->status == '1' ? 'checked' : '' }} type="radio" id="status" class="form-check-input" name="status" value="1">
                        <label for="status" class="form-check-label">Active</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input {{ $slider_edit_data->status == '0' ? 'checked' : '' }} type="radio" id="status" class="form-check-input" name="status" value="0">
                        <label for="status" class="form-check-label">In Active</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Slider</button>
            </form>
        </div>
    </div>
@endsection



@section('footer')
    @includeIf('components.partials.footer')
@endsection

