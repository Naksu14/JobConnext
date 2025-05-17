<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col">ID Number</th>
            <th scope="col">User Name</th>
            <th scope="col">Role</th>
            <th scope="col">Email</th>
            <th scope="col">Contact</th>
            <th scope="col">Status</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <!-- Archived Blue Collar User -->
        <tr>
            <th scope="row">1</th>
            <td>Mark Otto</td>
            <td>Blue Collar</td>
            <td>mark.otto@example.com</td>
            <td>+1234567890</td>
            <td>Archived</td>
            <td>
                <button type="button" class="btn btn-primary btn-sm" onclick="restoreItem()">Restore</button>
                <button type="button" class="btn btn-danger btn-sm" onclick="deleteItem()">Delete</button>
            </td>
        </tr>
        <!-- Archived Client User -->
        <tr>
            <th scope="row">2</th>
            <td>Jacob Thornton</td>
            <td>Client</td>
            <td>jacob.thornton@example.com</td>
            <td>+0987654321</td>
            <td>Archived</td>
            <td>
                <button type="button" class="btn btn-primary btn-sm" onclick="restoreItem()">Restore</button>
                <button type="button" class="btn btn-danger btn-sm" onclick="deleteItem()">Delete</button>
            </td>
        </tr>
        <!-- Archived Blue Collar User -->
        <tr>
            <th scope="row">3</th>
            <td>Larry Bird</td>
            <td>Blue Collar</td>
            <td>larry.bird@example.com</td>
            <td>+1122334455</td>
            <td>Archived</td>
            <td>
                <button type="button" class="btn btn-primary btn-sm" onclick="restoreItem()">Restore</button>
                <button type="button" class="btn btn-danger btn-sm" onclick="deleteItem()">Delete</button>
            </td>
        </tr>
    </tbody>
</table>