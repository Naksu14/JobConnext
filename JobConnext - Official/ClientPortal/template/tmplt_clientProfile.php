<?php
session_start(); // Start the session
include "../db_con/db_connection.php";

// Check if a client is logged in
if (isset($_SESSION['client_id'])) {
    $clientId = $_SESSION['client_id'];

    // Query to fetch the company name based on the client ID
    $query = "SELECT company_name FROM tbl_company_info WHERE client_id = ?";
    $stmt = $conn->prepare($query);

    if ($stmt) {
        $stmt->bind_param("i", $clientId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $companyName = $row['company_name'];
        } else {
            $companyName = "Company Work"; 
        }
        $stmt->close();
    } else {
        $companyName = "Error fetching company"; 
    }
} else {
    $companyName = "Guest"; 
}
?>
<a href="profile-company.php" id=""><?php echo $companyName; ?></a>
