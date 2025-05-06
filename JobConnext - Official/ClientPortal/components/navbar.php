<?php
if (isset($_POST['logout'])) {
    session_destroy();
}
?>


<div class="nav_bar container-fluid text-center">
        <div class="header">
            <div class="row">
                <div class="col">
                    <div class="container-fluid" id="logo">
                        <img src="../Assets/image/462566530_896228739052589_2655126183685351288_n.png" alt="">
                    </div>
                </div>
                <div class="links col">
                    <div class="container-fluid" id="nav_list">
                        <ul>
                            <li><a href="client_home.php">Home</a></li>
                            <li><a href="../ClientPortal/client_profile.php">Profile</a></li>
                            <li><a href="../ClientPortal/client-message.php">Message</a></li>
                        </ul>
                    </div>
                </div>
                <div class="logout-btn col">
                    <div class="container-fluid">
                    <button button id="logout_butt">Logout</button> 
                    </div>
                </div>
            </div>
        </div>
</div>

<script>
document.getElementById('logout_butt').addEventListener('click', function () {
    fetch('', {
        method: 'POST',
        headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
        body: 'logout=1'
    }).then(() => {
        window.location.href = '../GuessPortal/LandingPage.php';
    });
});
</script>
