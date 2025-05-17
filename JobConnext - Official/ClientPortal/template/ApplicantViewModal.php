<!-- Modal Structure -->
<div id="applicantsModal" class="custom-modal-overlay">
    <div class="custom-modal">
        <button class="close-btn" onclick="closeModal()">×</button>
        <strong class="workerTitle">WORKER APPLICANTS</strong>
        <div class="applicants-wrapper">
            <div class="applicants-left">
                <div style="margin-bottom: 1rem;">
                    <div class="applicant-status-buttons">
                        <button class="status-btn" onclick="filterApplicants('pending')">Pending <?php echo $Count_Applicants; ?></button>
                        <button class="status-btn" onclick="filterApplicants('accepted')">Accepted <?php echo $Count_Applicants; ?></button>
                        <button class="status-btn" onclick="filterApplicants('rejected')">Rejected <?php echo $Count_Applicants; ?></button>
                    </div>
                    <?php include '../ClientPortal/template/templateForApplicants.php' ?>
                </div>
            </div>
            <div class="applicants-right">
                <img src="../Assets/image/application_default.png" style="width: 100%; margin-bottom: 1rem;" />
                <p>click view resume to show the information</p>
            </div>
        </div>
    </div>
</div>
