<div id="customJobPostModalContent" style="display: none;">
    <div style="height: 500px; overflow-y: auto;">
        <div class="d-flex flex-column justify-content-start align-items-center h-150px">
            <textarea class="form-control-sm h-150px p-2 swal2-input" placeholder="Description" rows="2" id="description"></textarea>
        </div>
        <div class="d-flex flex-row mt-3">
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
                    <label for="salary" class="small">
                        <p>Salary Range</p>
                    </label>
                    <div class="d-flex flex-row justify-content-center align-items-center">
                        <input type="number" class="form-control-sm m-1 p-2 swal2-input" min="300" id="salaryRange_start" placeholder="Range Start">
                        <p>-</p>
                        <input type="number" class="form-control-sm m-1 p-2 swal2-input" min="300" id="salaryRange_end" placeholder="Range End">
                    </div>

                </div>

                <div class="d-flex flex-column justify-content-start align-items-start gap-2 mb-1">
                    <label for="file-upload" class="small">File Attachment/s</label>
                    <button id="viewAttachmentBtn">
                        <i class="bi bi-eye"></i> View Attachment
                    </button>

                    <button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('fileUpload').click()">Update Files</button>
                    <input type="file" class="swal2-input" id="fileUpload" name="file_upload" accept=".pdf, image/*" multiple hidden onchange="updateFileList()">
                    <span id="fileNames" class="small text-muted">No file selected</span>
                </div>

            </div>
            <div class="w-50">
                <div class="d-flex flex-column justify-content-start align-items-start mb-1">
                    <h6>Job Status: <span class="active">Active</span></h6>
                    <label for="location" class="small">Location</label>
                    <textarea class="form-control-sm h-50px mt-1 p-2 swal2-input" placeholder="Enter Location" id="location" name="location"></textarea>
                </div>
                <div class="d-flex flex-column justify-content-start align-items-start mb-1">
                    <label for="numberApplicants" class="small">How many applicants do you need?</label>
                    <input type="number" class="text-center swal2-input" min="1" name="applicants" id="applicant_count">
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
</div>