
<div id="reportModal" style="height: auto">
    <div class="d-flex flex-column align-items-start mb-4">
        <h6 style="color:red">Reasons for reporting</h6>
        <div class="checkbox-group">
            <div class="checkbox-wrapper">
                <input type="checkbox" id="fraud" name="reason" value="Fraud or scam">
                <label for="fraud">Fraud or scam</label>
            </div>
            <div class="checkbox-wrapper">
                <input type="checkbox" id="misinformation" name="reason" value="Misinformation">
                <label for="misinformation">Misinformation</label>
            </div>
            <div class="checkbox-wrapper">
                <input type="checkbox" id="threat" name="reason" value="Threat or Violence">
                <label for="threat">Threat or Violence</label>
            </div>
            <div class="checkbox-wrapper">
                <input type="checkbox" id="selfharm" name="reason" value="Self-harm">
                <label for="selfharm">Self-harm</label>
            </div>
            <div class="checkbox-wrapper">
                <input type="checkbox" id="extremist" name="reason" value="Dangerous or extremist worker">
                <label for="extremist">Dangerous or extremist worker</label>
            </div>
            <div class="checkbox-wrapper">
                <input type="checkbox" id="hateful" name="reason" value="Hateful Speech">
                <label for="hateful">Hateful Speech</label>
            </div>
            <div class="checkbox-wrapper">
                <input type="checkbox" id="others" name="reason" value="Others">
                <label for="others">Others</label>
            </div>
        </div>
    </div>
    <div class="d-flex flex-column align-items-start mb-4">
        <h6 style="color:red">Message Report</h6>
        <textarea class="form-control-sm p-2 swal2-input" placeholder="Report message" rows="2" id="description" style="height: 200px; resize: none;"></textarea>
    </div>
    <div class="d-flex flex-column justify-content-start align-items-start gap-2 mb-1">
        <h6 style="color:red">Evidence File Attachment</h6>
        <button type="button" class="btn btn-sm btn-outline-primary" onclick="document.getElementById('report_fileUpload').click()">Choose Files</button>
        <input type="file" class="swal2-input" id="report_fileUpload" name="file_upload[]" accept=".image/*" multiple hidden onchange="report_updateFileList()">
        <span id="report_fileNames" class="small text-muted">No file selected</span>
    </div>
</div>