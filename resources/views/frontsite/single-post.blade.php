@extends('components.blog-master')

@section('title')
    Lara-Blog-7 || Post Details
@endsection

@section('header')
    @includeIf('components.partials.header')
@endsection

@section('thumbnail')
    @includeIf('components.partials.thumbnail')
@endsection

@section('content')
        <div class="blog-post">
            <h2 class="blog-post-title">{{ $single_post['title'] }}</h2>
            <p class="blog-post-meta">{{ $single_post['created_at'] }} by <a href="#">{{ $single_post['author'] }}</a></p>

            {!! $single_post['short_desc'] !!}
        </div><!-- /.blog-post -->

@endsection

@section('right-sidebar')
    @includeIf('components.partials.right-sidebar')
@endsection

@section('footer')
    @includeIf('components.partials.footer')
@endsection
