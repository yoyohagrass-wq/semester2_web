<?php
session_start();

$error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $username = trim($_REQUEST["username"]);
    $password = trim($_REQUEST["password"]);
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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
</head>
<body>

    <form action="" method="post">
        <input type="text" name="username" placeholder="username"><br>
        <input type="password" name="password" placeholder="password"><br>
        <input type="email" name="email" placeholder="Email"><br>
        <input type="submit" value="Sign Up"><br>

        <p style="color:red;">
            <?php echo $error; ?>
        </p>

    </form>

    Already have an account?
    <button onclick="window.location.href='login.php'">
        Login
    </button>

</body>
</html>