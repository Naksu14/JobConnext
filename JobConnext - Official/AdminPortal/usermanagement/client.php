<?php
include $_SERVER['DOCUMENT_ROOT'] . '/JobConnext/JobConnext - Official/db_con/db_connection.php';

// Initialize variables
$whereClauses = [];
$orderBy = "ORDER BY c.Client_created_at DESC";

// Handle search parameter
if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = $conn->real_escape_string(trim($_GET['search']));
    $whereClauses[] = "(CONCAT(ci.firstname, ' ', ci.lastname) LIKE '%$search%' OR 
                       co.company_name LIKE '%$search%' OR
                       ci.phone_no LIKE '%$search%' OR
                       c.email LIKE '%$search%')";
}

// Handle status filter
if (isset($_GET['filter']) && $_GET['filter'] !== 'all') {
    $filter = $conn->real_escape_string($_GET['filter']);
    $allowedStatuses = ['Active', 'Inactive', 'Pending'];
    if (in_array($filter, $allowedStatuses)) {
        $whereClauses[] = "c.status = '$filter'";
    }
}

// Handle date filter
if (isset($_GET['date-filter'])) {
    $dateFilter = $_GET['date-filter'];
    $today = date('Y-m-d');
    
    switch ($dateFilter) {
        case 'today':
            $whereClauses[] = "DATE(c.Client_created_at) = '$today'";
            break;
        case 'week':
            $whereClauses[] = "YEARWEEK(c.Client_created_at, 1) = YEARWEEK('$today', 1)";
            break;
        case 'month':
            $whereClauses[] = "YEAR(c.Client_created_at) = YEAR('$today') AND MONTH(c.Client_created_at) = MONTH('$today')";
            break;
        case 'year':
            $whereClauses[] = "YEAR(c.Client_created_at) = YEAR('$today')";
            break;
    }
}

// Handle sorting
if (isset($_GET['sort'])) {
    switch ($_GET['sort']) {
        case 'name':
            $orderBy = "ORDER BY client_name ASC";
            break;
        case 'name_desc':
            $orderBy = "ORDER BY client_name DESC";
            break;
        case 'date':
            $orderBy = "ORDER BY c.Client_created_at DESC";
            break;
        case 'date_asc':
            $orderBy = "ORDER BY c.Client_created_at ASC";
            break;
        case 'Identity':
            $orderBy = "ORDER BY c.client_id ASC";
            break;
    }
}

// Combine WHERE clauses
$where = '';
if (!empty($whereClauses)) {
    $where = 'WHERE ' . implode(' AND ', $whereClauses);
}

// Final SQL query
$sql = "SELECT 
            c.client_id,
            CONCAT(ci.firstname, ' ', ci.lastname) AS client_name,
            co.company_name,
            ci.phone_no AS contact_no,
            c.email,
            c.status,
            DATE_FORMAT(c.Client_created_at, '%M %d, %Y') AS formatted_date
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
            <th scope="col">Date Registered</th>
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
                    <td><?= htmlspecialchars($row['formatted_date']) ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="8" class="text-center">No client records found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>