@extends('components.blog-master')

@section('title')
    Lara-7-Blog || Home
@endsection

@section('header')
    @includeIf('components.partials.header')
@endsection

@section('jumbotron')
    @includeIf('components.partials.jumbotron')
@endsection

@section('content')
    @foreach($posts as $post)
    <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">{{ $post->category->name }}</strong>
            <h3 class="mb-0">{{ $post->title }}</h3>
            <div class="mb-1 text-muted">{{ $post->created_at }}</div>
            <p class="card-text mb-auto">{{ substr($post->desc, 0, 100) . ' ... ' }}</p>
            <a href="{{ route('blog.single_post', base64_encode($post->id)) }}" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
            {{--<svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $post->image }}</text></svg>--}}
            <img width="200" height="250" src="{{ asset('uploads/images/posts/'.$post->image) }}" alt="Post Image">
        </div>
    </div>
    @endforeach



    {{--{{ $posts->links() }}--}}

    <nav class="blog-pagination d-flex justify-content-center p-5">
        <a class="btn btn-outline-primary" href="{{ $posts->previousPageUrl() }}">Older</a>
        <a class="btn btn-outline-primary" href="{{ $posts->nextPageUrl() }}" tabindex="-1" aria-disabled="true">Newer</a>
    </nav>
@endsection


@section('right-sidebar')
    @includeIf('components.partials.right-sidebar')
@endsection

@section('footer')
    @includeIf('components.partials.footer')
@endsection
