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

        header("Location: login.php");
        exit;
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="min-vh-100 d-flex align-items-center justify-content-center py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-body p-5">
                            <h2 class="card-title text-center mb-2">Al Mesbah Al Modie Foundation</h2>
                            <h1 class="h3 text-center mb-4 fw-bold">Create an Account</h1>
                            <p class="text-center text-muted mb-4">Charity and humanitarian aid in Egypt</p>

                            <form action="register.php" method="post">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-lg" value="<?php echo htmlspecialchars($name); ?>" placeholder="Enter your name" required>
                                </div>

                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control form-control-lg" value="<?php echo htmlspecialchars($email); ?>" placeholder="Enter your email" required>
                                </div>

                                <button type="submit" class="btn btn-warning btn-lg w-100 fw-semibold mt-4">Register</button>
                            </form>

                            <?php if ($message != ""): ?>
                                <div class="alert alert-<?php echo $messageClass === 'success' ? 'success' : 'danger'; ?> alert-dismissible fade show mt-4" role="alert">
                                    <?php echo htmlspecialchars($message); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <div class="text-center mt-4">
                                <p class="mb-2"><a href="login.php" class="text-decoration-none">Already have an account?</a> Log in here.</p>
                                <p><a href="index.php" class="text-decoration-none">Back to home</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
