<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Services - Al Mesbah Al Modie Foundation</title>
    <link rel="stylesheet" href="adminstyle.css?v=20260310e" />
    <script src="Admin script.js?v=20260310e"></script>
  </head>

  <body>
    <header>
      <h1>Manage Services - Al Mesbah Al Modie Foundation</h1>
      <p>Charity and humanitarian aid in Egypt</p>
    </header>

    <div class="container">
      <div class="sidebar">
        <div class="sidebar-list">
          <a href="admin-dashboard.php">🏠 Dashboard</a>
          <a href="manage-services.php" class="active">📦 Services</a>
          <a href="view-donations.php">💰 Donations</a>
          <a href="messages.php">📨 Messages</a>
          <a href="volunteer-requests.php">🤝 Volunteers</a>
          <a href="service-feedback.php">⭐ Feedback</a>
          <div class="logout">
            <a href="admin-login.php">Logout</a>
          </div>
        </div>
      </div>

      <div class="main">
        <h2>Manage Services</h2>

        <div class="card">
          <h3>Available Services</h3>
          <div class="services-table">
            <div class="services-column">
              <ul class="servicesList">
                <li onclick="selectService(this)">Maedet El Rahman</li>
                <li onclick="selectService(this)">Orphan's Day Celebration</li>
                <li onclick="selectService(this)">Ramadan Food Boxes</li>
                <li onclick="selectService(this)">Mother's Day Celebration</li>
                <li onclick="selectService(this)">Paying Debts</li>
                <li onclick="selectService(this)">Meat Distribution</li>
                <li onclick="selectService(this)">Prosthetic Limbs Support</li>
                <li onclick="selectService(this)">Water Connection Projects</li>
              </ul>
            </div>
            <div class="services-column">
              <ul class="servicesList">
                <li onclick="selectService(this)">Distribution of Blankets</li>
                <li onclick="selectService(this)">Bride Preparation Support</li>
                <li onclick="selectService(this)">Home Renovation in Upper</li>
                <li onclick="selectService(this)">Water Purification</li>
                <li onclick="selectService(this)">Hearing Aid Installation</li>
                <li onclick="selectService(this)">Cancer Patient Care</li>
                <li onclick="selectService(this)">Dialysis Unit Support</li>
                <li onclick="selectService(this)">Relief Bag Distribution</li>
              </ul>
            </div>
          </div>
        </div>

        <div class="card">
          <h3>Add New Service</h3>
          <form onsubmit="return validateServiceForm()">
            <label for="serviceName">Service Name:</label>
            <input
              type="text"
              id="serviceName"
              placeholder="Enter Service Name"
            />
            <label for="serviceDesc">Description:</label>
            <textarea
              id="serviceDesc"
              placeholder="Enter Service Description"
              rows="4"
            ></textarea>
            <input
              type="button"
              class="button"
              value="Add Service"
              onclick="AddService()"
            />

            <input
              type="button"
              class="button"
              id="editBtn"
              value="Edit Service"
              onclick="EditService()"
              style="display: none"
            />

            <input
              type="button"
              class="button"
              id="deleteBtn"
              value="Delete Service"
              onclick="DeleteService()"
              style="display: none"
            />
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
