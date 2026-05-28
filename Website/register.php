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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $password = trim($_POST["password"] ?? "");

    if ($name != "" && $email != "" && $password != "" && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Check if email already exists
        $emailExists = false;
        if (file_exists($filename)) {
            $filehandler = fopen($filepath, "r");
            if ($filehandler) {
                while (($line = fgets($filehandler)) !== false) {
                    if (trim($line) != "") {
                        $data = explode("~", trim($line));
                        if (count($data) >= 3 && $data[2] === $email) {
                            $emailExists = true;
                            break;
                        }
                    }
                }
                fclose($filehandler);
            }
        }

        if (!$emailExists) {
            $lastid = getLastId($filepath);
            $newid = $lastid + 1;
            $line = $newid . "~" . $name . "~" . $email . "~" . $password . "\n";
            file_put_contents($filepath, $line, FILE_APPEND);

            $_SESSION["userid"] = $newid;
            $_SESSION["username"] = $name;
            $_SESSION["useremail"] = $email;

            header("Location: login.php");
            exit;
        } else {
            $message = "Email already registered.";
            $messageClass = "error";
        }
    } else {
        $message = "Please enter valid name, email, and password.";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="home.css">
</head>
<body class="auth-register">
    <div class="min-vh-100 d-flex align-items-center justify-content-center py-4 py-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">
                    <div class="card register-card">
                        <div class="row g-0">
                            <div class="col-lg-5 register-side p-4 p-lg-5 d-flex flex-column justify-content-center">
                                <h2 class="h4 mb-3">Al Mesbah Al Modie Foundation</h2>
                                <p class="mb-4 opacity-75">Charity and humanitarian aid in Egypt</p>
                                <h3 class="h5 mb-3">Why create an account?</h3>
                                <ul class="small">
                                    <li>Track your support and community engagement.</li>
                                    <li>Register faster for volunteer and donation forms.</li>
                                    <li>Stay connected to current foundation initiatives.</li>
                                </ul>
                            </div>
                            <div class="col-lg-7 register-form-panel p-4 p-lg-5">
                                <h1 class="h3 fw-bold mb-2">Create an Account</h1>
                                <p class="text-muted mb-4">Join the foundation community in less than a minute.</p>

                                <form action="register.php" method="post">
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-semibold">Name</label>
                                        <input type="text" name="name" id="name" class="form-control form-control-lg" value="<?php echo htmlspecialchars($name); ?>" placeholder="Enter your name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label fw-semibold">Email</label>
                                        <input type="email" name="email" id="email" class="form-control form-control-lg" value="<?php echo htmlspecialchars($email); ?>" placeholder="Enter your email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label fw-semibold">Password</label>
                                        <input type="password" name="password" id="password" class="form-control form-control-lg" placeholder="Enter your password" required>
                                    </div>

                                    <button type="submit" class="btn btn-warning btn-lg w-100 btn-register mt-3">Register</button>
                                </form>

                                <?php if ($message != ""): ?>
                                    <div class="alert alert-<?php echo $messageClass === 'success' ? 'success' : 'danger'; ?> mt-4" role="alert">
                                        <?php echo htmlspecialchars($message); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mt-4 pt-2 border-top">
                                    <a href="login.php" class="text-decoration-none fw-semibold">Already have an account? Log in</a>
                                    <a href="index.php" class="text-decoration-none">Back to home</a>
                                </div>

                                <div class="mt-3 text-center">
                                    <a href="../../Admin/admin-login.php" class="btn btn-outline-primary px-4">I am Admin</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
