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

// Handle filter by status
if (isset($_GET['filter']) && !empty($_GET['filter'])) {
    $filter = $_GET['filter'];
    // Assuming status values like 'Active', 'Inactive', 'Pending'
    $allowedStatuses = ['Active', 'Inactive', 'Pending'];
    if (in_array($filter, $allowedStatuses)) {
        $whereClauses[] = "a.status = '" . $conn->real_escape_string($filter) . "'";
    }
}

// Handle sorting
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    if ($sort === 'name') {
        $orderBy = " ORDER BY full_name ASC";
    } elseif ($sort === 'date') {
        $orderBy = " ORDER BY a.Worker_created_at DESC";
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
            <th scope="col">Status</th>
            <th scope="col">Action</th>
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