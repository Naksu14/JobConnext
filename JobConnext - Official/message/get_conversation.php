<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../db_con/db_connection.php';

// Get current user (sender)
$sender_id = $_SESSION['worker_id'] ?? $_SESSION['client_id'] ?? null;

// Get clicked user (receiver)
$receiver_id = isset($_GET['user_id']) ? intval($_GET['user_id']) : 0;

if (!$sender_id || !$receiver_id) {
    echo '<p class="text-danger">Invalid user session or parameters.</p>';
    exit;
}

// ✅ Get receiver profile
$profileStmt = $conn->prepare("SELECT * FROM (
    SELECT 
        w.worker_id AS user_id,
        w.username,
        w.email,
        'worker' AS user_type
    FROM 
        tbl_blue_collar_worker w
    WHERE 
        w.worker_id = ?

    UNION

    SELECT 
        c.client_id AS user_id,
        c.username,
        c.email,
        'client' AS user_type
    FROM 
        tbl_client c
    WHERE 
        c.client_id = ?
) AS combined_results;
");

$profileStmt->bind_param("ii", $receiver_id, $receiver_id);
$profileStmt->execute();
$profileResult = $profileStmt->get_result();
$receiver = $profileResult->fetch_assoc();
$profileStmt->close();


// ✅ Mark messages as read (messages sent *to* current user)
$markRead = $conn->prepare("
    UPDATE tbl_messages 
    SET is_read = 1 
    WHERE sender_id = ? AND receiver_id = ? AND is_read = 0
");
$markRead->bind_param('ii', $receiver_id, $sender_id);
$markRead->execute();
$markRead->close();

// ✅ Fetch conversation between both users
$stmt = $conn->prepare("
    SELECT sender_id, receiver_id, message, created_at 
    FROM tbl_messages 
    WHERE 
        (sender_id = ? AND receiver_id = ?) 
        OR 
        (sender_id = ? AND receiver_id = ?)
    ORDER BY created_at ASC
");

$stmt->bind_param('iiii', $sender_id, $receiver_id, $receiver_id, $sender_id);
$stmt->execute();
$result = $stmt->get_result();

echo '<div class="chat-box d-flex flex-column" style="overflow-y: auto; height: 600px;">';

echo '
    <div class="message mb-3 text-center">
        <img src="../message/display_image.php?type=' . $receiver['user_type'] . '&id=' . $receiver['user_id'] . '" alt="User Image" class="rounded-circle" width="=150px" height="150px">
        <h2 class="mt-2">' . $receiver['username'] . '</h2>
        <p class="text-muted">' . $receiver['email'] . '</p>
        <p class="text-muted" style="font-weight:bold;">' . $receiver['user_type'] . '</p>
    </div>';

if ($result->num_rows === 0) {
    echo '<p class="text-muted text-center">No messages yet. Start the conversation!</p>';
} else {
    while ($row = $result->fetch_assoc()) {
        $isOwnMessage = $row['sender_id'] == $sender_id;
        $alignment = $isOwnMessage ? 'text-end' : 'text-start';
        $bgColor = $isOwnMessage ? 'bg-primary text-white' : 'bg-info';
        $time = date("M j, Y g:i A", strtotime($row['created_at']));

        echo '
        <div class="message mb-3 ' . $alignment . '">
            <div class="d-inline-block p-2 rounded ' . $bgColor . '" style="max-width: 75%;">
                ' . nl2br(htmlspecialchars($row['message'])) . '
                <div class="small text-muted mt-1">' . $time . '</div>
            </div>
        </div>';
    }
}

echo '</div>';

echo '
    <div class="message-input d-flex mt-3 align-items-center">
        <input type="text" id="messageText" class="form-control me-2" placeholder="Type your message..." />
        <button id="sendMessageBtn" class="btn btn-primary">Send</button>
    </div>
';


?>
