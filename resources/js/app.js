import "./bootstrap";
import axios from "axios";

window.deletePost = async function(id, creator_id) {
    if (!confirm('Are you sure you want to delete this post?')) {
        return;
    }

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    try {
        let result = await axios.delete('/post/delete-post', {
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'Content-Type': 'application/json',
            },
            data: {
                post_id: id,
                creator_id: creator_id
            }
        });

        if (result.status === 200) {
            alert('Post deleted successfully.');
            location.reload();  // Refresh the page if needed
        }
    } catch (error) {
        alert('Failed to delete the post. Please try again.');
    }
};
