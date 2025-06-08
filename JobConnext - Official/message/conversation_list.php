<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

// header('Content-Type: application/json');
// session_start();

// include '../db_con/db_connection.php';

// // Get logged-in user ID (either worker or client)
// $sender_id = $_SESSION['worker_id'] ?? $_SESSION['client_id'] ?? null;

// if (!$sender_id) {
//     echo json_encode([
//         'status' => 'error',
//         'message' => 'Unauthorized. Please log in.'
//     ]);
//     exit;
// }

// // Main query: Get latest message for each conversation partner (sent or received)
// $sql = "
//     SELECT 
//         m.id,
//         m.sender_id,
//         m.receiver_id,
//         m.message,
//         m.created_at,
//         u.username AS receiver_username,
//         u.user_type AS receiver_type,
//         COALESCE(unread.total_unread, 0) AS unread_count
//     FROM (
//         SELECT 
//             *,
//             CASE 
//                 WHEN sender_id = ? THEN receiver_id
//                 ELSE sender_id
//             END AS conversation_partner_id
//         FROM tbl_messages
//         WHERE sender_id = ? OR receiver_id = ?
//         ORDER BY created_at DESC
//     ) m
//     INNER JOIN (
//         SELECT 
//             w.worker_id AS user_id,
//             w.username,
//             'worker' AS user_type
//         FROM tbl_blue_collar_worker w
//         UNION
//         SELECT 
//             c.client_id AS user_id,
//             c.username,
//             'client' AS user_type
//         FROM tbl_client c
//     ) u ON u.user_id = m.conversation_partner_id
//     LEFT JOIN (
//         SELECT 
//             sender_id,
//             COUNT(*) AS total_unread
//         FROM tbl_messages
//         WHERE receiver_id = ? AND is_read = 0
//         GROUP BY sender_id
//     ) unread ON unread.sender_id = m.conversation_partner_id
//     GROUP BY m.conversation_partner_id
//     ORDER BY MAX(m.created_at) DESC
// ";

// if ($stmt = $conn->prepare($sql)) {
//     $stmt->bind_param('iiii', $sender_id, $sender_id, $sender_id, $sender_id);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $conversations = [];

//     while ($row = $result->fetch_assoc()) {
//         $conversations[] = [
//             'id' => $row['id'],
//             'sender_id' => $row['sender_id'],
//             'receiver_id' => ($row['sender_id'] == $sender_id) ? $row['receiver_id'] : $row['sender_id'],
//             'message' => $row['message'],
//             'created_at' => $row['created_at'],
//             'receiver_username' => $row['receiver_username'],
//             'receiver_type' => $row['receiver_type'],
//             'unread_count' => (int)$row['unread_count'],
//             'has_unread' => $row['unread_count'] > 0 ? 1 : 0
//         ];
//     }

//     echo json_encode([
//         'status' => 'success',
//         'data' => $conversations
//     ]);

//     $stmt->close();
// } else {
//     echo json_encode([
//         'status' => 'error',
//         'message' => 'Failed to prepare statement: ' . $conn->error
//     ]);
// }



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json');
session_start();

include '../db_con/db_connection.php';

// Fetch and sanitize user IDs
$sender_id = $_SESSION['worker_id'] ?? $_SESSION['client_id'] ?? 0;
$receiver_id = isset($_GET['receiver_id']) ?? intval($_GET['receiver_id']) ?? 0;

if ($sender_id === 0 || $receiver_id === 0) {
    echo json_encode(['status' => 'error', 'message' => $sender_id, $receiver_id]);
    exit;
}

// Prepare the SQL query
$sql = "
SELECT 
    m.id,
    m.sender_id,
    m.receiver_id,
    m.message,
    m.created_at,
    u_sender.username AS sender_username,
    u_sender.user_type AS sender_type,
    u_receiver.username AS receiver_username,
    u_receiver.user_type AS receiver_type
FROM tbl_messages m
-- Join for sender info
INNER JOIN (
    SELECT worker_id AS user_id, username, 'worker' AS user_type FROM tbl_blue_collar_worker
    UNION
    SELECT client_id AS user_id, username, 'client' AS user_type FROM tbl_client
) u_sender ON u_sender.user_id = m.sender_id
-- Join for receiver info
INNER JOIN (
    SELECT worker_id AS user_id, username, 'worker' AS user_type FROM tbl_blue_collar_worker
    UNION
    SELECT client_id AS user_id, username, 'client' AS user_type FROM tbl_client
) u_receiver ON u_receiver.user_id = m.receiver_id
WHERE 
    (m.sender_id = :sender_id AND m.receiver_id = :receiver_id)
    OR
    (m.sender_id = :receiver_id AND m.receiver_id = :sender_id)
ORDER BY m.created_at DESC 
";

$stmt = $pdo->prepare($sql);
$stmt->execute([
    ':sender_id' => $sender_id,
    ':receiver_id' => $receiver_id
]);

$messages = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return as JSON
echo json_encode(['status' => 'success', 'messages' => $messages]);




?>
