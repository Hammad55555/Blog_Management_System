
<div class="container">
    <h1>Edit Post</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form method="post" action="{{ route('blog.update', $post->id) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title) }}" required>

        </div>

        <div class="form-group">
            <label for="content">Content:</label>
            <textarea name="content" id="content" class="form-control" required>{{ old('content', $post->content) }}</textarea>

        </div>

        {{-- Add other fields as needed --}}

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
</div>




