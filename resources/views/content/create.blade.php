<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
</head>

<body>
    <div class="main"></div>
    <div class="create_post">
        <h1>Create Post</h1>
    </div>
    <div class="form_main">
        <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username" required>
            </div>
            </br>
            <div>
                <label for="location">Location:</label>
                <input type="text" name="location" id="location">
            </div>
            </br>
            <div>
                <label for="image">Image:</label>
                <input type="file" name="image" id="image" required>
            </div>
            </br>
            <div>
                <label for="caption">Caption:</label>
                <textarea name="caption" id="caption"></textarea>
            </div>
            </br>
            <button type="submit">Create Post</button>
        </form>
    </div>
</body>

</html>
