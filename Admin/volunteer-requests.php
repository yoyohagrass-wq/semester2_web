<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Volunteer Requests - Admin Panel</title>
    <link rel="stylesheet" href="adminstyle.css" />
    <script src="Admin script.js" defer></script>
  </head>

  <body>
    <header>
      <h1>Admin Dashboard - Al Mesbah El Modie</h1>
    </header>

    <div class="container">
      <div class="sidebar">
        <div class="sidebar-list">
          <a href="admin-dashboard.html">🏠 Dashboard</a>
          <a href="manage-services.html">📦 Services</a>
          <a href="view-donations.html">💰 Donations</a>
          <a href="messages.html">📨 Messages</a>
          <a href="volunteer-requests.html" class="active">🤝 Volunteers</a>
          <a href="service-feedback.html">⭐ Feedback</a>
          <div class="logout">
            <a href="admin-login.html">Logout</a>
          </div>
        </div>
      </div>

      <div class="main">
        <h2>Submitted Volunteer Requests</h2>

        <div class="card">
          <table id="volunteerTable">
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Service</th>
              <th>Date</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>
