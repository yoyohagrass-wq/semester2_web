<?php
session_start();

include_once "functions.php";

login();
?>

<!DOCTYPE html>
<html lang="en" class="auth-html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="auth-login">
    <div class="login-container">
        <h1>Login</h1>
        <p>Welcome back to our platform</p>

        <form action="" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" value="Login">

        </form>

        <div class="signup-link">
            Don't have an account?
            <button type="button" onclick="window.location.href='signup.php'">
                Sign Up
            </button>
        </div>
    </div>
</body>
</html>