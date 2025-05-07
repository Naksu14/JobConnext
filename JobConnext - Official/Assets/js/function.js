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
    const reenterPasswordField = document.getElementById('re_enter_password');
    const toggleReenterPasswordIcon = document.getElementById('toggleReenterPasswordIcon');

    toggleReenterPassword.addEventListener('click', () => {
        const isPassword = reenterPasswordField.type === 'password';
        reenterPasswordField.type = isPassword ? 'text' : 'password';
        toggleReenterPasswordIcon.classList.toggle('bi-eye', isPassword);
        toggleReenterPasswordIcon.classList.toggle('bi-eye-slash', !isPassword);
    });

    function checkPassword(event) {
        const password = document.getElementById("password").value;
        const re_enter_password = document.getElementById("re_enter_password").value;
        const errorMessage = document.getElementById("error-message");
        const minLength = 8;
        const uppercaseRegex = /[A-Z]/;
        const numberRegex = /[0-9]/;
        const specialCharRegex = /[!@#$%^&*(),.?":{}|<>]/;
    
        if (password.length < minLength) {
            errorMessage.textContent = "Password must be at least 8 characters long.";
            event.preventDefault();
            return false;
        }
        if (!uppercaseRegex.test(password)) {
            errorMessage.textContent = "Password must contain at least one uppercase letter.";
            event.preventDefault();
            return false;
        }
        if (!numberRegex.test(password)) {
            errorMessage.textContent = "Password must contain at least one number.";
            event.preventDefault();
            return false;
        }
        if (!specialCharRegex.test(password)) {
            errorMessage.textContent = "Password must contain at least one special character.";
            event.preventDefault();
            return false;
        }
        if (password !== re_enter_password) {
            errorMessage.textContent = "Passwords do not match.";
            event.preventDefault();
            return false;
        }
    
        errorMessage.textContent = "";
        return true;
    }




    