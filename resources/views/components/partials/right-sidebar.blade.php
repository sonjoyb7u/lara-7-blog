
    <div class="p-4 mb-3 bg-light rounded">
        <h4 class="font-italic">About</h4>
        <p class="mb-0">Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>
    </div>

    <div class="p-4">
        <h4 class="font-italic">Archives - ( All )</h4>
        <ol class="list-unstyled mb-0">
            @for($i=4; $i>=0; $i--)
            <li>
                {{--<a href="{{ route('blog.posts_archives', 'month='.$archive['month']. '&'.'year='.$archive['year']) }}">{{ $archive['month'] . ' ' . $archive['year'] }}</a>--}}
                <a href="{{ route('blog.post-archives', date('Y-m', strtotime(-$i . ' month'))) }}">{{ date('F Y', strtotime(-$i . ' month')) }}</a>
            </li>
            @endfor
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

