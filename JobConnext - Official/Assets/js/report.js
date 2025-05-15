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
// Function to show selected reasons for reporting
function showSelectedReasons() {
    const checked = document.querySelectorAll('input[name="reason"]:checked');
    const values = Array.from(checked).map(cb => cb.value);

    if (values.length === 0) {
        Swal.fire({
            icon: 'warning',
            title: 'No option selected',
            text: 'Please select at least one reason before submitting.'
        });
    } else {
        Swal.fire({
            icon: 'info',
            title: 'Selected Reasons',
            html: `<ul>${values.map(v => `<li>${v}</li>`).join('')}</ul>`
        });

        // Call the function to submit the report
        submitReport(values);
    }
}

// Function to handle the report submission
function submitReport(selectedReasons) {
    const modal = Swal.getPopup(); // get the current SweetAlert2 modal container
    const description = modal.querySelector('#description').value;
    const fileInput = modal.querySelector('#report_fileUpload');
    const files = fileInput.files;

    const formData = new FormData();
    formData.append('description', description);
    formData.append('reasons', JSON.stringify(selectedReasons));

    for (let i = 0; i < files.length; i++) {
        formData.append('files[]', files[i]);
    }

    fetch('../ClientPortal/scriptsfordb/report_record.php', {
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
function reportPost(event, user_id) {
    console.log("Reporting user:", user_id);

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
                        showSelectedReasons();
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
