function updateFileList() {
    const input = document.getElementById('fileUpload');
    const fileNamesSpan = document.getElementById('fileNames');
    if (input.files.length > 0) {
        const fileNames = Array.from(input.files).map(file => file.name).join(', ');
        fileNamesSpan.textContent = fileNames;
    } else {
        fileNamesSpan.textContent = "No file selected";
    }
}

function handleSelect(selectElement) {
    const otherInput = document.getElementById("otherInputContainer");
    if (selectElement.value === "others") {
      otherInput.style.display = "block";
    } else {
      otherInput.style.display = "none";
    }
  }

document.addEventListener('DOMContentLoaded', () => {

    console.log("userID from session:", window.sessionData.user_id);

    const postJobBtn = document.getElementById('postJob');
    postJobBtn.addEventListener('click', () => {
        Swal.fire({
            title: "<strong>Post a job</strong>",
            width: "50%",
            html: `
                <div style="height: 450px; overflow-y: auto;">
                    <div class="d-flex flex-column justify-content-start align-items-center h-150px">
                        <input type="text" class="form-control-sm w-100 m-1 p-2 swal2-input" placeholder="Company name" id="companyName">
                        <textarea class="form-control-sm h-150px swal2-input" placeholder="Description" rows="2" id="description"></textarea>
                    </div>
                    <div class= "d-flex flex-row mt-3">
                        <div class="w-50 me-5">
                                <div class="d-flex flex-column justify-content-start align-items-start gap-2 mb-1">
                                    <h6>What kind of job do you offer?</h6>
                                    <p><label for="select-job" class="small">Enter Job Title</label></p>
                                    <select class="form-select small swal2-input" aria-label="Default select example" id="jobSelect" onchange="handleSelect(this)">
                                            <option value="Tubero">Tubero</option>
                                            <option value="Electrician">Electrician</option>
                                            <option value="others">Other</option>
                                    </select>
                                    <div id="otherInputContainer" style="display:none; ">
                                        <label for="otherText" class="small float-start">Please specify</label>
                                        <input type="text swal2-input" id="otherJob" class="form-control-sm w-100 m-1 p-2" />
                                    </div>
                                </div>

                                <div class="d-flex flex-column justify-content-start align-items-start gap-2 mb-1">
                                    <label for="salary" class="small"><p>Salary Range</p></label>
                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <input type="number" class="form-control-sm m-1 p-2 swal2-input" min="300" id="salaryRange_start" placeholder="Range Start">
                                        <p>-</p>
                                        <input type="number" class="form-control-sm m-1 p-2 swal2-input" min="300" id="salaryRange_end" placeholder="Range End">
                                    </div>
                                    
                                </div>

                                <div class="d-flex flex-column justify-content-start align-items-start gap-2 mb-1">
                                    <label for="file-upload" class="small">File Attachment/s</label>
                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('fileUpload').click()">Choose Files</button>
                                    <input type="file" class="swal2-input" id="fileUpload" name="file_upload[]" accept=".pdf, image/*" multiple hidden onchange="updateFileList()">
                                    <span id="fileNames" class="small text-muted">No file selected</span>
                                </div>

                        </div>
                        <div class="w-50">
                                <div class="d-flex flex-column justify-content-start align-items-start mb-1">
                                    <h6>Job Status: <span class="active">Active</span></h6>
                                    <label for="location" class="small">Location</label>
                                    <textarea class="form-control-sm h-50px mt-1 swal2-input" placeholder="Enter Location" id="location" name="location"></textarea>
                                </div>
                                <div class="d-flex flex-column justify-content-start align-items-start mb-1">
                                    <label for="numberApplicants" class="small">How many applicants do you need?</label>
                                    <input type="number" class="text-center swal2-input" min="1" id="applicant_count">
                                </div>
                                <div class="d-flex flex-column justify-content-start align-items-start mb-1">
                                    <label for="yearExp" class="small">Year of experience</label>
                                    <input type="number" class="text-center swal2-input" value="" min="0" id="year_experience">
                                </div>
                                <div class="d-flex flex-column justify-content-start align-items-start mb-1">
                                    <label for="dueDate" class="small">Job offer deadline</label>
                                    <input type="date" class="swal2-input" id="date" name="deadline" style="width: 150px;">
                                </div>
                        </div>
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: "Post",
            preConfirm: () => {
                const companyName = document.getElementById('companyName').value.trim();
                const description = document.getElementById('description').value.trim();
                const jobSelect = document.getElementById('jobSelect').value.trim();
                const otherJob = document.getElementById('otherJob').value.trim();
                const salaryRange_start = document.getElementById('salaryRange_start').value.trim();
                const salaryRange_end = document.getElementById('salaryRange_end').value.trim();
                const fileUpload = document.getElementById('fileUpload').files[0];
                const location = document.getElementById('location').value.trim();
                const applicant_count = document.getElementById('applicant_count').value.trim();
                const year_experience = document.getElementById('year_experience').value.trim();
                const date = document.getElementById('date').value.trim();
            
                if (
                    !companyName || !description || !jobSelect ||
                    (jobSelect === 'others' && !otherJob) ||
                    !salaryRange_start || !salaryRange_end || !fileUpload ||
                    !location || !applicant_count || !year_experience || !date
                ) {
                    Swal.showValidationMessage(`Please fill in all required fields`);
                    return false;
                }
            
                const formData = new FormData();
                formData.append('companyName', companyName);
                formData.append('description', description);
                formData.append('jobSelect', jobSelect);
                formData.append('otherJob', otherJob);
                formData.append('salaryRange_start', salaryRange_start);
                formData.append('salaryRange_end', salaryRange_end);
                formData.append('fileUpload', fileUpload); // important: this is a File object
                formData.append('location', location);
                formData.append('applicant_count', applicant_count);
                formData.append('year_experience', year_experience);
                formData.append('date', date);
            
                return fetch('../ClientPortal/scriptsfordb/ClientPost.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (!data.success) {
                        throw new Error(data.message);
                    }
                    console.log(data);
                    return data;
                })
                .catch(error => {
                    const errorJSON = {
                        status: "error",
                        message: error.message || error.toString(),
                        timestamp: new Date().toISOString()
                    };
                    console.error("Error Log:", JSON.stringify(errorJSON, null, 2));
                    Swal.showValidationMessage(`Request failed: ${error.message || error}`);
                });
            }
            
            
            
        });
        

    })


});
