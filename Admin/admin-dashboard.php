<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
  header('Location: admin-login.php');
  exit;
}

if (isset($_GET['logout']) && $_GET['logout'] === '1') {
  session_unset();
  session_destroy();
  header('Location: admin-login.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Dashboard - Al Mesbah Al Modie Foundation</title>
    <link rel="stylesheet" href="adminstyle.css?v=20260310e" />
  </head>

  <body>
    <header>
      <h1>Al Mesbah Al Modie Foundation Admin Dashboard</h1>
      <p>Charity and humanitarian aid in Egypt</p>
    </header>

    <div class="container">
      <div class="sidebar">
        <div class="sidebar-list">
          <a href="admin-dashboard.php" class="active">🏠 Dashboard</a>
          <a href="manage-users.php">👤 Users</a>
          <a href="manage-services.php">📦 Services</a>
          <a href="view-donations.php">💰 Donations</a>
          <a href="messages.php">📨 Messages</a>
          <a href="volunteer-requests.php">🤝 Volunteers</a>
          <a href="service-feedback.php">⭐ Feedback</a>
          <div class="logout">
            <a href="admin-dashboard.php?logout=1">Logout</a>
          </div>
        </div>
      </div>

      <div class="main">
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['admin_username'] ?? 'Admin'); ?></h2>

        <div class="card">
          <h3>Recent Donations</h3>
          <ul>
            <li>Ahmed Hassan donated 500 EGP.</li>
            <li>Fatma Ali donated 200 EGP.</li>
          </ul>
        </div>

        <div class="card">
          <h3>Upcoming Ramadan Events</h3>
          <ul>
            <li>Maedat El Rahman - Giza: March 15</li>
            <li>Mother's Day Celebration - Cairo: March 21</li>
          </ul>
        </div>

        <div class="card">
          <h3>New Messages</h3>
          <ul>
            <li>You have 5 new messages.</li>
          </ul>
        </div>

        <div class="card">
          <h3>Admin Tasks</h3>
          <ul>
            <li><a href="manage-users.php">CRUD for users</a></li>
            <li><a href="manage-services.php">CRUD for services</a></li>
          </ul>
        </div>
      </div>
    </div>
  </body>
</html>
