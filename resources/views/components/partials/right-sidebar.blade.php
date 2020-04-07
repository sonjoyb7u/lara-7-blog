
    <div class="p-4 mb-3 bg-light rounded">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>

    <div class="p-4">
        <h4 class="font-italic">Categories : </h4>
        <ol class="list-unstyled p-2">
            @foreach($categories as $category)
                <li><a href="{{ route('blog.totalPost', $category->id) }}">{{ $category->name }}</a></li>
            @endforeach
        </ol>
    </div>

    <div class="p-4">
        <h4 class="font-italic">Social Links : </h4>
        <ol class="list-unstyled">
            <li><a target="_blank" href="https://www.github.com">GitHub</a></li>
            <li><a target="_blank" href="https://www.twitter.com">Twitter</a></li>
            <li><a target="_blank" href="https://www.facebook.com">Facebook</a></li>
        </ol>
    </div>

