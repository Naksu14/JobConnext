document.querySelectorAll('.card-link').forEach(link => {
    link.addEventListener('click', function(e) {
        e.preventDefault();

        const type = this.dataset.type;
        const clientId = this.dataset.clientid;
        const jobid = this.dataset.jobid;

        const targetButton = document.querySelector('#yourTargetButton');
        if (targetButton) {
            targetButton.dataset.clientid = clientId;
            targetButton.dataset.jobid = jobid; // use a separate attribute
        }



        // Update some text
        document.getElementById('clientid').textContent = clientId;

        // Update image src
        document.getElementById('client_image').src = `scriptsfordb/client_image.php?client_id=${encodeURIComponent(clientId)}`;

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
            document.getElementById('worker_image_display').src = this.dataset.image || 'default.jpg';

        } else if (type === 'job' || type === 'other-job') {
            // Show job detail view only
            document.getElementById('job_detail_view').style.display = 'block';

            if (type === 'job') {
                document.getElementById('job_done_button').style.display = 'block';
            } else {
                document.getElementById('job_done_button').style.display = 'none';
            }

            // Fill job view data
            const statusElem = document.getElementById('job_Status');
            const jobStatusRaw = this.dataset.jobStatus;

            if (jobStatusRaw) {
                const isActive = jobStatusRaw === 'Active';
                statusElem.textContent = jobStatusRaw;
                statusElem.className = `status-badge ${isActive ? 'active' : 'inactive'}`;
            } else {
                console.warn('Missing data-jobStatus on clicked element.');
                statusElem.textContent = 'Unknown';
                statusElem.className = 'status-badge inactive';
            }

            document.getElementById('company_name_display').textContent = this.dataset.companyname;
            document.getElementById('date_range_display').textContent = this.dataset.dates;
            document.getElementById('description_display').textContent = this.dataset.description;
            document.getElementById('location_display').textContent = this.dataset.location;
            document.getElementById('salary_display').textContent = this.dataset.salary;
            document.getElementById('applicants_display').textContent = this.dataset.applied;
            document.getElementById('email_display').textContent = this.dataset.email;
            document.getElementById('skills_display').innerHTML = this.dataset.skills;
            document.getElementById('yoe_display').textContent = this.dataset.yoe + ' years experience';
        }

    });
});


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
