function updateFileList() {
    const input = document.getElementById('file-upload');
    const fileNamesSpan = document.getElementById('file-names');
    if (input.files.length > 0) {
        const fileNames = Array.from(input.files).map(file => file.name).join(', ');
        fileNamesSpan.textContent = fileNames;
    } else {
        fileNamesSpan.textContent = "No file selected";
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
                        <input type="text" class="form-control-sm w-100 m-1 p-2" placeholder="Company name" id="companyName">
                        <textarea class="form-control-sm h-150px" placeholder="Description" rows="2"></textarea>
                    </div>
                    <div class= "d-flex flex-row mt-3">
                        <div class="w-50 me-5">
                                <div class="d-flex flex-column justify-content-start align-items-start gap-2 mb-1">
                                    <h6>What kind of job do you offer?</h6>
                                    <p><label for="select-job" class="small">Enter Job Title</label></p>
                                    <select class="form-select small" aria-label="Default select example" id="jobSelect">
                                            <option value="Tubero">Tubero</option>
                                            <option value="Electrician">Electrician</option>
                                            <option value="Others">Other</option>
                                    </select>
                                </div>

                                <div class="d-flex flex-column justify-content-start align-items-start gap-2 mb-1">
                                    <label for="salary" class="small"><p>Salary Range</p></label>
                                    <div class="d-flex flex-row justify-content-center align-items-center">
                                        <input type="number" class=" form-control-sm m-1 p-2" min="300" placeholder="Range Start">
                                        <p>-</p>
                                        <input type="number" class=" form-control-sm m-1 p-2" min="300" placeholder="Range End">
                                    </div>
                                    
                                </div>

                                <div class="d-flex flex-column justify-content-start align-items-start gap-2 mb-1">
                                    <label for="file-upload" class="small">File Attachment/s</label>
                                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('file-upload').click()">Choose Files</button>
                                    <input type="file" id="file-upload" name="file_upload[]" accept=".pdf, image/*" multiple hidden onchange="updateFileList()">
                                    <span id="file-names" class="small text-muted">No file selected</span>
                                </div>

                        </div>
                        <div class="w-50">
                                <div class="d-flex flex-column justify-content-start align-items-start">
                                    <h6>Job Status: <span class="active">Active</span></h6>
                                    <label for="location" class="small">Location</label>
                                    <textarea class="form-control-sm h-50px" placeholder="Enter Location" id="location" name="location"></textarea>
                                </div>
                                <div class="d-flex flex-column justify-content-start align-items-start">
                                    <label for="numberApplicants" class="small">How many applicants do you need?</label>
                                    <input type="number" class="w-25 text-center" min="1" id="applicant_count">
                                </div>
                                <div class="d-flex flex-column justify-content-start align-items-start">
                                    <label for="yearExp" class="small">Year of experience</label>
                                    <input type="number" class="w-25 text-center" value="" min="0" id="year_experience">
                                </div>
                                <div class="d-flex flex-column justify-content-start align-items-start">
                                    <label for="dueDate" class="small">Job offer deadline</label>
                                    <input type="date" id="date" name="deadline" style="width: 150px;">
                                </div>
                        </div>
                    </div>
                </div>
            `,
            showCancelButton: true,
            confirmButtonText: "Post",
            preConfirm: () => {
                
            }
        });
        

    })


});
