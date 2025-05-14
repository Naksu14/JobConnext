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
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem;">
                        <div style="display: flex; gap: 0.5rem; align-items: center;">
                        
                            <div style="width: 40px; height: 40px; border-radius: 50%; background: #ccc;"></div>
                            <div>
                                <div><b>Worker Name</b></div>
                                <div>Skills: 
                                    <span style="background: lightgreen; padding: 2px 5px; border-radius: 3px;">Text</span>
                                    <span style="background: lightblue; padding: 2px 5px; border-radius: 3px;">Text</span>
                                    <span style="background: lightcoral; padding: 2px 5px; border-radius: 3px;">Text</span>
                                </div>
                            </div>
                        </div>
                        <div><a href="#" class="view_resume">View Resume</a></div>
                    </div>
                </div>
            </div>
            <div class="applicants-right">
                <img src="../Assets/image/application_default.png" style="width: 100%; margin-bottom: 1rem;" />
                <p>click view resume to show the information</p>
            </div>
        </div>
    </div>
</div>
