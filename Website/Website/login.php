<?php
session_start();

$name = "";
$email = "";
$message = "";
$messageClass = "";
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
                            $message = "Login successful. Welcome back to Al Mesbah Al Modie Foundation.";
                            $messageClass = "success";
                            $found = true;
                            break;
                        }
                    }
                }

                fclose($filehandler);
            }
        }

        if (!$found) {
            $message = "User not found. Register to support Al Mesbah Al Modie Foundation.";
            $messageClass = "error";
        }
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
    <title>Login - Al Mesbah Al Modie Foundation</title>
    <meta name="description" content="Log in to Al Mesbah Al Modie Foundation to stay connected with charity and humanitarian aid activities in Egypt.">
    <meta name="author" content="Al Mesbah Al Modie Foundation">
    <link rel="stylesheet" href="style.css?v=20260310e">
</head>
<body class="auth-body">
    <main class="auth-shell">
        <section class="auth-card">
            <div class="auth-brand">Al Mesbah Al Modie Foundation</div>
            <h1>Member Login</h1>
            <p class="auth-tagline">Charity and humanitarian aid in Egypt</p>
            <p class="auth-copy">Sign in to access your foundation account and stay connected with donations, volunteering, and community support programs across Egypt.</p>

            <form action="login.php" method="post" class="auth-form">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($name); ?>" placeholder="Enter your name">

                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="Enter your email">

                <input type="submit" value="Login">
            </form>

            <div class="auth-links">
                <p><a href="register.php">Create an account</a> to support the foundation.</p>
                <p><a href="index.php">Back to home</a></p>
            </div>

            <?php if ($message != ""): ?>
                <div class="status-message <?php echo $messageClass; ?>"><?php echo htmlspecialchars($message); ?></div>
            <?php endif; ?>

            <?php if (isset($_SESSION["userid"])): ?>
                <div class="session-details">
                    <p>Session User: <?php echo htmlspecialchars($_SESSION["userid"] . " - " . $_SESSION["username"] . " - " . $_SESSION["useremail"]); ?></p>
                    <p><a href="login.php?logout=1">Logout</a></p>
                </div>
            <?php endif; ?>
        </section>
    </main>
</body>
</html>
