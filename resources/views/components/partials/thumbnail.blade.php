<div class="row mb-2">
    @foreach($posts as $post)
        <div class="col-md-6">
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                <div class="col p-4 d-flex flex-column position-static">
                    <h3 class="mb-0">{{ substr($post->title, 0, 20) . ' ... ' }}</h3>
                    <div class="mb-1 text-muted">{{ date('d M Y', strtotime($post->created_at)) }}</div>
                    <span>Category : <strong class="d-inline-block mb-2 text-primary">{{ $post->category->name }}</strong></span>
                    <p class="card-text mb-auto">{{ substr($post->desc, 0, 70) . ' ... ' }}</p>
                    <a href="{{ route('blog.single_post', base64_encode($post->id)) }}" class="stretched-link">Continue reading</a>
                </div>
                <div class="col-auto d-none d-lg-block">
                    {{--<svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $post->image }}</text></svg>--}}
                    @if($post->image)
                        <img width="200" height="250" src="{{ asset('uploads/images/posts/'.$post->image) }}" alt="Post Image">
                    @else
                        <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
    <div class="m-auto">
            {{ $posts->links() }}
    </div>

        {{--<nav class="blog-pagination m-auto">--}}
            {{--<a class="btn btn-outline-primary" href="{{ $posts->previousPageUrl() }}">Older</a>--}}
            {{--<a class="btn btn-outline-primary" href="{{ $posts->nextPageUrl() }}" tabindex="-1" aria-disabled="true">Newer</a>--}}
        {{--</nav>--}}

</div>
