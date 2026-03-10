<?php
session_start();

$name = "";
$email = "";
$message = "";
$filename = "users.txt";
$filepath = __DIR__ . DIRECTORY_SEPARATOR . $filename;

if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $found = false;

    if ($name != "" && $email != "") {
        if (file_exists($filepath)) {
            $filehandler = fopen($filepath, "r");

            if ($filehandler) {
                while (($line = fgets($filehandler)) !== false) {
                    if (trim($line) != "") {
                        $data = explode("~", $line);
                        $userid = intval($data[0] ?? 0);
                        $username = trim($data[1] ?? "");
                        $useremail = trim($data[2] ?? "");

                        if ($username == $name && $useremail == $email) {
                            $_SESSION["userid"] = $userid;
                            $_SESSION["username"] = $username;
                            $_SESSION["useremail"] = $useremail;
                            $message = "Login successful.";
                            $found = true;
                            break;
                        }
                    }
                }

                fclose($filehandler);
            }
        }

        if (!$found) {
            $message = "User not found.";
        }
    } else {
        $message = "Please enter name and email.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login User</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>">
        <br>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
        <br>
        <input type="submit" value="Login">
    </form>

    <p><a href="register.php">Go to Register</a></p>

    <?php
    if ($message != "") {
        echo "<p>" . $message . "</p>";
    }

    if (isset($_SESSION["userid"])) {
        echo "<p>Session User: " . $_SESSION["userid"] . " - " . $_SESSION["username"] . " - " . $_SESSION["useremail"] . "</p>";
        echo "<a href='login.php?logout=1'>Logout</a>";
    }
    ?>
</body>
</html>
