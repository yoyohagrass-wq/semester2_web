<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $passwordInput = trim($_POST["password"] ?? "");

    if ($username === "" || $passwordInput === "") {
        $error = "All fields are required";
    } else {
        $password = sha1($passwordInput);
        $userFile = __DIR__ . DIRECTORY_SEPARATOR . "userdata.txt";
        $FileHandler = @fopen($userFile, "r");

        if ($FileHandler === false) {
            $error = "error opening file!";
        } else {
            $found = false;

            while (($line = fgets($FileHandler)) !== false) {
                $line = trim($line);
                if ($line === "") {
                    continue;
                }

                $data = explode("~", $line);
                if (count($data) < 2) {
                    continue;
                }

                if (trim($data[0]) === $username && trim($data[1]) === $password) {
                    $found = true;
                    break;
                }
            }

            fclose($FileHandler);

            if ($found) {
                $_SESSION["username"] = $username;
                header("Location: index.php");
                exit();
            }

            $error = "Invalid username or password";
        }
    }
}
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
            
            <?php if($error): ?>
                <div class="error-message"><?php echo $error; ?></div>
            <?php endif; ?>
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
