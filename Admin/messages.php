<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Messages - Admin Panel</title>
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
          <a href="view-donations.php">💰 Donations</a>
          <a href="messages.php" class="active">📨 Messages</a>
          <a href="volunteer-requests.php">🤝 Volunteers</a>
          <a href="service-feedback.php">⭐ Feedback</a>
          <div class="logout">
            <a href="admin-login.php">Logout</a>
          </div>
        </div>
      </div>

      <div class="main">
        <h2>Messages</h2>

        <div class="message-list">
          <div class="message">
            <h4>Ahmed Mahmoud</h4>
            <p>
              Good evening, I'd like to volunteer for the upcoming food
              distribution event.
            </p>
            <small>Received: Oct 30, 2025</small><br />
            <button class="reply-btn">Reply</button>
          </div>

          <div class="message">
            <h4>Fatma Ali</h4>
            <p>what else can I donate instead of money?</p>
            <small>Received: Oct 28, 2025</small><br />
            <button class="reply-btn">Reply</button>
          </div>

          <div class="message">
            <h4>Omar Youssef</h4>
            <p>
              Requesting information about Ramadan volunteering schedules in
              Alexandria.
            </p>
            <small>Received: Oct 25, 2025</small><br />
            <button class="reply-btn">Reply</button>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
