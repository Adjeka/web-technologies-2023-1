const postContainer = document.querySelector('[data-post-container]');
const commentsContainer = document.querySelector('[data-comments-container]');
const postId = new URLSearchParams(window.location.search).get('id');

const fetchPost = async (postId) => {
    try {
        const response = await fetch(`https://jsonplaceholder.typicode.com/posts/${postId}`);
        if (!response.ok) {
            throw new Error(`Failed to fetch post: ${response.status}`);
        }
        return response.json();
    } catch (error) {
        console.error('Error fetching post:', error);
        return null;
    }
};

const fetchComments = async (postId) => {
    try {
        const response = await fetch(`https://jsonplaceholder.typicode.com/posts/${postId}/comments`);
        if (!response.ok) {
            throw new Error(`Failed to fetch comments: ${response.status}`);
        }
        return response.json();
    } catch (error) {
        console.error('Error fetching comments:', error);
        return [];
    }
};

const renderPost = (post) => {
    if (post) {
        postContainer.innerHTML = `
            <h1>Post №${post.id}</h1>
            <h1>${post.title}</h1>
            <p>${post.body}</p>
            <hr>
        `;
    } else {
        postContainer.innerHTML = '<p>Failed to load post.</p>';
    }
};

const renderComments = (comments) => {
    if (comments.length > 0) {
        commentsContainer.innerHTML = comments.map(comment => `
            <div class="comment">
                <h3>${comment.name}</h3>
                <p>${comment.body}</p>
                <p>by ${comment.email}</p>
            </div>
            <hr>
        `).join('');
    } else {
        commentsContainer.innerHTML = '<p>No comments available.</p>';
    }
};

const init = async () => {
    const post = await fetchPost(postId);
    renderPost(post);

    const comments = await fetchComments(postId);
    renderComments(comments);
};

if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
} else {
    init();
};
