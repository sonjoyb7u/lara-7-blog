@extends('components.blog-master')

@section('title')
    Lara-Blog-7 || Manage Slider
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
            <h3 class="float-left">Manage Sliders : </h3>
            <a href="{{ route('sliders.create') }}" class="btn btn-info btn-sm float-right">Add Slider</a>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-responsive">
                <thead>
                <tr class="text-center">
                    <th>SL No.</th>
                    <th>Slider Title</th>
                    <th>Slider Description</th>
                    <th>Slider Image</th>
                    <th>Slider link</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                {{--@php($sl_no = 1)--}}
                @foreach($sliders as $slider)
                <tr class="text-center">
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->title }}</td>
                    <td>{{ substr($slider->desc, 0, 50) . ' ... ' }}</td>
                    <td>
                        <img width="150" height="90" src="{{ asset('uploads/images/sliders/'.$slider->image) }}  " alt="Slider Image">
                    </td>
                    <td>{{ $slider->link }}</td>
                    <td>
                        @if($slider->status === 1)
                            <a href="" class="btn btn-success btn-sm">
                                Active
                            </a>
                        @elseif($slider->status === 0)
                            <a href="" class="btn btn-warning btn-sm">
                                In Active
                            </a>
                        @endif

                    </td>
                    <td>
                        <a href="{{ route('sliders.view', base64_encode($slider->id)) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('sliders.edit', base64_encode($slider->id)) }}" class="btn btn-primary btn-sm">Edit</a>
                        {{--<span style="display: inline-block">--}}
                            {{--<form action="{{ route('categories.update', base64_encode($category->id)) }}" method="post">--}}
                                {{--@csrf--}}
                                {{--@method('EDIT')--}}
                                {{--<button type="submit" class="btn btn-primary btn-sm">Edit</button>--}}
                            {{--</form>--}}
                        {{--</span>--}}

                        <span style="display: inline-block">
                            <form action="{{ route('sliders.delete', base64_encode($slider->id)) }}" method="post">
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
                <span>Showing {{ $sliders->currentPage() }} to {{ $sliders->perPage() }} of {{ $sliders->total() }} entries.</span>
                {{ $sliders->links() }}
            </div>

        </div>
    </div>
@endsection



@section('footer')
    @includeIf('components.partials.footer')
@endsection
