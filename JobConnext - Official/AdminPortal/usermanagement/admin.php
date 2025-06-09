<?php
include $_SERVER['DOCUMENT_ROOT'] . '/JobConnext/JobConnext - Official/db_con/db_connection.php';

// Initialize variables
$whereClauses = [];
$orderBy = "ORDER BY Admin_id DESC";

// Handle search parameter
if (isset($_GET['search']) && !empty(trim($_GET['search']))) {
    $search = $conn->real_escape_string(trim($_GET['search']));
    $whereClauses[] = "(username LIKE '%$search%' OR 
                       email LIKE '%$search%' OR
                       Admin_id LIKE '%$search%')";
}

// // Handle status filter (if you add status field later)
// if (isset($_GET['filter']) && $_GET['filter'] !== 'all') {
//     $filter = $conn->real_escape_string($_GET['filter']);
//     $allowedStatuses = ['Active', 'Inactive'];
//     if (in_array($filter, $allowedStatuses)) {
//         $whereClauses[] = "status = '$filter'";
//     }
// }

// Handle sorting
if (isset($_GET['sort'])) {
    switch ($_GET['sort']) {
        case 'name':
            $orderBy = "ORDER BY username ASC";
            break;
        case 'name_desc':
            $orderBy = "ORDER BY username DESC";
            break;
        case 'date':
            $orderBy = "ORDER BY Admin_id DESC";
            break;
        case 'date_asc':
            $orderBy = "ORDER BY Admin_id ASC";
            break;
        case 'id':
            $orderBy = "ORDER BY Admin_id ASC";
            break;
    }
}

// Combine WHERE clauses
$where = '';
if (!empty($whereClauses)) {
    $where = 'WHERE ' . implode(' AND ', $whereClauses);
}

// Final query
$sql = "SELECT 
    a.Admin_id, 
    a.username, 
    a.email, 
    a.hash_password,
    i.Info_Id, 
    i.full_name, 
    i.phone, 
    i.address, 
    i.role, 
    i.status, 
    i.profile_image
FROM 
    tbl_admin a
JOIN 
    tbl_admin_information i ON a.Admin_id = i.Admin_Id $where $orderBy";
$result = $conn->query($sql);
?>

<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">Co-Admin ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Contact</th>
            <th scope="col">Role</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if ($result && $result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <th scope="row"><?= htmlspecialchars($row['Admin_id']) ?></th>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td><?= htmlspecialchars($row['phone']) ?></td> <!-- Replace with actual contact if available -->
                    <td>Super Admin</td> <!-- Replace with actual role if available -->
                    <td>
                        <span class="badge bg-success">Active</span> <!-- Replace with dynamic status if available -->
                    </td>
                    <td>
                        <a href="AdminProfile.php?id=<?= $row['Admin_id'] ?>" class="btn btn-success btn-sm">Edit</a>
                        <!-- Uncomment these when functionality is ready -->
                        <!-- <button class="btn btn-warning btn-sm">Deactivate</button> -->
                        <!-- <button class="btn btn-danger btn-sm">Remove</button> -->
                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">No admin accounts found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>