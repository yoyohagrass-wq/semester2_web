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
$messageClass = "";
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

        $message = "Registration successful. Thank you for joining Al Mesbah Al Modie Foundation.";
        $messageClass = "success";
        $name = "";
        $email = "";
    } else {
        $message = "Please enter your name and email.";
        $messageClass = "error";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Al Mesbah Al Modie Foundation</title>
    <meta name="description" content="Register with Al Mesbah Al Modie Foundation and stay connected with charity and humanitarian aid activities in Egypt.">
    <meta name="author" content="Al Mesbah Al Modie Foundation">
    <link rel="stylesheet" href="style.css?v=20260310e">
</head>
<body class="auth-body">
    <main class="auth-shell">
        <section class="auth-card">
            <div class="auth-brand">Al Mesbah Al Modie Foundation</div>
            <h1>Create an Account</h1>
            <p class="auth-tagline">Charity and humanitarian aid in Egypt</p>
            <p class="auth-copy">Register to stay close to Al Mesbah Al Modie Foundation campaigns, volunteer opportunities, and community support work across Egypt.</p>

            <form action="register.php" method="post" class="auth-form">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>" placeholder="Enter your name">

                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="Enter your email">

                <input type="submit" value="Register">
            </form>

            <div class="auth-links">
                <p><a href="login.php">Already have an account?</a> Log in here.</p>
                <p><a href="index.php">Back to home</a></p>
            </div>

            <?php if ($message != ""): ?>
                <div class="status-message <?php echo $messageClass; ?>"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>

            <?php if (isset($_SESSION["userid"])): ?>
                <div class="session-details">
                    <p>Session User: <?php echo htmlspecialchars($_SESSION["userid"] . " - " . $_SESSION["username"] . " - " . $_SESSION["useremail"]); ?></p>
                    <p><a href="register.php?logout=1">Logout</a></p>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
