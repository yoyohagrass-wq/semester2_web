<?php
session_start();

$name = "";
$email = "";
$message = "";

$filename = "users.txt";

if(isset($_SESSION["userid"])){
    header("Location: index.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);

    $found = false;

    if($name != "" && $email != ""){

        $file = fopen($filename,"r");

        while(!feof($file)){

            $line = fgets($file);

            $data = explode("~",$line);

            if(count($data) >= 3){

                $userid = $data[0];
                $username = trim($data[1]);
                $useremail = trim($data[2]);

                if($name == $username && $email == $useremail){

                    $_SESSION["userid"] = $userid;
                    $_SESSION["username"] = $username;
                    $_SESSION["useremail"] = $useremail;

                    $found = true;

                    header("Location: index.php");
                    exit;
                }
            }
        }

        fclose($file);

        if(!$found){
            $message = "User not found. Please register.";
        }

    }else{
        $message = "Please enter name and email.";
    }
}
?>