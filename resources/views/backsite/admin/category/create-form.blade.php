@extends('components.blog-master')

@section('title')
    Lara-Blog-7 || Add Category
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
                        Category
                    </a>
                </li>
            </ul>

        </nav>
    </div>
@endsection

@section('back-content')
<div class="card">
    <div class="card-header">
        <h2 class="text-center p-2">Add Category Form : </h2>
    </div>

    <div class="card-body">
        <form action="{{ route('categories.store') }}" method="post">
            @csrf

            <div class="form-group">
                <label for="name">Category Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category Name" value="{{ old('name') }}">
            </div>

            {{--<div class="form-group">--}}
                {{--<label for="status">Category Status</label>--}}
                {{--<select name="status" id="status" class="form-control">--}}
                    {{--<option value="" disabled>Select Status</option>--}}
                    {{--<option value="1">Active</option>--}}
                    {{--<option value="0">Inactive</option>--}}
                {{--</select>--}}
            {{--</div>--}}

            <div class="form-group">
                <label for="status">Categoty Status</label>
                <br>
                <div class="form-check form-check-inline">
                    <input type="radio" id="status" class="form-check-input" name="status" value="1">
                    <label for="status" class="form-check-label">Active</label>

                </div>
                <div class="form-check form-check-inline">
                    <input type="radio" id="status" class="form-check-input" name="status" value="0">
                    <label for="status" class="form-check-label">Inactive</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Add Category</button>
        </form>
    </div>
</div>
@endsection



@section('footer')
    @includeIf('components.partials.footer')
@endsection
