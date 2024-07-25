<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <h1>Post Details</h1>
    <div class="post-container">
        <div class="user-info">
            <span class="username">{{ $post->username }}</span>
            <span class="location">{{ $post->location }}</span>
        </div>
        <div class="post-header">
            <img src="{{ asset('storage/' . $post->image_path) }}" alt="Post image" class="post-image">

        </div>
        <div class="post-actions">
            <button class="like-btn">❤️</button>
            <button class="comment-btn" onclick="toggleComments(this)">💬</button>
            <button class="share-btn">📤</button>
        </div>
        <div class="post-likes">
            <span>100 likes</span>
        </div>
        <div class="post-caption">
            <span class="username">{{ $post->username }}</span> {{ $post->caption }}
        </div>
        <div class="post-comments">
            <span class="username">commenter1</span> This is a comment.
            <span class="username">commenter2</span> Another comment.
            <span class="username">{{ $post->username }}</span>{{ $post->caption }}
        </div>
        <div>
            <div class="add-comment">
                <input type="text" placeholder="Add a comment...">
                <button class="post-btn">Post</button>
            </div>
        </div>
    </div>
    <a href="{{ route('content.postindex') }}">Back to Posts</a>
    <script src="{{ asset('js/script.js') }}" defer></script>
</body>

</html>
