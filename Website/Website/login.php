<?php
session_start();

$name = "";
$email = "";
$message = "";
$messageClass = "";
$filename = "users.txt";
$filepath = __DIR__ . DIRECTORY_SEPARATOR . $filename;

if (isset($_SESSION["userid"])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $found = false;

    if ($name != "" && $email != "") {
        if (file_exists($filepath)) {
            $lines = file($filepath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            if ($lines !== false) {
                foreach ($lines as $line) {
                    $data = explode("~", trim($line), 3);
                    $userid = intval($data[0] ?? 0);
                    $username = trim($data[1] ?? "");
                    $useremail = trim($data[2] ?? "");

                    if (strcasecmp($username, $name) === 0 && strcasecmp($useremail, $email) === 0) {
                        $_SESSION["userid"] = $userid;
                        $_SESSION["username"] = $username;
                        $_SESSION["useremail"] = $useremail;
                        header("Location: index.php");
                        exit;
                    }
                }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body.auth-login {
            background: linear-gradient(135deg, #f4f7fb 0%, #eaf2ff 45%, #fff3dc 100%);
        }

        .login-card {
            border: 0;
            border-radius: 1.25rem;
            overflow: hidden;
            box-shadow: 0 1rem 2.5rem #0f172a24;
        }

        .login-side {
            background: linear-gradient(160deg, #0d3b66 0%, #1d4e89 60%, #2f6fb0 100%);
            color: #fff;
        }

        .login-side ul {
            margin: 0;
            padding-left: 1rem;
        }

        .login-side li {
            margin-bottom: 0.6rem;
        }

        .login-form-panel {
            background-color: #ffffff;
        }

        .form-control.form-control-lg {
            border-radius: 0.8rem;
        }

        .btn-login {
            border-radius: 0.8rem;
            font-weight: 600;
        }
    </style>
</head>
<body class="auth-login">
    <main class="min-vh-100 d-flex align-items-center justify-content-center py-4 py-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">
                    <section class="card login-card">
                        <div class="row g-0">
                            <div class="col-lg-5 login-side p-4 p-lg-5 d-flex flex-column justify-content-center">
                                <h2 class="h4 mb-3">Al Mesbah Al Modie Foundation</h2>
                                <p class="mb-4 opacity-75">Charity and humanitarian aid in Egypt</p>
                                <h3 class="h5 mb-3">Member access</h3>
                                <ul class="small">
                                    <li>Check your member details and account session.</li>
                                    <li>Continue supporting donation and volunteer programs.</li>
                                    <li>Stay connected with current initiatives.</li>
                                </ul>
                            </div>
                            <div class="col-lg-7 login-form-panel p-4 p-lg-5">
                                <h1 class="h3 fw-bold mb-2">Member Login</h1>
                                <p class="text-muted mb-4">Sign in to continue supporting community programs.</p>

                                <form action="login.php" method="post">
                                    <div class="mb-3">
                                        <label for="name" class="form-label fw-semibold">Name</label>
                                        <input type="text" name="name" id="name" class="form-control form-control-lg" value="<?php echo htmlspecialchars($name); ?>" placeholder="Enter your name" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label fw-semibold">Email</label>
                                        <input type="email" name="email" id="email" class="form-control form-control-lg" value="<?php echo htmlspecialchars($email); ?>" placeholder="Enter your email" required>
                                    </div>

                                    <button type="submit" class="btn btn-warning btn-lg w-100 btn-login mt-3">Login</button>
                                </form>

                                <?php if ($message != ""): ?>
                                    <div class="alert alert-<?php echo $messageClass === 'success' ? 'success' : 'danger'; ?> mt-4" role="alert">
                                        <?php echo htmlspecialchars($message); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if (isset($_SESSION["userid"])): ?>
                                    <div class="alert alert-info mt-3" role="alert">
                                        Session User: <?php echo htmlspecialchars($_SESSION["userid"] . " - " . $_SESSION["username"] . " - " . $_SESSION["useremail"]); ?>
                                        <div class="mt-2"><a href="logout.php" class="fw-semibold text-decoration-none">Logout</a></div>
                                    </div>
                                <?php endif; ?>

                                <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-center gap-2 mt-4 pt-2 border-top">
                                    <a href="register.php" class="text-decoration-none fw-semibold">Create an account</a>
                                    <a href="index.php" class="text-decoration-none">Back to home</a>
                                </div>

                                <div class="mt-3 text-center">
                                    <a href="../../Admin/admin-login.php" class="btn btn-outline-primary px-4">I am Admin</a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
