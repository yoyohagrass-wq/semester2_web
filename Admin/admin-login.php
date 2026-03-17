<?php
session_start();

if (isset($_GET['logout']) && $_GET['logout'] === '1') {
  session_unset();
  session_destroy();
  header('Location: admin-login.php');
  exit;
}

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
  header('Location: admin-dashboard.php');
  exit;
}

$errorMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = trim($_POST['password'] ?? '');

  include 'admin_config.php';

  if ($username === $admin_username && $password === $admin_password) {
    $_SESSION['admin_logged_in'] = true;
    $_SESSION['admin_username'] = $username;
    header('Location: admin-dashboard.php');
    exit;
  }

  $errorMessage = 'Invalid admin username or password.';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Al Mesbah Al Modie Foundation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body.auth-admin {
            background: linear-gradient(135deg, #f4f7fb 0%, #eaf2ff 45%, #fff3dc 100%);
        }

        .admin-login-card {
            border: 0;
            border-radius: 1.25rem;
            overflow: hidden;
            box-shadow: 0 1rem 2.5rem rgba(15, 23, 42, 0.14);
        }

        .admin-side {
            background: linear-gradient(160deg, #0d3b66 0%, #1d4e89 60%, #2f6fb0 100%);
            color: #fff;
        }

        .admin-side ul {
            margin: 0;
            padding-left: 1rem;
        }

        .admin-side li {
            margin-bottom: 0.6rem;
        }

        .admin-form-panel {
            background-color: #ffffff;
        }

        .form-control.form-control-lg {
            border-radius: 0.8rem;
        }

        .btn-admin-login {
            border-radius: 0.8rem;
            font-weight: 600;
        }
    </style>
</head>
<body class="auth-admin">
    <div class="min-vh-100 d-flex align-items-center justify-content-center py-4 py-lg-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">
                    <div class="card admin-login-card">
                        <div class="row g-0">
                            <div class="col-lg-5 admin-side p-4 p-lg-5 d-flex flex-column justify-content-center">
                                <h2 class="h4 mb-3">Admin Console</h2>
                                <p class="mb-4 opacity-75">Al Mesbah Al Modie Foundation</p>
                                <h3 class="h5 mb-3">Admin access</h3>
                                <ul class="small">
                                    <li>Manage users, donations, and volunteer requests.</li>
                                    <li>Review messages and service feedback entries.</li>
                                    <li>Access dashboard operations securely.</li>
                                </ul>
                            </div>
                            <div class="col-lg-7 admin-form-panel p-4 p-lg-5">
                                <h1 class="h3 fw-bold mb-2">Admin Login</h1>
                                <p class="text-muted mb-4">Sign in with your admin credentials.</p>

                                <form method="post" action="admin-login.php">
                                    <div class="mb-3">
                                        <label for="username" class="form-label fw-semibold">Username</label>
                                        <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Enter username" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="password" class="form-label fw-semibold">Password</label>
                                        <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter password" required>
                                    </div>

                                    <button type="submit" class="btn btn-warning btn-lg w-100 btn-admin-login mt-3">Login</button>
                                </form>

                                <?php if ($errorMessage !== ''): ?>
                                    <div class="alert alert-danger mt-4" role="alert">
                                        <?php echo htmlspecialchars($errorMessage); ?>
                                    </div>
                                <?php endif; ?>

                                <div class="mt-4 pt-2 border-top">
                                    <a href="../Website/Website/index.php" class="text-decoration-none">Back to website</a>
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
