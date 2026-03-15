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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Login - Al Mesbah Al Modie Foundation</title>
    <link rel="stylesheet" href="adminstyle.css?v=20260310e" />
    <script src="Admin script.js?v=20260310e" defer></script>
  </head>
  <body>
    <div class="login-bg">
      <div class="login-box">
        <h2>Admin Login</h2>
        <p>Al Mesbah Al Modie Foundation<br>Charity and humanitarian aid in Egypt</p>
        <form method="post" action="admin-login.php" onsubmit="return validateLoginForm()">
          <input
            type="text"
            id="username"
            name="username"
            placeholder="Username"
          />
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Password"
          />

          <button type="submit">Login</button>
        </form>
        <?php if ($errorMessage !== ''): ?>
          <p class="status-message error"><?php echo htmlspecialchars($errorMessage); ?></p>
        <?php endif; ?>
      </div>
    </div>
  </body>
</html>
