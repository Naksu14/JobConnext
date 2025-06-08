function toggleFavorite(event, jobPostId) {
    event.preventDefault();
    event.stopPropagation();

    const link = event.target;

    fetch('../BlueCollarWorkerPortal/scriptsForDbWorker/favoriteJob.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ job_post_id: jobPostId })
    })
        .then(response => response.json())
        .then(data => {
            const card = document.querySelector(`[data-jobid="${jobPostId}"]`);
            if (data.status === 'favorited') {
                showCustomAlert("Job added to favorites!");
                if (card) {
                    card.classList.add('favorited');
                }
                setTimeout(() => {
                    location.reload();
                }, 1000); // reload after 1 second


                if (link) link.textContent = "Unfavorite";
            } else if (data.status === 'unfavorited') {
                showCustomAlert("Job removed from favorites!", 'danger');
                setTimeout(() => {
                    location.reload();
                }, 1000);
                if (card) {
                    card.classList.remove('favorited');
                }
                if (link) link.textContent = "Favorite";
            } else {
                showCustomAlert("Something went wrong.", 'danger');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showCustomAlert("Server error.", 'danger');
        });
}



document.querySelectorAll('.dropdown-item').forEach(item => {
    item.addEventListener('click', function (e) {
        e.preventDefault();

        const filterType = this.getAttribute('data-filter');
        const cards = document.querySelectorAll('.card-link');

        cards.forEach(card => {
            const isFavorited = card.classList.contains('favorited');

            if (filterType === 'date_asc') { // Favorites Only
                card.classList.toggle('d-none', !isFavorited);
            } else { // All Jobs
                card.classList.remove('d-none');
            }
        });

        // Update the button label (optional)
        document.querySelector('#filterDropdown span').textContent =
            filterType === 'date_asc' ? 'Favorites' : 'All Jobs';
    });
});


function unfavoriteJob(event, jobPostId) {
    event.preventDefault();
    event.stopPropagation();

    fetch('../BlueCollarWorkerPortal/scriptsForDbWorker/favoriteJob.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            job_post_id: jobPostId,
            mode: 'unfavorite'
        })
    })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'unfavorited') {
                alert("Job removed from favorites!");
                const card = document.querySelector(`[data-job-id="${jobPostId}"]`);
                if (card) card.classList.remove('favorited');
            } else {
                alert("Failed to unfavorite.");
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert("Server error.");
        });
}

function showCustomAlert(message, type = 'success') {
    const alertBox = document.getElementById('customAlert');
    alertBox.textContent = message;
    alertBox.style.backgroundColor = type === 'success' ? '#198754' : '#dc3545';
    alertBox.style.display = 'block';

    setTimeout(() => {
        alertBox.style.display = 'none';
    }, 2000); // visible for 2 seconds
}
