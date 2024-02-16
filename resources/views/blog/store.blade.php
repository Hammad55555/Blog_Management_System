
    <h1>Create a Blog Posts</h1>

    <form action="{{ route('blog.store') }}" method="POST">
        @csrf
         <div>
        <label for="title" >Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" required>
    </div>

        <label for="content">Content:</label>
        <textarea id="content" name="content" required>{{ old('content') }}</textarea>

        <button type="submit">Create Post</button>
    </form>


