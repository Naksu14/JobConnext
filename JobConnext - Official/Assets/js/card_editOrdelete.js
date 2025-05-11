  function toggleDropdown(menuContainer) {
    // Close all other open dropdowns
    document.querySelectorAll('.dropdown').forEach(d => d.classList.remove('show'));

    const dropdown = menuContainer.querySelector('.dropdown');
    dropdown.classList.toggle('show');
  }

  function handleCardClick(event) {
    const card = event.currentTarget;
    const jobId = card.getAttribute('data-jobid');
    console.log('Card clicked. Job ID:', jobId);
    // Redirect or open modal etc.
  }

  function editItem(event) {
    event.stopPropagation();
    alert('Edit clicked');
  }

function deleteItem(event, jobPostId) {
    event.stopPropagation();

    Swal.fire({
        title: 'Are you sure?',
        text: "Do you want to archive this job post?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, archive it!',
        confirmButtonColor: '#161D6F',
        cancelButtonText: 'No, cancel!',
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('scriptsfordb/archive_jobpost.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'job_post_id=' + encodeURIComponent(jobPostId)
            })
            .then(res => res.text())
            .then(response => {
                showToast('success', 'Job post archived successfully!');
                setTimeout(() => location.reload(), 3200); // Delay reload so user sees the toast
            })
            .catch(err => {
                console.error('Error:', err);
                showToast('error', 'Failed to archive the job post.');
            });
        }
    });
}

function showToast(type, message) {
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: type,
        title: message,
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
}




  // Close dropdown when clicking outside
  document.addEventListener('click', function () {
    document.querySelectorAll('.dropdown').forEach(d => d.classList.remove('show'));
  });
