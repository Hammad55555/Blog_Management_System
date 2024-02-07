


    <div class="container">
        <h1>Posts List</h1>
        <ul>
            @foreach ($posts as $post)
            <li><a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a></li>


            @endforeach
        </ul>
    </div>


