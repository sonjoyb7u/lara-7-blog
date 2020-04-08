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
            <h3 class="float-left">Manage Categories : </h3>
            <a href="{{ route('categories.create') }}" class="btn btn-info btn-sm float-right">Add Category</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-responsive">
                <thead>
                <tr class="text-center">
                    <th style="width: 5%">SL No.</th>
                    <th style="width: 16%">Category Name</th>
                    <th style="width: 30%">Category Slug</th>
                    <th style="width: 13%">Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                {{--@php($sl_no = 1)--}}
                @foreach($categories as $category)
                <tr class="text-center">
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>
                        @if($category->status === 1)
                            <a href="" class="btn btn-success btn-sm">
                                Active
                            </a>
                        @else
                            <a href="" class="btn btn-warning btn-sm">
                                In-Active
                            </a>
                        @endif

                    </td>
                    <td>
                        <a href="{{ route('categories.view', base64_encode($category->id)) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('categories.edit', [$category->slug, base64_encode($category->id)]) }}" class="btn btn-primary btn-sm">Edit</a>
                        {{--<span style="display: inline-block">--}}
                            {{--<form action="{{ route('categories.update', base64_encode($category->id)) }}" method="post">--}}
                                {{--@csrf--}}
                                {{--@method('EDIT')--}}
                                {{--<button type="submit" class="btn btn-primary btn-sm">Edit</button>--}}
                            {{--</form>--}}
                        {{--</span>--}}

                        <span style="display: inline-block">
                            <form action="{{ route('categories.delete', [base64_encode($category->id)]) }}" method="post">
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
                <span>Showing {{ $categories->currentPage() }} to {{ $categories->perPage() }} of {{ $categories->total() }} entries</span>
                {{ $categories->links() }}
            </div>

        </div>
    </div>
@endsection



@section('footer')
    @includeIf('components.partials.footer')
@endsection
