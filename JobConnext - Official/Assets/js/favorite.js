function toggleFavorite(event, jobPostId) {
    event.preventDefault();
    event.stopPropagation();

    console.log("Sending job_post_id:", jobPostId);


    fetch('../BlueCollarWorkerPortal/scriptsForDbWorker/favoriteJob.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ job_post_id: jobPostId })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'favorited') {
            alert("Job added to favorites!");
        } else if (data.status === 'unfavorited') {
            alert("Job removed from favorites!");
        } else {
            alert("Something went wrong.");
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("Server error.");
    });
}
