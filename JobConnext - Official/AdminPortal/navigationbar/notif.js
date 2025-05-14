$(document).ready(function () {
    $.ajax({
        url: 'navigationbar/notif.php',
        method: 'GET',
        dataType: 'json',
        success: function (response) {
            const count = response.new_users;

            const badge = $('#userNotifCount');
            if (count > 0) {
                badge.text(count).show();

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'info',
                    title: `${count} new user(s) registered`,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true
                });
            } else {
                badge.hide();
            }
        },
        error: function (xhr, status, error) {
            console.error('AJAX error:', error);
        }
    });
});
