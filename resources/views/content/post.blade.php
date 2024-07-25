<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instagram Post</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <div class="post-container">
        <div class="post-header">
            <img src="https://via.placeholder.com/40" alt="User avatar" class="avatar">
            <div class="user-info">
                <span class="username">username</span>
                <span class="location">Location</span>
            </div>
            <button class="follow-btn">Follow</button>
        </div>
        <img src="https://via.placeholder.com/600" alt="Post image" class="post-image">
        <div class="post-actions">
            <button class="like-btn">❤️</button>
            <button class="comment-btn">💬</button>
            <button class="share-btn">📤</button>
        </div>
        <div class="post-likes">
            <span>100 likes</span>
        </div>
        <div class="post-caption">
            <span class="username">username</span> This is a caption for the Instagram post.
        </div>
        <div class="post-comments">
            <span class="username">commenter1</span> This is a comment.
            <span class="username">commenter2</span> Another comment.
        </div>
        <div class="add-comment">
            <input type="text" placeholder="Add a comment...">
            <button class="post-btn">Post</button>
        </div>
    </div>
    <script src="{{ asset('js/script.js') }}" defer></script>
</body>


</html>
