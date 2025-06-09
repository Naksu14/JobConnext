<?php
// Start the session
session_start();

// Check if the user is logged in
// if (!isset($_SESSION['logged_in'])) {
//     header('Location: SignInPage.php'); // Redirect to login page if not logged in
//     exit;
// }

// If logout is requested (via the query string in the URL)
if (isset($_GET['logout'])) {
    session_unset();  // Unset all session variables
    session_destroy();  // Destroy the session
    header('Location: ../GuessPortal/LandingPage.php');  // Redirect to login page after logout
    exit;
}
?>


<div class="sidebar">
    <nav class="nav flex-column">
        <a href="AdminLandingPage.php" class="nav-link">
            <span class="icon">
                <i class="bi bi-grid-1x2-fill"></i>
            </span>
            <span class="description">Dashboard</span>
        </a>
        <a href="AdminUserManangement.php" class="nav-link">
            <span class="icon">
                <i class="bi bi-people-fill"></i>
            </span>
            <span class="description">User management</span>
        </a>
        <a href="#" class="nav-link" data-bs-toggle="collapse" data-bs-target="#submenu" aria-expanded="false" aria-controls="submenu">
            <span class="icon">
                <i class="bi bi-postcard-fill"></i>
            </span>
            <span class="description">Content Moderation <i class="bi bi-caret-down-fill"></i></span>
        </a>
        <div class="sub-menu collapse" id="submenu">
            <a href="reviewpost.php" class="nav-link">
                <span class="icon">
                    <i class="bi bi-file-earmark-post"></i>
                </span>
                <span class="description" id="reviewpost">Review Post</span>
            </a>
            <a href="archivedpost.php" class="nav-link">
                <span class="icon">
                    <i class="bi bi-file-post"></i>
                </span>
                <span class="description" id="archivedpost">Archived Post</span>
            </a>
            <a href="reportpost.php" class="nav-link">
                <span class="icon">
                    <i class="bi bi-file-post-fill"></i>
                </span>
                <span class="description" id="reportpost">Reported Post</span>
            </a>
            <a href="reportapplicant.php" class="nav-link">
                <span class="icon">
                    <i class="bi bi-person-rolodex"></i>
                </span>
                <span class="description" id="reportapplicant">Reported Applicant</span>
            </a>
            <!-- <a href="feedback.php" class="nav-link">
                <span class="icon">
                    <i class="bi bi-chat-left-text-fill"></i>
                </span>
                <span class="description" id="feedback">Feedback</span>
            </a> -->
        </div>

        <a href="?logout=true" class="nav-link Logout-button">
            <span class="icon logicon">
                <i class="bi bi-door-closed-fill"></i>
            </span>
            <span class="description">Logout</span>
        </a>

    </nav>
</div>