<?php
session_start();

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = trim($_REQUEST["username"]);
    $password = sha1(trim($_REQUEST["password"]));
    $email = trim($_REQUEST["email"]);

    if($username == "" || $password == "" || $email == ""){
        $error = "All fields are required";
    }
    else {

        $FileHandler = fopen("userdata.txt", "a+") or die("error opening file!");

        rewind($FileHandler);

        $emailExists = false;

        while(!feof($FileHandler)){

            $line = fgets($FileHandler);
            $data = explode("~", $line);

            if(isset($data[2]) && trim($data[2]) == trim($email)){
                $emailExists = true;
                break;
            }
        }

        if($emailExists){
            $error = "Email already exists";
        }
        else {

            $newdata = $username . "~" . $password . "~" . $email . "\n";

            fwrite($FileHandler, $newdata);
            fclose($FileHandler);

            $_SESSION['username'] = $username;

            header("Location: index.php");
            exit();
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