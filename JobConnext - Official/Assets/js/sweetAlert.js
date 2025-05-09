function sweetAlertt() {
Swal.fire({
    title: "Password Changed!",
    text: "Do you want to stay logged in?",
    icon: "success",
    showCancelButton: true,
    confirmButtonText: "Stay Logged In",
    cancelButtonText: "Logout",
}).then((result) => {
    if (result.isConfirmed) {
        // Stay logged in - no action needed here as the session is still active
    } else if (result.dismiss === Swal.DismissReason.cancel) {
        window.location.href = "../GuessPortal/Sign_In.php"; // Redirect to logout page
    }
});
}
