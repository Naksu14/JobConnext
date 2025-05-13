// Function to update file names after user selects files
function report_updateFileList() {
    const fileInput = document.getElementById('report_fileUpload');
    const fileNames = Array.from(fileInput.files).map(file => file.name).join(', ');
    document.getElementById('report_fileNames').textContent = fileNames || 'No file selected';
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
    const description = document.getElementById('description').value;
    const fileInput = document.getElementById('report_fileUpload');
    const files = fileInput.files;

    // Prepare form data to send to the server
    const formData = new FormData();
    formData.append('description', description);
    formData.append('reasons', JSON.stringify(selectedReasons));

    // Append files to the form data
    for (let i = 0; i < files.length; i++) {
        formData.append('files[]', files[i]);
    }

    // Send the report data to the server
    // fetch('../GuessPortal/report.php', {
    //     method: 'POST',
    //     body: formData
    // })
    // .then(response => response.json())
    // .then(data => {
    //     if (data.success) {
    //         Swal.fire({
    //             icon: 'success',
    //             title: 'Report Submitted',
    //             text: 'Your report has been successfully submitted.'
    //         });
    //     } else {
    //         Swal.fire({
    //             icon: 'error',
    //             title: 'Submission Failed',
    //             text: 'There was an issue submitting your report. Please try again later.'
    //         });
    //     }
    // })
    // .catch(error => {
    //     console.error('Error submitting report:', error);
    //     Swal.fire({
    //         icon: 'error',
    //         title: 'Oops!',
    //         text: 'Failed to submit the report. Please try again later.'
    //     });
    // });
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