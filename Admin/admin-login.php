<?php
session_start();

if (isset($_GET["logout"]) && $_GET["logout"] == "1")
{
    session_unset();
    session_destroy();
    header("Location: admin-login.php");
    exit();
}

if (isset($_SESSION["admin_logged_in"]) && $_SESSION["admin_logged_in"] == true)
{
    header("Location: admin-dashboard.php");
    exit();
}

$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    include "admin_config.php";

    if ($username == $admin_username && $password == $admin_password)
    {
        $_SESSION["admin_logged_in"] = true;
        $_SESSION["admin_username"] = $username;

        header("Location: admin-dashboard.php");
        exit();
    }
    else
    {
        $errorMessage = "Invalid admin username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="adminstyle.css" rel="stylesheet">
</head>

<body class="auth-admin">

<div class="min-vh-100 d-flex align-items-center justify-content-center py-4">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="card admin-login-card">
                    <div class="row">

                        <div class="col-lg-5 admin-side p-4">

                            <h2>Admin Console</h2>
                            <p>Al Mesbah Al Modie Foundation</p>

                            <h3>Admin Access</h3>

                            <ul>
                                <li>Manage users and donations</li>
                                <li>Review requests and feedback</li>
                                <li>Access dashboard operations</li>
                            </ul>

                        </div>

                        <div class="col-lg-7 admin-form-panel p-4">

                            <h1>Admin Login</h1>

                            <form method="post" action="admin-login.php">

                                Username<br>
                                <input type="text" name="username" class="form-control"><br>

                                Password<br>
                                <input type="password" name="password" class="form-control"><br>

                                <input type="submit" value="Login" class="btn btn-warning">

                            </form>

                            <?php
                            if ($errorMessage != "")
                            {
                            ?>
                                <div class="alert alert-danger mt-3">
                                    <?php echo $errorMessage; ?>
                                </div>
                            <?php
                            }
                            ?>

                            <br>

                            <a href="../Website/index.php" class="btn-back-website">
                                &larr; Back to website
                            </a>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

</div>

</body>
</html>