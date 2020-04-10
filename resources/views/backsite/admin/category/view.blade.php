@extends('components.blog-master')

@section('title')
    Lara-Blog-7 || Manage Category
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
                        Al Categories
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


@section('back-content')

    <div class="well">
        <h2>View Single Category : </h2>
        <table class="table table-bordered table-stripped table-hover">
            <thead>
            <tr>
                <td>Category Id</td>
                <td>Category Name</td>
                <td>Category Slug</td>
                <td>Status</td>
                <td>Created At</td>
            </tr>

            </thead>
            <tbody>
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->slug }}</td>
                <td>{{ $category->status == 1 ? 'Active' : 'In-Active' }}</td>
                <td>{{ $category->created_at }}</td>
            </tr>

            </tbody>
        </table>

        <h3>Category - "{{ $category->name }}" no. of Posts : </h3>

        <table class="table table-bordered table-stripped table-hover">
            <thead>
            <th>Id</th>
            <th>Category Name</th>
            <th>Post Title</th>
            <th>Post Description</th>
            <th>Post Author</th>
            <th>Status</th>
            <th>Action</th>
            </thead>
            <tbody>
            @foreach($category->posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->desc }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $post->user->full_name }}</td>
                    <td>{{ $post->status == 1 ? 'Active' : 'In-Active' }}</td>
                    <td>
                        <a href="{{ route('posts.view', base64_encode($post->id)) }}" class="btn btn-info btn-sm"> <i class="fa fa-eye"></i>View</a>
                        <a href="{{ route('posts.edit', base64_encode($post->id)) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('posts.delete', base64_encode($post->id)) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are U sure want to delete ?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection



@section('footer')
    @includeIf('components.partials.footer')
@endsection

