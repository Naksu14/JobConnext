function report_updateFileList() {
    const fileInput = document.getElementById('report_fileUpload');
    const fileNames = Array.from(fileInput.files).map(file => file.name).join(', ');
    document.getElementById('report_fileNames').textContent = fileNames || 'No file selected';

    const viewBtn = document.getElementById("attachedFile");

    if (fileInput.files.length > 0) {
        viewBtn.style.display = "inline-block"; // show the button

        // Create a Blob URL for the first file
        const fileUrl = URL.createObjectURL(fileInput.files[0]);

        // Assign click event to view the file in a new tab
        viewBtn.onclick = () => {
            window.open(fileUrl, '_blank');

            // Optional: Revoke object URL after a short delay to free memory
            setTimeout(() => URL.revokeObjectURL(fileUrl), 1000);
        };
    } else {
        viewBtn.style.display = "none";
    }
}


// Function to handle the report submission
function submitReport(user_id_report, job_post_id) {
    const checked = document.querySelectorAll('input[name="reason"]:checked');
    const values = Array.from(checked).map(cb => cb.value);
    const description = document.getElementById('report_description').value;
    const fileInput = document.getElementById('report_fileUpload');
    const jobpostId = job_post_id ?? null;
    const files = fileInput.files;

    console.log(description);
    console.log(files);
    console.log(values);
    console.log(user_id_report);

    const MAX_FILE_SIZE_MB = 5;
    const ALLOWED_TYPES = ['image/jpeg', 'image/png', 'application/pdf'];

    // VALIDATION
    if (values.length === 0) {
        Swal.showValidationMessage(`Please select at least one reason.`);
        return;
    }

    if (description === '') {
        Swal.showValidationMessage(`Please enter a description.`);
        return;
    }

    if (files.length === 0) {
        Swal.showValidationMessage(`Please attach at least one evidence file.`);
        return;
    }

    for (let file of files) {
        if (!ALLOWED_TYPES.includes(file.type)) {
            Swal.showValidationMessage(`File "${file.name}" is not an allowed type.`);
            return;
        }
        if (file.size > MAX_FILE_SIZE_MB * 1024 * 1024) {
            Swal.showValidationMessage(`File "${file.name}" exceeds the ${MAX_FILE_SIZE_MB}MB size limit.`);
            return;
        }
    }

    const formData = new FormData();
    formData.append('description', description);
    formData.append('report_id', user_id_report);
    formData.append('job_post_id', jobpostId);
    formData.append('reasons', JSON.stringify(values));

    for (let i = 0; i < files.length; i++) {
        formData.append('files[]', files[i]);
    }

    fetch('../ClientPortal/scriptsfordb/report_recorder.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            Swal.fire({
                icon: 'success',
                title: 'Report Submitted',
                text: 'Your report has been successfully submitted.'
            });
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Submission Failed',
                text: 'There was an issue submitting your report. Please try again later.'
            });
        }
    })
    .catch(error => {
        console.error('Error submitting report:', error);
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: 'Failed to submit the report. Please try again later.'
        });
    });
}


// Function to trigger the report modal
function reportPost(event, user_id, job_post_id) {
    console.log("Reporting user:", user_id);
    console.log("Job Post Id: ", job_post_id ?? "NO ID");

    fetch('../GuessPortal/report.php')
        .then(response => response.text())
        .then(html => {
            Swal.fire({
                title: "<strong>Report</strong>",
                width: "50%",
                html: `
                    <div id="report-form">
                        ${html}
                        <div style="margin-top: 20px;">
                            <button id="submitReportBtn" class="swal2-confirm swal2-styled" style="display: inline-block;">Submit</button>
                        </div>
                    </div>
                `,
                showConfirmButton: false
            });

            // Wait for DOM update to attach event listener
            setTimeout(() => {
                const submitBtn = document.getElementById('submitReportBtn');
                if (submitBtn) {
                    submitBtn.addEventListener('click', () => {
                        submitReport(user_id, job_post_id);
                    });
                }
            }, 100);
        })
        .catch(error => {
            console.error('Error loading report form:', error);
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: 'Failed to load the report form. Please try again later.'
            });
        });
}
