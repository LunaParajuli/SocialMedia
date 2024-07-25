<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>Posts</h1>
    <a href="{{ route('content.create') }}">Create Post</a>
    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif
    @foreach ($posts as $post)
        <div class="post-container">
            <div class="post-header">
                <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post image" class="post-image">
                <div class="user-info">
                    <span class="username">{{ $post->username }}</span>
                    <span class="location">{{ $post->location }}</span>
                </div>
            </div>
            <div class="post-caption">
                <span class="username">{{ $post->username }}</span> {{ $post->caption }}
            </div>
            <a href="{{ route('content.show', $post) }}">View</a>
            <a href="{{ route('content.edit', $post) }}">Edit</a>
            <form action="{{ route('content.destroy', $post->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </div>
    @endforeach
    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
