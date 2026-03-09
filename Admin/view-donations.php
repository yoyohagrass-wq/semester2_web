<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>View Donations - Admin Panel</title>
    <link rel="stylesheet" href="adminstyle.css" />
  </head>
  <body>
    <header>
      <h1>Admin Dashboard - Al Mesbah El Modie</h1>
    </header>

    <div class="container">
      <div class="sidebar">
        <div class="sidebar-list">
          <a href="admin-dashboard.php">🏠 Dashboard</a>
          <a href="manage-services.php">📦 Services</a>
          <a href="view-donations.php" class="active">💰 Donations</a>
          <a href="messages.php">📨 Messages</a>
          <a href="volunteer-requests.php">🤝 Volunteers</a>
          <a href="service-feedback.php">⭐ Feedback</a>
          <div class="logout">
            <a href="admin-login.php">Logout</a>
          </div>
        </div>
      </div>

      <div class="main">
        <h2>View Donations</h2>

        <div class="card">
          <h3>Recent Donations</h3>
          <table>
            <tr>
              <th>Donor Name</th>
              <th>Amount (EGP)</th>
              <th>Date</th>
              <th>Payment Method</th>
            </tr>
            <tr>
              <td>Ahmed Hassan</td>
              <td>500</td>
              <td>Oct 28, 2025</td>
              <td>Credit Card</td>
            </tr>
            <tr>
              <td>Fatma Ali</td>
              <td>200</td>
              <td>Oct 25, 2025</td>
              <td>Cash</td>
            </tr>
            <tr>
              <td>Mohamed Youssef</td>
              <td>350</td>
              <td>Oct 20, 2025</td>
              <td>Bank Transfer</td>
            </tr>
          </table>
        </div>

        <div class="card">
          <h3>Donations Summary</h3>
          <p>Total Number of Donations: 3</p>
          <p>Total Amount: 1050 EGP</p>
        </div>
      </div>
    </div>
  </body>
</html>
