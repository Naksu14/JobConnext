
function restoreItem() {
    // SweetAlert confirmation for restoring the item
    Swal.fire({
        title: 'Are you sure?',
        text: 'Do you want to restore this item?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, restore it!',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
    }).then((result) => {
        if (result.isConfirmed) {
            // Add your code to restore the item here
            Swal.fire(
                'Restored!',
                'The item has been restored.',
                'success'
            );
            // Close the modal after action
            var restoreModal = new bootstrap.Modal(document.getElementById('restoreModal'));
            restoreModal.hide();
        }
    });
}

function deleteItem() {
    // SweetAlert confirmation for deleting the item
    Swal.fire({
        title: 'Are you sure?',
        text: 'This action cannot be undone. Do you want to delete this item permanently?',
        icon: 'error',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel',
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
    }).then((result) => {
        if (result.isConfirmed) {
            // Add your code to delete the item permanently here
            Swal.fire(
                'Deleted!',
                'The item has been deleted permanently.',
                'success'
            );
            // Close the modal after action
            var deleteModal = new bootstrap.Modal(document.getElementById('deleteModal'));
            deleteModal.hide();
        }
    });
}

