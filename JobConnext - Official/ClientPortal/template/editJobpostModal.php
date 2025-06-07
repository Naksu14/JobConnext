    <div id="customJobPostModalContents" style="display: none;">
        <div style="height: 500px; overflow-y: auto;">
            <div class="d-flex flex-column justify-content-start align-items-center h-150px">
                <textarea class="form-control-sm h-150px p-2 swal2-input" placeholder="Description" rows="2" id="descriptions" name="descriptions"></textarea>
            </div>
            <div class="d-flex flex-row mt-3">
                <div class="w-50 me-5">
                    <div class="d-flex flex-column justify-content-start align-items-start gap-2 mb-1">
                        <h6>What kind of job do you offer?</h6>
                        <p><label for="select-job" class="small">Enter Job Title</label></p>
                        <select class="form-select small swal2-input" aria-label="Default select example" id="jobSelects" name="jobSelects" onchange="handleSelects(this)">
                            <option value="" disabled selected>Select Job Title</option>
                                        <option value="Carpenter">Carpenter</option>
                                        <option value="Electrician">Electrician</option>
                                        <option value="Plumber">Plumber</option>
                                        <option value="Mason">Mason</option>
                                        <option value="Welder">Welder</option>
                                        <option value="Painter">Painter</option>
                                        <option value="Driver">Driver</option>
                                        <option value="Mechanic">Mechanic</option>
                                        <option value="Janitor">Janitor</option>
                                        <option value="Gardener">Gardener</option>
                                        <option value="Security Guard">Security Guard</option>
                                        <option value="Construction Helper">Construction Helper</option>
                                        <option value="Warehouse Staff">Warehouse Staff</option>
                                        <option value="Heavy Equipment Operator">Heavy Equipment Operator</option>
                                        <option value="Aircon Technician">Aircon Technician</option>
                                        <option value="CCTV Installer">CCTV Installer</option>
                                        <option value="Tile Setter">Tile Setter</option>
                                        <option value="Steelman">Steelman</option>
                                        <option value="Foreman">Foreman</option>
                                        <option value="Scaffolder">Scaffolder</option>
                                        <option value="Roofer">Roofer</option>
                                        <option value="Furniture Assembler">Furniture Assembler</option>
                                        <option value="Fabricator">Fabricator</option>
                                        <option value="Masonry Finisher">Masonry Finisher</option>
                                        <option value="otherss">Others</option>
                        </select>
                        <div id="otherInputContainers" style="display:none; ">
                            <label for="otherText" class="small float-start">Please specify</label>
                            <input type="text swal2-input" id="otherJobs" name="otherJobs" class="form-control-sm w-100 m-1 p-2" />
                        </div>                        
                    </div>

                    <div class="d-flex flex-column justify-content-start align-items-start gap-2 mb-1">
                        <label for="salary" class="small">
                            <p>Salary Range</p>
                        </label>
                        <div class="d-flex flex-row justify-content-center align-items-center">
                            <input type="number" class="form-control-sm m-1 p-2 swal2-input" min="300" id="salaryRange_starts" name="salaryRange_starts" placeholder="Range Start">
                            <p>-</p>
                            <input type="number" class="form-control-sm m-1 p-2 swal2-input" min="300" id="salaryRange_ends" name="salaryRange_ends" placeholder="Range End">
                        </div>

                    </div>

                    <div class="d-flex flex-column justify-content-start align-items-start gap-2 mb-1">
                        <label for="file-upload" class="small">File Attachment/s</label>
                        <button id="viewAttachmentBtn">
                            <i class="bi bi-eye"></i> View Attachment
                        </button>

                        <!-- <button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('fileUploads').click()">Update Files</button>
                    <input type="file" class="swal2-input" id="fileUploads" name="file_upload[]" accept=".pdf, image/*" multiple hidden onchange="updateFileLists()">
                    <span id="fileNamess" class="small text-muted">No file selected</span> -->
                    </div>

                </div>
                <div class="w-50">
                    <div class="d-flex flex-column justify-content-start align-items-start mb-1">
                        <h6>Job Status: <span class="active">Active</span></h6>
                        <label for="locations" class="small">Location</label>
                        <textarea class="form-control-sm h-50px mt-1 p-2 swal2-input" placeholder="Enter Location" id="locations" name="locationss"></textarea>
                    </div>
                    <div class="d-flex flex-column justify-content-start align-items-start mb-1">
                        <label for="numberApplicants" class="small">How many applicants do you need?</label>
                        <input type="number" class="text-center swal2-input" min="1" name="applicant_counts" id="applicant_counts">
                    </div>
                    <div class="d-flex flex-column justify-content-start align-items-start mb-1">
                        <label for="yearExp" class="small">Year of experience</label>
                        <input type="number" class="text-center swal2-input" value="" min="0" id="year_experiencess" name="year_experiencess">
                    </div>
                    <div class="d-flex flex-column justify-content-start align-items-start mb-1">
                        <label for="dueDate" class="small">Job offer deadline</label>
                        <input type="date" class="swal2-input" id="dates" name="dates" style="width: 150px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
