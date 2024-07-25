document.addEventListener('DOMContentLoaded', function () {
    // Like Button Functionality
    const likeBtns = document.querySelectorAll('.like-btn');
    likeBtns.forEach((likeBtn) => {
        const postContainer = likeBtn.closest('.post-container');
        const postLikes = postContainer.querySelector('.post-likes span');
        let likesCount = parseInt(postLikes.textContent) || 100;

        likeBtn.addEventListener('click', function () {
            if (likeBtn.classList.contains('liked')) {
                likesCount--;
                likeBtn.classList.remove('liked');
            } else {
                likesCount++;
                likeBtn.classList.add('liked');
            }
            postLikes.textContent = `${likesCount} likes`;
        });
    });

    // Comment Toggle Functionality
    const commentBtns = document.querySelectorAll('.comment-btn');
    commentBtns.forEach((commentBtn) => {
        commentBtn.addEventListener('click', function () {
            const postContainer = commentBtn.closest('.post-container');
            const commentSection = postContainer.querySelector('.post-comments-section');

            // Toggle the display property of the comment section
            if (commentSection.style.display === 'none' || commentSection.style.display === '') {
                commentSection.style.display = 'block';
            } else {
                commentSection.style.display = 'none';
            }
        });
    });
});

function postComment(postId) {
    const usernameInput = document.getElementById(`comment-username-${postId}`);
    const commentInput = document.getElementById(`comment-text-${postId}`);

    const username = usernameInput.value;
    const comment = commentInput.value;

    if (!username || !comment) {
        alert('Please enter both a username and a comment.');
        return;
    }

    fetch(`/posts/${postId}/comments`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({
            username: username,
            comment: comment,
        }),
    })
        .then(response => response.json())
        .then(data => {
            if (data.id) {
                const postContainer = document.querySelector(`.post-container[data-post-id="${postId}"]`);
                const commentsSection = postContainer.querySelector('.post-comments');
                const newComment = document.createElement('div');
                newComment.innerHTML = `<span class="username">${data.username}</span> ${data.comment}<br>`;
                commentsSection.appendChild(newComment);

                // Clear input fields
                usernameInput.value = '';
                commentInput.value = '';
            } else {
                alert('Failed to post comment.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Failed to post comment.');
        });
}
