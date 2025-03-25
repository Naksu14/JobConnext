<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Posting Modal</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <style>
        .fullscreen-popup {
            margin: 0;
            border-radius: 5;
            height: 600px;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="sylesheet" href="../ClientPortal/ModalFolder/modal_post.css">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function showAlert() {
            Swal.fire({
                width: '1000px',
                html: `
            <div class="d-flex flex-row justify-content-center align-items-start" style="height: 600px;">
                <div class="flex-grow-1">
                    <div class="d-flex justify-content-start">
                        <h1 class="me-3">Application status</h1>
                        <select>
                            <option>pending</option>
                            <option>accepted</option>
                            <option>rejected</option>
                        </select>
                    </div>
                    <br>
                    
                    <p>no application yet</p>
                </div>
                <div class="flex-grow-1 d-flex flex-column justify-content-center align-items-center h-100">
                   <div class="d-flex flex-column">
                        <img src="../Assets/image/application_default.png" alt="yeet" style="height: 300px; width: 300px;">
                        <p>click view resume to show the information</p>
                   </div>
                </div>
            </div>
        `,
                showCloseButton: true,
                showConfirmButton: false, // Hides the button
            });
        }
    </script>

    <script>
        document.getElementById('post_something').addEventListener('click', () => {
            let clientId = <?php echo $_SESSION['client_id']; ?>;
            Swal.fire({
                title: 'Post a Job',
                html: `
                    <form id="job-posting-form" method="POST" action="../ClientPortal/create_jobpost.php" enctype="multipart/form-data">
                     <div class="modal-header">
                    <img src="../Assets/image/18a32bd5b48b9bc6ead9580129a54aaf.jpg" alt="">
                    <input type="text" class="input-modal" placeholder="Title..." id="post_title">
                </div>
                <div class="container description-box">
                    <textarea class="form-control" id="form-control-1" rows="3" placeholder="Enter description"></textarea>

                </div>
                <div class="container 1st-layer">
                    <div class="job-details">
                        <div class="job-options">
                            <h3>What kind of job do you offer?</h3>
                            <div class="job-offer-options">
                            <label>Enter Job Title:</label>
                            <input type="text" id="job-title" placeholder="Add the title you are hiring for">
                            </div>
                            <div class="salary-range">
                                <label>Salary Range:</label>
                                <input type="number" 
                                 min="300" placeholder="Range Start" id="range_start">
                                <label>-</label>
                                <input type="number" min="300" placeholder="Range End" id="range_end">
                            </div>

                            <div class="file-attachments">
<label>File Attachment/s:</label>

<div class="file-upload-container">
<label for="file-upload" class="file-upload-label">
<img src="../Assets/image/mdi_file-outline.png">
Upload Files
</label>
<input type="file" id="file-upload" name="file_upload[]" multiple hidden>

</div>
<span id="file-name-display" class="file-name-display">No file selected</span>
</div>

                        </div>
                        <div class="job-status">
                            <h3>Job Status: <span class="active">Active</span></h3>
                            <label>Location:</label>
                            <textarea placeholder="Enter Location" id="location" name="location"></textarea>
                            <div class="applicants-needed">
                                <label>How many applicants do you need?</label>
                                <input type="number"  min="1" id="applicant_count" name="applicant_count">
                            </div>
                            <div class="experience">
                                <label>Year of experience:</label>
                                <input type="number" value="" min="0" id="year_experience">
                            </div>
                            <div class="deadline">
                                <label>Job offer deadline:</label>
                                <input type="date" id="date" name="deadline">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
    </form>
                `,
                width: '50%',
                showCloseButton: true,
                showConfirmButton: true,
                confirmButtonText: 'Post',
                showCancelButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#161D6F',
                didOpen: () => {
                    // Attach event listener for file input inside the modal
                    document.getElementById("file-upload").addEventListener("change", function() {
                        let fileNames = Array.from(this.files).map(file => file.name).join(",  ");
                        document.getElementById("file-name-display").textContent = fileNames || "No file selected";

                        let previewContainer = document.getElementById("file-preview-container");
                        previewContainer.innerHTML = "";

                        Array.from(this.files).forEach(file => {
                            if (file.type.startsWith("image/")) {
                                let img = document.createElement("img");
                                img.classList.add("file-preview");
                                img.src = URL.createObjectURL(file);
                                previewContainer.appendChild(img);
                            }
                        });
                    });
                },
                preConfirm: () => {
                    let formData = new FormData();

                    let fileInput = document.getElementById("file-upload");
                    let description = document.getElementById("form-control-1").value.trim();
                    let job_offer = document.getElementById("post_title").value.trim();
                    let location = document.getElementById("location").value.trim();
                    let applicants = document.getElementById("applicant_count").value.trim();
                    let year_exp = document.getElementById("year_experience").value.trim();
                    let deadline = document.getElementById("date").value;
                    let job_title = document.getElementById("job-title").value;
                    let salary_start = document.getElementById("range_start").value;
                    let salary_end = document.getElementById("range_end").value;
                    let clientId = <?php echo $_SESSION['client_id']; ?>;

                    if (!description || !job_offer || !location || !applicants || !year_exp || !deadline || !salary_start || !salary_end || !job_title) {
                        Swal.showValidationMessage("You need to fill up all the information!");
                        return false;
                    }

                    if (isNaN(salary_start) || isNaN(salary_end)) {
                        Swal.showValidationMessage("Salary values must be numbers!");
                        return false;
                    }

                    if (salary_start <= 0) {
                        Swal.showValidationMessage("Invalid Salary Input");
                        return false;
                    }

                    if (salary_end < salary_start) {
                        Swal.showValidationMessage("Invalid Range");
                        return false;
                    }

                    formData.append("description", description);
                    formData.append("client_id", clientId);
                    formData.append("job_offer", job_offer);
                    formData.append("location", location);
                    formData.append("applicants", applicants);
                    formData.append("year_exp", year_exp);
                    formData.append("deadline", deadline);
                    formData.append("salary_start", salary_start);
                    formData.append("salary_end", salary_end);
                    formData.append("job_title", job_title);

                    if (fileInput.files.length > 0) {
                        for (let i = 0; i < fileInput.files.length; i++) {
                            formData.append("file_upload[]", fileInput.files[i]); 
                        }
                    }


                    return fetch('../ClientPortal/client_home.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.text())
                        .then(data => {
                            Swal.fire({
                                title: "Posted Successfully!",
                                text: "Your job post has been published.",
                                icon: "success",
                                confirmButtonColor: "#161D6F",
                            });
                        })
                        .catch(error => {
                            Swal.fire({
                                title: "Error!",
                                text: "Something went wrong. Please try again.",
                                icon: "error",
                                confirmButtonColor: "#d33"
                            });
                        });
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>