<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script>
        function showAlert() {
            Swal.fire({
                title: 'Report',
                html: `
            <h6 style="color:red">Reasons for reporting</h6>
            <div class="reason-buttons">
                 <button id="reasons">Fraud or scam</button>
                            <button id="reasons">Misinformation</button>
                            <button id="reasons-l">Threat or Violence</button>
                            <button id="reasons">Self-harm</button>
                            <button id="reasons-l">Dangerous or extremist worker</button>
                            <button id="reasons">Hateful Speech</button>
                            <button id="reasons">Others</button>
            </div>
            <div class="message-report">Message Report ⚠️</div>
            <textarea class="message-box form-control" placeholder="Describe your issue..."></textarea>
        `,
                showCancelButton: true,
                confirmButtonText: 'Next: Upload Proof',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#161D6F',
                width: '45%'
            }).then((result) => {
                if (result.isConfirmed) {
                    showUploadModal(); // Call the upload modal function
                }
            });
        }

        function showUploadModal() {
            Swal.fire({
                title: 'Upload Proof',
                html: `
            <div class="container-fluid upload-border">
                <div class="container upload-container">
                    <img src="../Assets/image/Vector1.png" alt="">
                    <span>Drag and Drop a file here or Choose a File</span>
                </div>
            </div>
            <div class="modal-body" id="upload-modal">
                <div class="req">
                    <p>Supported Format: PDF, JPEG, MP4, MP3</p>
                    <p>Maximum size: 25MB</p>
                </div>
                <div class="upload-info">
                    <div class="upload-inf-head">
                        <img src="../Assets/image/Vector.png" alt="">
                        <div class="file-info">
                            <span>Video ng report.mp4</span>
                            <span style="font-weight: bold; margin-top:0px">Size: 15MB</span>
                        </div>
                    </div>
                </div>
                <div class="progress" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="margin-top:20px">
                    <div class="progress-bar w-75"></div>
                </div>
            </div>
        `,
                showCancelButton: true,
                confirmButtonText: 'Submit Report!',
                cancelButtonText: 'Cancel',
                confirmButtonColor: '#161D6F',
                width: '45%'
            }).then((result) => {
                if (result.isConfirmed) {
                    showFinalMessage(); // Call the final message
                }
            });
        }

        function showFinalMessage() {
            Swal.fire({
                title: 'Report Submitted!',
                text: 'Thank you for reporting. We will review your submission.',
                icon: 'success',
                confirmButtonText: 'OK',
                confirmButtonColor: '#161D6F'
            });
        }

        // Trigger report modal on button click
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("reportButton").addEventListener("click", showReportModal);
        });
    </script>

</body>

</html>