<!-- Rating Modal -->
<div id="rateWorkerModal" class="modal-worker" style="display: none;">
    <div class="modal-content-worker">
        <span class="close">&times;</span>
        <h3>Rate Worker</h3>
        <form id="rateWorkerForm">
            <label for="rating">Select Rating:</label>
            <select id="rating" name="rating" required>
                <option value="">--Select--</option>
                <option value="1">⭐</option>
                <option value="2">⭐⭐</option>
                <option value="3">⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐</option>
                <option value="5">⭐⭐⭐⭐⭐</option>
            </select>
            <br>
            <label for="feedback">Feedback (optional):</label>
            <textarea id="feedback" name="feedback" rows="3"></textarea>
            <br>
            <input type="hidden" id="worker_id" name="worker_id">
            <input type="hidden" id="job_id" name="job_id">
            <button type="submit">Submit Rating</button>
        </form>
    </div>
</div>