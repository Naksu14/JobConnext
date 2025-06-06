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
                html: document.getElementById('customJobPostModalContents').innerHTML,
                width: '850px',
                showCancelButton: true,
                confirmButtonText: 'Save Changes',
                focusConfirm: false,
                didOpen: () => {
                     // Get elements inside modal (use Swal.getPopup())
                    const select = Swal.getPopup().querySelector("#jobSelects");
                    const otherInput = Swal.getPopup().querySelector("#otherInputContainers");

                    // Bind change listener
                    select.addEventListener("change", function () {
                        if (this.value === "otherss") {
                            otherInput.style.display = "block";
                        } else {
                            otherInput.style.display = "none";
                        }
                    });

                    // Trigger once on load in case "Other" is already selected
                    if (select.value === "otherss") {
                        otherInput.style.display = "block";
                    }
                    const popup = Swal.getPopup();

                    popup.querySelector('#descriptions').value = data.job.description;
                    popup.querySelector('#jobSelects').value = data.job.job_offer;
                    popup.querySelector('#salaryRange_starts').value = data.job.salary_start;
                    popup.querySelector('#salaryRange_ends').value = data.job.salary_end;
                    popup.querySelector('#locations').value = data.job.location;
                    popup.querySelector('#applicant_counts').value = data.job.applicants;
                    popup.querySelector('#year_experiencess').value = data.job.year_exp;
                    popup.querySelector('#dates').value = data.job.deadline;

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
                    const updatedescription = popup.querySelector('#descriptions').value;
                    const updatejob = Swal.getPopup().querySelector('#jobSelects').value === 'otherss'
                                ? Swal.getPopup().querySelector('#otherJobs').value
                                : Swal.getPopup().querySelector('#jobSelects').value;
                    const updatesalaryStart = popup.querySelector('#salaryRange_starts').value;
                    const updatesalaryEnd = popup.querySelector('#salaryRange_ends').value;
                    const updatelocation = popup.querySelector('#locations').value;
                    const updateapplicantCount = popup.querySelector('#applicant_counts').value;
                    const updateyearExp = popup.querySelector('#year_experiencess').value;
                    const updatedeadline = popup.querySelector('#dates').value;

                    if (!updatedescription || !updatelocation || !updateapplicantCount || !updatedeadline) {
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
                            updatedescription,
                            job: updatejob === 'otherss' ? updateotherJob : updatejob,
                            updatesalaryStart,
                            updatesalaryEnd,
                            updatelocation,
                            updateapplicantCount,
                            updateyearExp,
                            updatedeadline
                        })
                    })
                    .then(response => response.text()) // 👈 First get raw response
                    .then(text => {
                        console.log('Raw Response:', text); // 👈 This will show the HTML or JSON
                        return JSON.parse(text); // 👈 Try to parse it as JSON
                    })
                    .then(result => {
                        if (!result.success) {
                            throw new Error(result.message || 'Update failed');
                        }

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

                        setTimeout(() => {
                            const url = new URL(window.location);
                            url.searchParams.delete('success');
                            window.history.replaceState({}, document.title, url.pathname + url.search);
                        }, 2100);
                        setTimeout(() => location.reload(), 3200);

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

function updateFileLists() {
    const inputs = document.getElementById('fileUploads');
    const fileNamesSpans = document.getElementById('fileNamess');
    if (inputs.files.length > 0) {
        const fileNamess = Array.from(inputs.files).map(file => file.name).join(', ');
        fileNamesSpans.textContent = fileNamess;
    } else {
        fileNamesSpans.textContent = "No file selected";
    }
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
                console.log('Server response:', response);
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
