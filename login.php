<?php 
if (isset($_SESSION['username'])) {header('Location: index.php');}
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-aA4M8hbM1v6cuKA5sjsDA3cViOW7HCOpevojiqj58sfHYFjW/C0in6u1fnlSYIl5" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/js/all.min.js" integrity="sha384-iQ6qC6N4ba5VtF37b8fcPprrqGsazR0wLaG7AUKYAVt9ti10au83lLCOzNVvZFSK" crossorigin="anonymous"></script>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h1 class="text-center" style="font-size: 2.5em;">Login Form</h1>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo '<div class="alert alert-danger" role="alert">' . $_SESSION['message'] . '</div>';
                        unset($_SESSION['message']);
                    }
                    ?>
                    <form id="loginForm" method="post" action="login_processing.php">
                    <div class="col-md-12">
                    <?php
                    if (isset($_SESSION['notice'])) {
                        if ($_SESSION['notice']) {
                            echo "<div class='alert alert-danger'>You need to login before booking any product</div>";
                            $_SESSION['notice'] = false;
                        }
                    }
                    ?>
                </div>
                        <div class="mb-4">
                            <label for="username" class="form-label" style="font-size: 2em;">Username</label>
                            <input type="text" class="form-control" id="username" name="username" style="font-size: 1.7em;" value="<?php echo isset($_SESSION['entered_username']) ? $_SESSION['entered_username'] : ''; ?>">
                            <div class="form-text" style="font-size: 1.2em;"> Username must be at least 10 characters.</div>
                        </div>
                        <div class="mb-4">
                            <label for="password" class="form-label" style="font-size: 2em;">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" style="font-size: 1.7em;">
                            </div>
                            <div class="form-text" style="font-size: 1.2em;">Password must be at least 8 characters long and contain both letters and numbers.</div>
                        </div>
                        <div class="mb-4 form-check">
                            <input type="checkbox" class="form-check-input" id="showPassword" style="width: 1.2em; height: 1.2em;">
                            <label class="form-check-label" for="showPassword" style="font-size: 1.2em; font-weight: semi-bold;">Show Password</label>
                        </div>
                        <button type="submit" class="btn btn-primary" style="font-size: 1.7em;">Login</button>
                        <button type="button" class="btn btn-secondary" id="clearForm" style="font-size: 1.7em;">Clear</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    const clearFormBtn = document.getElementById('clearForm');
    const showPasswordCheckbox = document.getElementById('showPassword');
    const passwordInput = document.getElementById('password');

    clearFormBtn.addEventListener('click', function() {
        document.getElementById('loginForm').reset();
    });

    showPasswordCheckbox.addEventListener('change', function() {
        const type = showPasswordCheckbox.checked ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
    });

    document.getElementById('loginForm').addEventListener('submit', function(event) {
        const usernameInput = document.getElementById('username');
        const passwordInput = document.getElementById('password');
        const usernameValue = usernameInput.value;
        const passwordValue = passwordInput.value;

        // Check username length
        if (usernameValue.length < 10) {
            alert("Username must be at least 10 characters.");
            event.preventDefault();
            return;
        }

        // Check password length and content
        const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;
        if (!passwordRegex.test(passwordValue)) {
            alert("Password must be at least 8 characters long and contain both letters and numbers.");
            event.preventDefault();
            return;
        }
    });
</script>
<?php
unset($_SESSION['message']);
unset($_SESSION['entered_username']);
?>
