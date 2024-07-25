<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
</head>

<body>
    <h1>Edit Post</h1>
    <form action="{{ route('content.update', $post) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('POST')
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" value="{{ $post->username }}" required>
        </div>
        </br>
        <div>
            <label for="location">Location:</label>
            <input type="text" name="location" id="location" value="{{ $post->location }}">
        </div>
        </br>
        <div>
            <label for="image">Image:</label>
            <input type="file" name="image" id="image">
        </div>
        </br>
        <div>
            <label for="caption">Caption:</label>
            <textarea name="caption" id="caption">{{ $post->caption }}</textarea>
        </div>
        </br>
        <button type="submit">Update Post</button>
    </form>
</body>

</html>
