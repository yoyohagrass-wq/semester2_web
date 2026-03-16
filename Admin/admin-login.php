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

  if ($username === 'admin' && $password === 'admin123') {
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
    <script src="Admin script.js?v=20260310e" defer></script>
</head>
<body class="bg-light">
    <div class="min-vh-100 d-flex align-items-center justify-content-center py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="card shadow-lg border-0 rounded-4">
                        <div class="card-body p-5">
                            <h2 class="card-title text-center mb-2">Al Mesbah Al Modie Foundation</h2>
                            <h1 class="h3 text-center mb-4 fw-bold">Admin Login</h1>
                            <p class="text-center text-muted mb-4">Charity and humanitarian aid in Egypt</p>

                            <form method="post" action="admin-login.php" onsubmit="return validateLoginForm()">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Enter username" required>
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-lg" placeholder="Enter password" required>
                                </div>

                                <button type="submit" class="btn btn-danger btn-lg w-100 fw-semibold mt-4">Login</button>
                            </form>

                            <?php if ($errorMessage !== ''): ?>
                                <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
                                    <?php echo htmlspecialchars($errorMessage); ?>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
