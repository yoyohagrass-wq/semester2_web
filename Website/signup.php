<?php
$error = signup();
session_start();

include_once "functions.php";

signup();
?>
<!DOCTYPE html>
<html lang="en" class="auth-html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-signup">
    <div class="signup-container">
        <h1>Create Account</h1>
        <p>Join our community today</p>

        <form action="" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Sign Up">
                <?php if($error): ?>
                    <div class="error-message"><?php echo $error; ?></div>
                <?php endif; ?>
        </form>

        <div class="login-link">
            Already have an account?
            <button type="button" onclick="window.location.href='login.php'">
                Login
            </button>
        </div>
    </div>
</body>
</html>