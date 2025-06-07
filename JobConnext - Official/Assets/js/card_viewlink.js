function bindCardClickEvents() {
    document.querySelectorAll('.card-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        
        const card = event.currentTarget;
        const workerid = this.dataset.workerid;
        const type = this.dataset.type;
        const jobStatus = this.dataset.jobStatus;
        const clientId = this.dataset.clientid;
        const jobid = this.dataset.jobid;

        const applied = card.getAttribute('data-applied');
        const AcceptedApplicant = card.getAttribute('data-AcceptedApplicant');

        const targetButton = document.querySelector('#yourTargetButton');
        if (targetButton) {
            targetButton.dataset.clientid = clientId;
            targetButton.dataset.jobid = jobid; // use a separate attribute
        }
        const job_Complete = document.querySelector('#job_Complete');
        if (job_Complete) {
            job_Complete.dataset.clientid = clientId;
            job_Complete.dataset.jobid = jobid; // use a separate attribute
        }
        const complete_Applicants = document.querySelector('#complete_Applicants');
        if (complete_Applicants) {
            complete_Applicants.dataset.clientid = clientId;
            complete_Applicants.dataset.jobid = jobid; // use a separate attribute
        }

        // Update some text
        document.getElementById('clientid').textContent = clientId;
        // Update image src
        document.getElementById('client_image').src = `scriptsfordb/client_image.php?client_id=${encodeURIComponent(clientId)}`;

        // Update some text
        document.getElementById('workerid').textContent = clientId;
        // Update image src
        document.getElementById('worker_image').src = `scriptsfordb/workerImage.php?worker_id=${encodeURIComponent(workerid)}`;

        // Hide all views first
        document.getElementById('default_view').style.display = 'none';
        document.getElementById('job_detail_view').style.display = 'none';
        document.getElementById('worker_view').style.display = 'none';



        if (type === 'worker') {
            // Show worker view only
            document.getElementById('worker_view').style.display = 'block';

            document.getElementById('worker_id_display').textContent = this.dataset.workerid || 'N/A';
            document.getElementById('worker_name_display').textContent = this.dataset.name || 'N/A';
            document.getElementById('worker_location_display').textContent = this.dataset.location || 'N/A';
            document.getElementById('worker_yoe_display').textContent = (this.dataset.yoe || '0') + ' years experience';
            document.getElementById('worker_bio_display').textContent = this.dataset.bio || 'No bio provided.';
            document.getElementById('worker_phone_display').textContent = this.dataset.phone || 'No phone';
            document.getElementById('worker_skills_display').innerHTML = this.dataset.skills || 'No skills';

        } else if (type === 'job' || type === 'other-job') {
            // Show job detail view only
            document.getElementById('job_detail_view').style.display = 'block';

            const jobDoneButtonCompleted = document.getElementById('job_done_buttonCompleted');
            const jobDoneButtonApplicants = document.getElementById('job_done_buttonApplicants');
            const statusSpan = document.getElementById('job_status');
            const ratingView = document.getElementById('rate-content')

           if (type === 'job') {
                if (jobStatus === "Active") {                    
                    if (statusSpan) {
                        statusSpan.style.display = 'none';
                        jobDoneButtonCompleted.style.display = 'none';
                        jobDoneButtonApplicants.style.display = 'block';
                        ratingView.style.display = 'none';
                    }
                } else if (jobStatus === "Ongoing") {
                    if (statusSpan) {
                        statusSpan.textContent = 'Ongoing';
                        statusSpan.style.display = 'block';

                        jobDoneButtonCompleted.style.display = 'block';
                        jobDoneButtonApplicants.style.display = 'none';
                        ratingView.style.display = 'none';

                    }
                }else {
                    if (statusSpan) {
                        jobDoneButtonCompleted.style.display = 'none';
                        jobDoneButtonApplicants.style.display = 'none';
                        statusSpan.textContent = 'Job is Completed';
                        statusSpan.style.display = 'block';
                        ratingView.style.display = 'block';
                    }
                }
            }

            else {
                jobDoneButtonCompleted.style.display = 'none';
                jobDoneButtonApplicants.style.display = 'none';
            }

            // Fill job view data
            const statusElem = document.getElementById('job_Status');
            const jobStatusRaw = this.dataset.jobStatus;

            if (jobStatusRaw === 'Active') {
                statusElem.textContent = 'Active';
                statusElem.className = 'status-badge active';
            } else if (jobStatusRaw === 'Ongoing') {
                statusElem.textContent = 'Ongoing';
                statusElem.className = 'status-badge ongoing';
            } else {
                statusElem.textContent = 'Inactive';
                statusElem.className = 'status-badge inactive';
            }
            const jobOffer = card.dataset.joboffer;

            // Check if element with ID exists before setting text
            const jobOfferDisplay = document.getElementById('job_offer_display');
            if (jobOfferDisplay && jobOffer) {
                jobOfferDisplay.textContent = jobOffer;
            } else {
                console.warn('Element or data attribute missing');
            }

            document.getElementById('company_name_display').textContent = this.dataset.companyname;
            
            document.getElementById('date_range_display').textContent = this.dataset.dates;
            document.getElementById('description_display').textContent = this.dataset.description;
            document.getElementById('location_display').textContent = this.dataset.location;
            document.getElementById('salary_display').textContent = this.dataset.salary;
            document.getElementById('applicants_display').textContent = this.dataset.applied + ' Applicant Need';
            document.getElementById('email_display').textContent = this.dataset.email;
            document.getElementById('skills_display').innerHTML = this.dataset.skills;
            document.getElementById('yoe_display').textContent = this.dataset.yoe + ' years experience';
        }

    });
});
}



document.querySelector('#yourTargetButton').addEventListener('click', function() {
    const clientId = this.dataset.clientid;
    const jobId = this.dataset.jobid;

    console.log('Sending request with:', clientId, jobId);

    fetch(`scriptsfordb/get_file.php?client_id=${clientId}&job_id=${jobId}`)
        .then(response => {
            console.log('HTTP status:', response.status);
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);

            if (data.success && data.filepath) {
                window.open(data.filepath, '_blank');
            } else {
                alert(data.message || 'File not found.');
            }
        })
        .catch(err => {
            console.error('Fetch error:', err);
            alert('An error occurred while fetching the file.');
        });
});

let countIntervalId = null;

function openModal(event) {
    const jobId = event.currentTarget.getAttribute('data-jobid');

    // Store jobId in modal
    document.getElementById('modalJobId').value = jobId;
    document.querySelector('.custom-modal').setAttribute('data-jobid', jobId);

    // Show modal
    document.getElementById('applicantsModal').style.display = 'flex';

    // Fetch and update counts once immediately
    updateApplicantCounts(jobId);

    // Clear previous interval if exists
    if (countIntervalId) clearInterval(countIntervalId);

    // Start interval to update counts every 10 seconds
    countIntervalId = setInterval(() => {
        updateApplicantCounts(jobId);
    }, 1000);

    // Optional: filter to default view
    filterApplicants('pending', jobId);
}

function updateApplicantCounts(jobId) {
    fetch(`scriptsfordb/get_applicant_counts.php?job_id=${jobId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('count_pending').textContent = data.pending || 0;
            document.getElementById('count_accepted').textContent = data.accepted || 0;
            document.getElementById('count_rejected').textContent = data.rejected || 0;
        })
        .catch(err => {
            console.error('Error fetching counts:', err);
        });
}

function closeModal() {
    document.getElementById('applicantsModal').style.display = 'none';

    // Clear the interval to stop repeated calls when modal is closed
    if (countIntervalId) {
        clearInterval(countIntervalId);
        countIntervalId = null;
    }
    
    // Reset worker detail content
    const workerImage = document.getElementById('workerDetailImage');
    const defaultImage = document.getElementById('DefaultImage');
    const workerContent = document.getElementById('workerDetailContent');

    // Hide worker image
    if (workerImage) {
        workerImage.style.display = 'none';
        workerImage.src = '';
    }

    // Show default image
    if (defaultImage) {
        defaultImage.style.display = 'block';
    }

    // Reset content
    if (workerContent) {
        workerContent.innerHTML = `<p>Click "View" to show the information</p>`;
    }
}



function filterApplicants(status, jobId = null) {
    if (!jobId) {
        jobId = document.getElementById('modalJobId').value;
    }

    fetch(`scriptsfordb/get_applicants_by_status.php?job_id=${jobId}&status=${status}`)
        .then(res => res.json())
        .then(data => {
            const container = document.getElementById('applicantListContainer');
            container.innerHTML = '';

            if (data.length === 0) {
                container.innerHTML = `<p>No ${status} applicants found.</p>`;
                return;
            }

            data.forEach(applicant => {
                const html = `
                    <div class="applicant-card">
                        <div class="applicant-info">
                            <img class="applicant-avatar" src="${applicant.profile || '../Assets/image/worker_user.png'}" alt="Worker Profile">
                            <div class="applicant-detailss">
                                <div class="applicant-name"><strong>${applicant.name}</strong></div>
                                <div class="applicant-location">${applicant.location}</div>
                                <div class="applicant-experience">${applicant.year_experience} years experience</div>
                            </div>
                        </div>
                        <div class="applicant-actions">
                            <a href="javascript:void(0)" class="view-resume" onclick='showWorkerDetail(${JSON.stringify(applicant)})'>View</a>
                        </div>
                    </div>
                `;
                container.insertAdjacentHTML('beforeend', html);
            });
        })
        .catch(err => {
            console.error('Error:', err);
        });
}

function showWorkerDetail(applicant) {
    // (Insert your code to display applicant detail in the right panel...)

    const allViewLinks = document.querySelectorAll('.view-resume');

    allViewLinks.forEach(link => {
        // Reset all to default state
        link.classList.remove('disabled');
        link.textContent = 'View';
    });

    // Find and update the clicked link
    const clickedLink = Array.from(allViewLinks).find(link => {
        return link.getAttribute('onclick') === `showWorkerDetail(${JSON.stringify(applicant)})`;
    });

    if (clickedLink) {
        clickedLink.classList.add('disabled');
        clickedLink.textContent = 'Viewed';
    }
    
    const defaultImage = document.getElementById('DefaultImage');
    const profileImage = document.getElementById('workerDetailImage');
    const content = document.getElementById('workerDetailContent');

    // Hide default image and show profile image
    defaultImage.style.display = 'none';
    profileImage.style.display = 'block';

    // Set worker profile image or fallback
    profileImage.src = applicant.profile || '../Assets/image/worker_user.png';

    const pastelColors = [
        '#8B89E9', '#46CFA6', '#FFAEC9', '#A8E6CF', '#DCE775',
        '#FFCCBC', '#B39DDB', '#80DEEA', '#F48FB1', '#FFECB3'
    ];
    const getRandomColor = () => pastelColors[Math.floor(Math.random() * pastelColors.length)];

    const skills = applicant.hardSkills
        ? applicant.hardSkills.split(',').map(skill => {
            return `<span style="background:${getRandomColor()}; padding:4px 6px; margin:2px; border-radius:4px; display:inline-block;">
                        ${skill.trim()}
                    </span>`;
        }).join(' ')
        : 'No hard skills listed.';

            // Conditionally hide action buttons if accepted or rejected
    const actionButtonsHTML = (applicant.status === 'accepted' || applicant.status === 'rejected') ? '' : `
        <div class="action-buttons">
            <button class="btn-accept" onclick="handleAcceptReject('${applicant.worker_id}', '${applicant.job_post_id}', 'accepted')">Accept</button>
            <button class="btn-reject" onclick="handleAcceptReject('${applicant.worker_id}', '${applicant.job_post_id}', 'rejected')">Reject</button>
        </div>
    `;

    content.innerHTML = `
        <div class="applicant-details">
            <div class="applicant-name">${applicant.name}</div>
            <div class="applicant-location">${applicant.location}</div>
            <div class="applicant-experience">Phone No: ${applicant.phone_no} years</div>
            <div class="applicant-experience">Experience: ${applicant.year_experience}</div>
            <div class="applicant-skills">Skills: ${skills}</div>
            <div class="applicant-bio">Bio: ${applicant.bio || 'N/A'}</div>
            <div class="applicant-resume">
                <a href="scriptsfordb/get_Worker_file.php?worker_id=${applicant.worker_id}" target="_blank">📄 Download Resume</a>
            </div>
             ${actionButtonsHTML}
        </div>

    `;
}

function handleAcceptReject(workerId, jobId, action) {
    const actionText = action === 'accepted' ? 'Accept' : 'Reject';

    Swal.fire({
        title: `Are you sure you want to ${actionText.toLowerCase()} this applicant?`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: action === 'accepted' ? '#4CAF50' : '#f44336',
        cancelButtonColor: '#ccc',
        confirmButtonText: `Yes, ${actionText}`,
    }).then((result) => {
        if (result.isConfirmed) {
            fetch('scriptsfordb/update_applicant_status.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ workerId, jobId, action })
            })
            .then(res => res.json())
            .then(data => {
                Swal.fire({
                    icon: data.success ? 'success' : 'error',
                    title: data.message || 'Status updated.'
                });

                if (data.success) {
                    filterApplicants(action, jobId); // Refresh the applicant list
                    
                    // Hide/show details panel after update
                    const profileImage = document.getElementById('workerDetailImage');
                    const defaultImage = document.getElementById('DefaultImage');
                    const detailContent = document.getElementById('workerDetailContent');

                    if (profileImage && defaultImage && detailContent) {
                        profileImage.style.display = 'none';
                        defaultImage.style.display = 'block';
                        detailContent.innerHTML = '<p style="text-align:center;">Select an applicant to view details</p>';
                    }

                    // Optional: Reset view link states
                    const allViewLinks = document.querySelectorAll('.view-resume');
                    allViewLinks.forEach(link => {
                        link.classList.remove('disabled');
                        link.textContent = 'View';
                    });
                }
            })
            .catch(err => {
                console.error(err);
                Swal.fire('Error', 'There was a problem updating the status.', 'error');
            });
        }
    });
}

    document.querySelector('#job_Complete').addEventListener('click', function() {
        const clientId = this.dataset.clientid;
        const jobId = this.dataset.jobid;
        console.log(clientId,jobId,'Inactive');
        updateJobStatus(clientId,jobId,'Inactive');
    });

    document.querySelector('#complete_Applicants').addEventListener('click', function() {
        const clientId = this.dataset.clientid;
        const jobId = this.dataset.jobid;
        updateJobStatus(clientId,jobId,'Ongoing');
        console.log(clientId,jobId,'Ongoing');
    });

function updateJobStatus(clientId, jobId, status) {
    Swal.fire({
        title: 'Are you sure?',
        text: `You are about to mark this job as "${status}".`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, proceed',
        cancelButtonText: 'Cancel'
    }).then((result) => {
        if (result.isConfirmed) {
            // Proceed with the fetch if user confirms
            fetch('scriptsfordb/update_job_status.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ jobId, clientId, status })
            })
            .then(res => res.json())
            .then(data => {
                Swal.fire({
                    icon: data.success ? 'success' : 'error',
                    title: data.message || 'Status updated'
                });

                if (data.success && status === 'Inactive') {
                    document.getElementById('job_done_buttonCompleted').style.display = 'none';
                    document.getElementById('job_status').textContent = 'Job is Completed';
                }

                if (status === 'Ongoing') {
                    document.getElementById('job_status').textContent = 'Ongoing';
                    document.getElementById('job_status').style.display = 'block';
                    document.getElementById('job_done_buttonApplicants').style.display = 'none';
                    document.getElementById('job_done_buttonCompleted').style.display = 'block';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire('Error', 'Failed to update job status.', 'error');
            });
        }
    });
}


// Initial binding on DOM load
document.addEventListener('DOMContentLoaded', function () {
    bindCardClickEvents();
});

// Job filter
document.querySelectorAll('.dropdown-item[data-filter]').forEach(item => {
    item.addEventListener('click', function (e) {
        e.preventDefault();
        const filter = this.dataset.filter;

        fetch(window.location.href, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'filter=' + encodeURIComponent(filter)
        })
        .then(res => res.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newCards = doc.querySelector('#jobCardsContainer');
            document.querySelector('#jobCardsContainer').innerHTML = newCards.innerHTML;
            bindCardClickEvents(); // 🔁 rebind after load
        });
    });
});

// Worker filter
document.querySelectorAll('.dropdown-items[data-filters]').forEach(items => {
    items.addEventListener('click', function (e) {
        e.preventDefault();
        const filters = this.dataset.filters;

        fetch(window.location.href, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'filters=' + encodeURIComponent(filters)
        })
        .then(res => res.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newCards = doc.querySelector('#workerCardsContainer');
            document.querySelector('#workerCardsContainer').innerHTML = newCards.innerHTML;
            bindCardClickEvents(); // 🔁 rebind after load
        });
    });
});

// Other job filter
document.querySelectorAll('.dropdown-itemothers[data-filterothers]').forEach(items => {
    items.addEventListener('click', function (e) {
        e.preventDefault();
        const filterothers = this.dataset.filterothers;

        fetch(window.location.href, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: 'filterothers=' + encodeURIComponent(filterothers)
        })
        .then(res => res.text())
        .then(html => {
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            const newCards = doc.querySelector('#otherJobCardsContainer');
            document.querySelector('#otherJobCardsContainer').innerHTML = newCards.innerHTML;
            bindCardClickEvents(); // 🔁 rebind after load
        });
    });
});



document.querySelectorAll('.rate-worker-btn').forEach(button => {
    button.addEventListener('click', function () {
        const workerId = this.dataset.workerid;
        const jobId = this.dataset.jobid;

        document.getElementById('worker_id').value = workerId;
        document.getElementById('job_id').value = jobId;

        // Show modal
        document.getElementById('rateWorkerModal').style.display = 'block';
    });
});

// Close modal when clicking the close button
document.querySelector('#rateWorkerModal .close').addEventListener('click', function () {
    document.getElementById('rateWorkerModal').style.display = 'none';
});

// document.querySelector('#rate-worker-btn').addEventListener('click', function() {
//     const jobId = this.dataset.jobid;


// });

// // Submit form
// document.getElementById('rateWorkerForm').addEventListener('submit', function (e) {
//     e.preventDefault();

//     const rating = document.getElementById('rating').value;
//     const feedback = document.getElementById('feedback').value;
//     const workerId = document.getElementById('worker_id').value;
//     const jobId = document.getElementById('job_id').value;

//     fetch('rate_worker.php', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/x-www-form-urlencoded',
//         },
//         body: new URLSearchParams({
//             rating,
//             feedback,
//             worker_id: workerId,
//             job_id: jobId
//         })
//     })
//     .then(response => response.text())
//     .then(result => {
//         alert("Rating submitted!");
//         document.getElementById('rateWorkerModal').style.display = 'none';
//     })
//     .catch(error => {
//         console.error('Error submitting rating:', error);
//     });
// });
