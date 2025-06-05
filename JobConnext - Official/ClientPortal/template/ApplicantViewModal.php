<!-- Modal Structure -->
<div id="applicantsModal" class="custom-modal-overlay">
    <div class="custom-modal" data-jobid="">
        <input type="hidden" id="modalJobId" value="">
        <button class="close-btn" onclick="closeModal()">×</button>
        <strong class="workerTitle">WORKER APPLICANTS</strong>
        <div class="applicants-wrapper">
            <div class="applicants-left">
                <div style="margin-bottom: 1rem;">
                    <div class="applicant-status-buttons">
                        <button class="status-btn" onclick="filterApplicants('pending')">Pending <span id="count_pending">0</span></button>
                        <button class="status-btn" onclick="filterApplicants('accepted')">Accepted <span id="count_accepted">0</span></button>
                        <button class="status-btn" onclick="filterApplicants('rejected')">Rejected <span id="count_rejected">0</span></button>
                    </div>
                    <div id="applicantListContainer"></div>
                </div>
            </div>
            <div class="applicants-right" id="applicantsRightPanel">
                <img id="DefaultImage" src="../Assets/image/application_default.png" style="width: 100%; margin-bottom: 1rem;" />
                <img id="workerDetailImage"
                src=""
                style="width: 100px; height: 100px; border-radius: 50%; object-fit: cover; margin: 0 auto 1rem auto; display: none;" />

                <div id="workerDetailContent">
                    <p>Click "View" to show the information</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
