const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('password');
    const toggleIcon = document.getElementById('toggleIcon');

    togglePassword.addEventListener('click', () => {
        // Toggle password visibility
        const isPassword = passwordField.type === 'password';
        passwordField.type = isPassword ? 'text' : 'password';
        
        // Toggle icon
        toggleIcon.classList.toggle('bi-eye', isPassword);

        toggleIcon.classList.toggle('bi-eye-slash', !isPassword);
    });



    const toggleReenterPassword = document.getElementById('toggleReenterPassword');
    const reenterPasswordField = document.getElementById('reenter_password');
    const toggleReenterPasswordIcon = document.getElementById('toggleReenterPasswordIcon');

    toggleReenterPassword.addEventListener('click', () => {
        const isPassword = reenterPasswordField.type === 'password';
        reenterPasswordField.type = isPassword ? 'text' : 'password';
        toggleReenterPasswordIcon.classList.toggle('bi-eye', isPassword);
        toggleReenterPasswordIcon.classList.toggle('bi-eye-slash', !isPassword);
    });
