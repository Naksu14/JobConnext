<?php
include $_SERVER['DOCUMENT_ROOT'] . '/JobConnext/JobConnext - Official/db_con/db_connection.php';

$orderBy = "";
$where = "";

// Handle sorting
if (isset($_GET['sort'])) {
    if ($_GET['sort'] == 'name') {
        $orderBy = "ORDER BY username ASC";
    } elseif ($_GET['sort'] == 'date') {
        $orderBy = "ORDER BY Admin_id DESC"; // Assuming higher ID = newer
    }
}



// Final query
$sql = "SELECT Admin_id, username, email, hash_password FROM tbl_admin $where $orderBy";
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
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <th scope="row"><?= htmlspecialchars($row['Admin_id']) ?></th>
                    <td><?= htmlspecialchars($row['username']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td>+63XXXXXXXXXX</td> <!-- Replace with actual contact if available -->
                    <td>Sub-Admin</td> <!-- Replace with actual role if available -->
                    <td>Active</td> <!-- Replace with actual status if available -->
                    <td>
                        <a href="AdminProfile.php"><button class="btn btn-success btn-sm">Edit</button></a>
                        <!-- <button class="btn btn-warning btn-sm">Deactivate</button>
                        <button class="btn btn-danger btn-sm">Remove</button> -->
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