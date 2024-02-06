


    <div class="container">
        <h1>Post List</h1>
        <ul>
            @foreach ($posts as $post)
                <li><a href="{{ route('blog.index', $post->id) }}">{{ $post->title }}</a></li>

            @endforeach
        </ul>
    </div>


