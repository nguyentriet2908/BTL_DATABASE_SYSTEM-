<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9"> 
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center" style="font-size: 2.5em;">Registration form</h1>
                </div>
                <div class="card-body">
                    <form id="registrationForm" method="post">
                        <div class="mb-4">
                            <label for="username" class="form-label" style="font-size: 2em;">Username</label>
                            <input type="text" class="form-control" id="username" name="username" style="font-size: 1.7em;" required>
                        </div>
                        <div class="mb-4">
                            <label for="email" class="form-label" style="font-size: 2em;">Email</label>
                            <input type="email" class="form-control" id="email" name="email" style="font-size: 1.7em;" required>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label" style="font-size: 2em;">Password</label>
                            <input type="password" class="form-control" id="password" name="password" style="font-size: 1.7em;" required>
                        </div>
                        <div class="mb-4">
                            <label for="confirmPassword" class="form-label" style="font-size: 2em;">Confirm Password</label>
                            <input type="password" class="form-control" id="confirmPassword" style="font-size: 1.7em;" required>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary" style="font-size: 1.7em;">Register</button>
                            <button type="reset" class="btn btn-secondary" style="font-size: 1.7em; margin-left: 4px;">Clear</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>




<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;

    // Check username length
    if (username.length < 10) {
        alert("Username must be at least 10 characters.");
        return;
    }

    // Check password length and content
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
    if (!passwordRegex.test(password)) {
        alert("Password must be at least 8 characters long and contain both letters and numbers.");
        return;
    }

    // Check if passwords match
    if (password !== confirmPassword) {
        alert("Passwords do not match.");
        return;
    }

    // Check email format
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        alert("Invalid email format.");
        return;
    }

    $.post('register-processing.php', {
        username: username,
        email: email,
        password: password
    }, function(response) {
        alert(response);
        if (response === 'Registration successful!') {
            window.location.href = 'index.php?page=home'; // Redirect to home page
        }
    });
});

</script>