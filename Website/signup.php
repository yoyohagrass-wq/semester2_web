<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"] ?? "");
    $passwordInput = trim($_POST["password"] ?? "");
    $email = trim($_POST["email"] ?? "");

    if ($username === "" || $passwordInput === "" || $email === "") {
        $error = "All fields are required";
    } else {
        $password = sha1($passwordInput);
        $userFile = __DIR__ . DIRECTORY_SEPARATOR . "userdata.txt";
        $FileHandler = @fopen($userFile, "a+");

        if ($FileHandler === false) {
            $error = "error opening file!";
        } else {
            rewind($FileHandler);

            $emailExists = false;

            while (($line = fgets($FileHandler)) !== false) {
                $line = trim($line);
                if ($line === "") {
                    continue;
                }

                $data = explode("~", $line);
                if (isset($data[2]) && trim($data[2]) === $email) {
                    $emailExists = true;
                    break;
                }
            }

            if ($emailExists) {
                $error = "Email already exists";
            } else {
                $newdata = $username . "~" . $password . "~" . $email . "\n";

                fwrite($FileHandler, $newdata);

                $_SESSION["username"] = $username;
                fclose($FileHandler);

                header("Location: index.php");
                exit();
            }

            fclose($FileHandler);
        }
    }
}
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
