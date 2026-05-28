<?php
session_start();

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = trim($_REQUEST["username"]);
    $password = trim($_REQUEST["password"]);

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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <form action="" method="post">
        <input type="text" name="username" placeholder="username"><br>
        <input type="password" name="password" placeholder="password"><br>
        <input type="submit" value="Login"><br>

        <p style="color:red;">
            <?php echo $error; ?>
        </p>

    </form>

    Don't have an account?
    <button onclick="window.location.href='signup.php'">
        Sign Up
    </button>

</body>
</html>