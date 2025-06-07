<?php
include '../../db_con/db_connection.php';

if (isset($_GET['worker_id'])) {
    $worker_id = $_GET['worker_id'];
    $stmt = $conn->prepare("SELECT image FROM worker_image WHERE worker_id = ? ORDER BY uploaded_at DESC LIMIT 1");
    $stmt->bind_param("i", $worker_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($image);
        $stmt->fetch();
        header("Content-Type: image/jpeg");
        echo $image;
    } else {
        // Output default image
        readfile('../../Assets/image/worker_user.png');
    }

    $stmt->close();
}
$conn->close();
?>
