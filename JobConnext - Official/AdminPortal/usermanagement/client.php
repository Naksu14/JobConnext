<?php
include $_SERVER['DOCUMENT_ROOT'] . '/JobConnext/JobConnext - Official/db_con/db_connection.php';

// Capture search parameter
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Default query components
$where = "";
$orderBy = "ORDER BY c.Client_created_at DESC";
$whereClauses = [];

// Handle filtering (e.g., active status)
if (isset($_GET['filter']) && $_GET['filter'] === 'active') {
    $whereClauses[] = "c.status = 'Active'";
}

// Handle search
if (!empty($search)) {
    $escapedSearch = $conn->real_escape_string($search);
    $whereClauses[] = "(CONCAT(ci.firstname, ' ', ci.lastname) LIKE '%$escapedSearch%' OR co.company_name LIKE '%$escapedSearch%')";
}

// Combine all WHERE conditions
$where = '';
if (!empty($whereClauses)) {
    $where = 'WHERE ' . implode(' AND ', $whereClauses);
}

// Final SQL
$sql = "SELECT 
            c.client_id,
            CONCAT(ci.firstname, ' ', ci.lastname) AS client_name,
            co.company_name,
            ci.phone_no AS contact_no,
            c.email,
            c.status
        FROM 
            tbl_client c
        JOIN 
            tbl_client_information ci ON c.client_id = ci.client_id
        JOIN 
            tbl_company_info co ON c.client_id = co.client_id
        $where
        $orderBy";

$result = $conn->query($sql);
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Client ID</th>
            <th scope="col">Client Name</th>
            <th scope="col">Company Name</th>
            <th scope="col">Contact Number</th>
            <th scope="col">Email</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <th scope="row"><?= htmlspecialchars($row['client_id']) ?></th>
                    <td><?= htmlspecialchars($row['client_name']) ?></td>
                    <td><?= htmlspecialchars($row['company_name']) ?></td>
                    <td><?= htmlspecialchars($row['contact_no']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['status']) ?></td>
                    <td>
                        <button class="btn btn-primary btn-sm">View</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">No records found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>