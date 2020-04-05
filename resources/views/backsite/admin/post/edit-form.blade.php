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
            </ul>

        </nav>
    </div>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 class="text-center p-2">Edit Post Form : </h2>
        </div>

        <div class="card-body">
            <form action="{{ route('posts.update', base64_encode($post_edit_data->id)) }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label for="title">Post Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter Post Title" value="{{ $post_edit_data->title }}">
                </div>
                <div class="form-group">
                    <label for="cat_id">Category Name</label>
                    <select name="cat_id" id="cat_id" class="form-control">
                        <option value="" disabled>Select Categoty Name</option>
                        @foreach($categories as $category)
                            <option {{ $category->id == $post_edit_data->cat_id ? 'selected' : '' }} value="{{ $category->id }}" {{ $category->cat_id == 1 ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="user_id">Post Author</label>
                    <input disabled type="text" class="form-control" id="user_id" name="user_id" value="{{ auth()->user()->full_name }}">
                </div>
                <div class="form-group">
                    <label for="desc">Post Description</label>
                    <textarea name="desc" id="desc" cols="30" rows="6" class="form-control">
                        {{ $post_edit_data->desc }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="image">Post Image</label>
                    &nbsp;&nbsp;&nbsp;
                    <img width="100" height="100" src="{{ asset('uploads/images/posts/'.$post_edit_data->image) }}" alt="{{ $post_edit_data->image }}">
                    <input type="file" name="image" id="image" class="form-control">
                </div>
                <div class="form-group">
                    <label for="status">Post Status</label>
                    <br>
                    <div class="form-check form-check-inline">
                        <input {{ $post_edit_data->status == 'draft' ? 'checked' : '' }} type="radio" id="status" class="form-check-input" name="status" value="draft">
                        <label for="status" class="form-check-label">Draft</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input {{ $post_edit_data->status == 'published' ? 'checked' : '' }} type="radio" id="status" class="form-check-input" name="status" value="published">
                        <label for="status" class="form-check-label">Published</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input {{ $post_edit_data->status == 'private' ? 'checked' : '' }} type="radio" id="status" class="form-check-input" name="status" value="private">
                        <label for="status" class="form-check-label">Private</label>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update Post</button>
            </form>
        </div>
    </div>
@endsection



@section('footer')
    @includeIf('components.partials.footer')
@endsection

