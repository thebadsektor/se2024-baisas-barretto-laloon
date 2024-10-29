<?php
session_start();

// Handle login functionality
if (isset($_POST['login'])) {
    $mysqli = new mysqli("db", "user", "password", "user_login_db");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $username = $mysqli->real_escape_string($_POST['username']);
    $password = $_POST['password'];

    // Fetch user data from the database
    $result = $mysqli->query("SELECT * FROM users WHERE username='$username'");

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        
        // Check if the password is correct (use password_hash and password_verify in a real app)
        if ($password === $user['password']) {
            $_SESSION['username'] = $username;
            header("Location: main.php"); // Redirect to main.php
            exit;
        } else {
            echo "<div class='alert alert-danger'>Invalid credentials. Please try again.</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Invalid credentials. Please try again.</div>";
    }

    $mysqli->close(); // Close the database connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <?php if (isset($_SESSION['username'])): ?>
                    <!-- Redirect to main.php if already logged in -->
                    <script>
                        window.location.href = "main.php";
                    </script>
                <?php else: ?>
                    <!-- Login form -->
                    <div class="card mt-5">
                        <div class="card-header text-center">
                            <h3>Login</h3>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" required>
                                </div>
                                <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
