<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Service Feedback - Al Mesbah Al Modie Foundation</title>
    <link rel="stylesheet" href="adminstyle.css?v=20260310e" />
    <script src="Admin script.js?v=20260310e" defer></script>
  </head>

  <body>
    <header>
      <h1>Al Mesbah Al Modie Foundation Service Feedback</h1>
      <p>Charity and humanitarian aid in Egypt</p>
    </header>

    <div class="container">
      <div class="sidebar">
        <div class="sidebar-list">
          <a href="admin-dashboard.php">🏠 Dashboard</a>
          <a href="manage-services.php">📦 Services</a>
          <a href="view-donations.php">💰 Donations</a>
          <a href="messages.php">📨 Messages</a>
          <a href="volunteer-requests.php">🤝 Volunteers</a>
          <a href="service-feedback.php" class="active">⭐ Feedback</a>
          <div class="logout">
            <a href="admin-login.php">Logout</a>
          </div>
        </div>
      </div>

      <div class="main">
        <h2>Submitted Service Feedback</h2>

        <div class="card">
          <table id="feedbackTable">
            <tr>
              <th>Name</th>
              <th>Service</th>
              <th>Rating</th>
              <th>Feedback</th>
              <th>Date</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
