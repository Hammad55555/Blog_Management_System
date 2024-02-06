
<form action="{{ route("blog.$action", isset($post) ? $post : null) }}" method="POST">
    @csrf
    @if($action === 'update')
        @method('PUT')
    @endif

    <label for="title">Title:</label>
    <input type="text" name="title" value="{{ old('title', isset($post) ? $post->title : '') }}" required>

    <label for="content">Content:</label>
    <textarea name="content" required>{{ old('content', isset($post) ? $post->content : '') }}</textarea>

    <!-- Add more form fields as needed -->

    <button type="submit">{{ $action === 'update' ? 'Update' : 'Create' }} Post</button>
</form>
