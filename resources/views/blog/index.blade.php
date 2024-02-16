

<div class="container">
    <h1>Posts List</h1>
    <ul>
        @foreach ($posts as $post)
        <li>
            <a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a>

            {{-- Add Update Button --}}
            <form action="{{ route('blog.edit', $post->id) }}" method="GET" style="display: inline;">
                @csrf
                <button type="submit" class="btn btn-primary">Update</button>
            </form>


            {{-- Delete Form --}}
            <form action="{{ route('blog.destroy', $post->id) }}" method="POST" style="display: inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
        @endforeach
    </ul>
</div>

