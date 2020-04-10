@extends('components.blog-master')

@section('title')
    Lara-Blog-7 || Manage Post
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


@section('back-content')

    <div class="card">
        <div class="card-header">
            <h3 class="float-left">Manage Posts : </h3>
            <a href="{{ route('posts.create') }}" class="btn btn-info btn-sm float-right">Add Post</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-responsive">
                <thead>
                <tr class="text-center">
                    <th style="width: 5%">SL No.</th>
                    <th style="width: 5%">Post Title</th>
                    <th style="width: 5%">Category Name</th>
                    <th style="width: 5%">Post Author</th>
                    <th>Post Description</th>
                    <th>Post Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                {{--@php($sl_no = 1)--}}
                @foreach($posts as $post)
                <tr class="text-center">
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>{{ $post->user->full_name }}</td>
                    <td>{{ substr($post->desc, 0, 50) . ' ... ' }}</td>
                    <td>
                        <img width="100" height="100" src="{{ asset('uploads/images/posts/'.$post->image) }}  " alt="Posts Image">
                    </td>
                    <td>
                        @if($post->status === 'draft')
                            <a href="" class="btn btn-success btn-sm">
                                Draft
                            </a>
                        @elseif($post->status === 'published')
                            <a href="" class="btn btn-warning btn-sm">
                                Published
                            </a>
                        @elseif($post->status === 'private')
                            <a href="" class="btn btn-secondary btn-sm">
                                Private
                            </a>

                        @endif

                    </td>
                    <td>
                        <a href="{{ route('posts.view', base64_encode($post->id)) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('posts.edit', base64_encode($post->id)) }}" class="btn btn-primary btn-sm">Edit</a>
                        {{--<span style="display: inline-block">--}}
                            {{--<form action="{{ route('categories.update', base64_encode($category->id)) }}" method="post">--}}
                                {{--@csrf--}}
                                {{--@method('EDIT')--}}
                                {{--<button type="submit" class="btn btn-primary btn-sm">Edit</button>--}}
                            {{--</form>--}}
                        {{--</span>--}}

                        <span style="display: inline-block">
                            <form action="{{ route('posts.delete', base64_encode($post->id)) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are U sure want to delete ?')">Delete</button>
                            </form>
                        </span>


                    </td>
                </tr>
                {{--@php($sl_no++)--}}
                @endforeach
                </tbody>
            </table>

            <div class="d-flex justify-content-between">
                <span>Showing {{ $posts->currentPage() }} to {{ $posts->perPage() }} of {{ $posts->total() }} entries.</span>
                {{ $posts->links() }}
            </div>

        </div>
    </div>
@endsection



@section('footer')
    @includeIf('components.partials.footer')
@endsection
