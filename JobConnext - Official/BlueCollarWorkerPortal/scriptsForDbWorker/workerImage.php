<?php
include '../../db_con/db_connection.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_GET['worker_id'])) {
    $worker_id= $_GET['worker_id'];

    $stmt = $conn->prepare("SELECT image FROM worker_image WHERE worker_id = ? ORDER BY uploaded_at DESC LIMIT 1");
    $stmt->bind_param("i", $worker_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($image);
        $stmt->fetch();

        // Send proper header (adjust if you store file type)
        header("Content-Type: image/jpeg"); // Or dynamically detect type if stored
        echo $image;
    } else {
        // Default image if no image found
        readfile('../../Assets/image/noProfile.jpg');
    }

    $stmt->close();
}
$conn->close();
