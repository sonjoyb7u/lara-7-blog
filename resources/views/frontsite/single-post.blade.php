@extends('components.blog-master')

@section('title')
    Lara-7-Blog || Post Details
@endsection

@section('header')
    @includeIf('components.partials.header')
@endsection

@section('thumbnail')
    @includeIf('components.partials.thumbnail')
@endsection

@section('front-content')
            <div class="blog-post">
                <h2 class="blog-post-title">{{ $single_post->title }}</h2>
                <p class="blog-post-meta">{{ date('d M Y', strtotime($single_post->created_at)) }} by <a href="#">{{ $single_post->user->full_name }}</a></p>
                <span>Category : <strong class="d-inline-block mb-2 text-primary">{{ $single_post->category->name }}</strong></span>
                <img width="100%" height="300" src="{{ asset('uploads/images/posts/'.$single_post->image) }}" alt="">
                <h3 class="mt-3">Description : </h3>
                <p>
                    {!! $single_post->desc !!}
                </p>
            </div><!-- /.blog-post -->
@endsection

@section('right-sidebar')
    @includeIf('components.partials.right-sidebar')
@endsection

@section('footer')
    @includeIf('components.partials.footer')
@endsection
