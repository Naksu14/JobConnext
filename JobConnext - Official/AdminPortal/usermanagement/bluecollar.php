<?php
include $_SERVER['DOCUMENT_ROOT'] . '/JobConnext/JobConnext - Official/db_con/db_connection.php';

// Base SQL
$sql = "SELECT 
            a.worker_id AS id_number,
            a.Worker_created_at AS date_applied,
            CONCAT(b.firstname, ' ', b.lastname) AS full_name,
            a.email AS email,
            b.phone_no AS contact,
            a.status
        FROM 
            tbl_blue_collar_worker a
        JOIN 
            tbl_worker_information b ON a.worker_id = b.worker_id";

// Initialize where and order clauses
$whereClauses = [];
$orderBy = " ORDER BY a.Worker_created_at DESC";

// Handle search parameter
if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = $conn->real_escape_string(trim($_GET['search']));
    $whereClauses[] = "(CONCAT(b.firstname, ' ', b.lastname) LIKE '%$search%' OR 
                       a.email LIKE '%$search%' OR
                       b.phone_no LIKE '%$search%' OR
                       a.worker_id LIKE '%$search%')";
}

// Handle filter by status
if (isset($_GET['filter']) && !empty($_GET['filter'])) {
    $filter = $_GET['filter'];
    // Assuming status values like 'Active', 'Inactive', 'Pending'
    $allowedStatuses = ['Active', 'Inactive', 'Pending'];
    if (in_array($filter, $allowedStatuses)) {
        $whereClauses[] = "a.status = '" . $conn->real_escape_string($filter) . "'";
    }
}

// Handle date filter
if (isset($_GET['date-filter'])) {
    $dateFilter = $_GET['date-filter'];
    $today = date('Y-m-d');
    
    switch ($dateFilter) {
        case 'today':
            $whereClauses[] = "DATE(a.Worker_created_at) = '$today'";
            break;
        case 'week':
            $whereClauses[] = "YEARWEEK(a.Worker_created_at, 1) = YEARWEEK('$today', 1)";
            break;
        case 'month':
            $whereClauses[] = "YEAR(a.Worker_created_at) = YEAR('$today') AND MONTH(a.Worker_created_at) = MONTH('$today')";
            break;
        case 'year':
            $whereClauses[] = "YEAR(a.Worker_created_at) = YEAR('$today')";
            break;
    }
}

// Handle sorting
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    switch ($sort) {
        case 'name':
            $orderBy = " ORDER BY full_name ASC";
            break;
        case 'name_desc':
            $orderBy = " ORDER BY full_name DESC";
            break;
        case 'date':
            $orderBy = " ORDER BY a.Worker_created_at DESC";
            break;
        case 'date_asc':
            $orderBy = " ORDER BY a.Worker_created_at ASC";
            break;
        case 'id':
            $orderBy = " ORDER BY a.worker_id ASC";
            break;
    }
}

// Append where clause if any
if (count($whereClauses) > 0) {
    $sql .= " WHERE " . implode(" AND ", $whereClauses);
}

// Append order by clause
$sql .= $orderBy;

$result = $conn->query($sql);
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID Number</th>
            <th scope="col">Date Applied</th>
            <th scope="col">Blue Collar Name</th>
            <th scope="col">Email Address</th>
            <th scope="col">Contact</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <th scope="row"><?= htmlspecialchars($row['id_number']) ?></th>
                    <td><?= htmlspecialchars($row['date_applied']) ?></td>
                    <td><?= htmlspecialchars($row['full_name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['contact']) ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">No records found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>
