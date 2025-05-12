document.getElementById('logout_butt').addEventListener('click', function () {
    fetch('../GuessPortal/logout.php', {
        method: 'POST'
    }).then(() => {
        window.location.href = '../GuessPortal/LandingPage.php';
    });
});
