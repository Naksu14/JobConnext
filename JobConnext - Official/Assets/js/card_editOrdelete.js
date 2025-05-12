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

  function editItem(event, jobPostId) {
    event.preventDefault();
    event.stopPropagation();

    // Fetch the job post data using the jobPostId
    fetch(`scriptsfordb/get_jobPost.php?id=${jobPostId}`)
    .then(response => response.json())
    .then(data => {
        console.log('Fetched Data:', data); // Log the data here to see what is returned
        if (data.success) {
            Swal.fire({
                title: 'Edit Job Post',
                html: document.getElementById('customJobPostModalContent').innerHTML,
                width: '850px',
                showCancelButton: true,
                confirmButtonText: 'Save Changes',
                focusConfirm: false,
                didOpen: () => {
                    const popup = Swal.getPopup();

                    popup.querySelector('#description').value = data.job.description;
                    popup.querySelector('#jobSelect').value = data.job.job_offer;
                    popup.querySelector('#salaryRange_start').value = data.job.salary_start;
                    popup.querySelector('#salaryRange_end').value = data.job.salary_end;
                    popup.querySelector('#location').value = data.job.location;
                    popup.querySelector('#applicant_count').value = data.job.applicants;
                    popup.querySelector('#year_experience').value = data.job.year_exp;
                    popup.querySelector('#date').value = data.job.deadline;

                    const viewBtn = popup.querySelector('#viewAttachmentBtn');
                    if (viewBtn && data.job.client_file) {
                        const fileUrl = '../uploads/' + data.job.client_file;
                        viewBtn.setAttribute('data-file', fileUrl);
                        viewBtn.addEventListener('click', () => {
                            window.open(fileUrl, '_blank');
                        });
                    }

                },
                preConfirm: () => {
                    const popup = Swal.getPopup();
                    const description = popup.querySelector('#description').value;
                    const job = popup.querySelector('#jobSelect').value;
                    const otherJob = popup.querySelector('#otherJob')?.value || '';
                    const salaryStart = popup.querySelector('#salaryRange_start').value;
                    const salaryEnd = popup.querySelector('#salaryRange_end').value;
                    const location = popup.querySelector('#location').value;
                    const applicantCount = popup.querySelector('#applicant_count').value;
                    const yearExp = popup.querySelector('#year_experience').value;
                    const deadline = popup.querySelector('#date').value;

                    if (!description || !location || !applicantCount || !deadline) {
                        Swal.showValidationMessage('Please fill all required fields');
                        return false;
                    }

                    // Perform update here
                    return fetch('scriptsfordb/update_jobpost.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            id: jobPostId,
                            description,
                            job: job === 'others' ? otherJob : job,
                            salaryStart,
                            salaryEnd,
                            location,
                            applicantCount,
                            yearExp,
                            deadline
                        })
                    })
                    .then(response => response.json())
                    .then(result => {
                        if (!result.success) {
                            throw new Error(result.message || 'Update failed');
                        }

                        // Show success toast
                        Swal.fire({
                            toast: true,
                            position: "top-end",
                            icon: 'success',
                            title: 'Update Successful',
                            text: 'Job post updated successfully.',
                            timer: 2000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                            customClass: {
                                popup: 'custom-toast-size'
                            }
                        });

                        // Remove the query parameter after the alert
                        setTimeout(() => {
                            const url = new URL(window.location);
                            url.searchParams.delete('success');
                            window.history.replaceState({}, document.title, url.pathname + url.search);
                        }, 2100);

                        return result;
                    })
                    .catch(err => {
                        Swal.showValidationMessage(`Update failed: ${err.message}`);
                        return false;
                    });

                }

            });

        } else {
            console.error('Error fetching job post data:', data.message);
            Swal.fire('Error', 'Something went wrong fetching job data', 'error');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        Swal.fire('Error', 'There was an issue fetching the job data', 'error');
    });

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
