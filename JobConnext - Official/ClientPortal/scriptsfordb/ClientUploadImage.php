<?php
include '../../db_con/db_connection.php';

if (isset($_POST['upload'])) {
    $client_id = $_POST['client_id'];
    $image = $_FILES['image'];

    $allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
    $maxSize = 15 * 1024 * 1024; // 15MB

    if (in_array($image['type'], $allowedTypes) && $image['size'] <= $maxSize) {
        $imgData = file_get_contents($image['tmp_name']);

        $stmt = $conn->prepare("INSERT INTO tbl_client_image (client_id, image) VALUES (?, ?) 
                                ON DUPLICATE KEY UPDATE image = VALUES(image)");

        // First bind dummy NULL to the BLOB
        $stmt->bind_param("ib", $client_id, $null);
        $null = NULL; // placeholder
        $stmt->send_long_data(1, $imgData);

        if ($stmt->execute()) {
            // Redirect to the profile-settings.php page with success message
            header("Location: ../profile-settings.php?id=$client_id&success=upload");
            exit;
        } else {
            echo "Upload failed: " . $stmt->error;
        }
    } else {
        echo "Invalid file type or file too large (max 15MB).";
    }
}

$conn->close();
