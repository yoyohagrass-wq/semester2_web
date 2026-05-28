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

            if(count($data) > 1){

                if(trim($data[0]) == trim($username)
                && trim($data[1]) == trim($password)){

                    $_SESSION["username"] = $username;
                    $found = true;

                    fclose($FileHandler);
                    header("Location: index.php");
                    exit();
                }
            }
        }

        fclose($FileHandler);

        if(!$found){
            $error = "Invalid username or password";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>

<form action="" method="post">

    <input type="text" name="username" placeholder="username"><br>

    <input type="password" name="password" placeholder="password"><br>

    <input type="submit" value="Login"><br>

    <font color="red">
        <?php echo $error; ?>
    </font>

</form>

Don't have an account?

<a href="signup.php">
    Sign Up
</a>

</body>
</html>