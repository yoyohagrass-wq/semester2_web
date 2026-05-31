<?php
session_start();

$error = "";

$username = trim($_REQUEST["username"]);
$password = sha1(trim($_REQUEST["password"]));

if($username == "" || $password == ""){
    $error = "All fields are required";
}
else {

    $FileHandler = fopen("userdata.txt", "r") or die("error opening file!");

    $found = false;

    while(!feof($FileHandler)){
        $line = fgets($FileHandler);
        $data = explode("~", $line);

        if(trim($data[0]) == trim($username) && trim($data[1]) == trim($password)){

            $_SESSION['username'] = $username;
            $found = true;

                fclose($FileHandler);
                header("Location: index.php");
                exit();
            }
        }
        if(!$found){
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