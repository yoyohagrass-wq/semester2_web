<?php
session_start();

function getLastId($filepath) {
    $lastid = 0;

    if (file_exists($filepath)) {
        $filehandler = fopen($filepath, "r");
        if ($filehandler) {
            while (($line = fgets($filehandler)) !== false) {
                if (trim($line) != "") {
                    $data = explode("~", $line);
                    $lastid = intval($data[0]);
                }
            }
            fclose($filehandler);
        }
    }

    return $lastid;
}

$name = "";
$email = "";
$message = "";
$filename = "users.txt";

if (isset($_GET["logout"])) {
    session_unset();
    session_destroy();
    header("Location: register.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $filepath = __DIR__ . DIRECTORY_SEPARATOR . $filename;

    if ($name != "" && $email != "") {
        $lastid = getLastId($filepath);
        $newid = $lastid + 1;
        $line = $newid . "~" . $name . "~" . $email . "\n";
        file_put_contents($filepath, $line, FILE_APPEND);

        $_SESSION["userid"] = $newid;
        $_SESSION["username"] = $name;
        $_SESSION["useremail"] = $email;

        $message = "User saved successfully.";
        $name = "";
        $email = "";
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
    <title>Register User</title>
</head>
<body>
    <form action="register.php" method="post">
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>">
        <br>
        <label for="email">Email:</label>
        <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
        <br>
        <input type="submit" value="Register">
    </form>

    <p><a href="login.php">Go to Login</a></p>

    <?php
    if ($message != "") {
        echo "<p>" . $message . "</p>";
    }

    if (isset($_SESSION["userid"])) {
        echo "<p>Session User: " . $_SESSION["userid"] . " - " . $_SESSION["username"] . " - " . $_SESSION["useremail"] . "</p>";
        echo "<a href='register.php?logout=1'>Logout</a>";
    }
    ?>
</body>
</html>
