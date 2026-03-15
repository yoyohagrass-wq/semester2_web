<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
  header('Location: admin-login.php');
  exit;
}

$servicesFile = __DIR__ . DIRECTORY_SEPARATOR . 'services-data.txt';

function readServices($filePath)
{
  $services = [];

  if (!file_exists($filePath)) {
    return $services;
  }

  $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
  if ($lines === false) {
    return $services;
  }

  foreach ($lines as $line) {
    $parts = explode('~', $line, 3);
    $id = intval(trim($parts[0] ?? '0'));
    $name = trim($parts[1] ?? '');
    $description = trim($parts[2] ?? '');

    if ($id > 0 && $name !== '') {
      $services[] = ['id' => $id, 'name' => $name, 'description' => $description];
    }
  }

  return $services;
}

function writeServices($filePath, $services)
{
  $rows = [];
  foreach ($services as $service) {
    $rows[] = $service['id'] . '~' . $service['name'] . '~' . str_replace(["\r", "\n"], ' ', $service['description']);
  }
  file_put_contents($filePath, implode("\n", $rows) . (!empty($rows) ? "\n" : ''));
}

$message = '';
$messageClass = '';
$services = readServices($servicesFile);
$selectedId = intval($_GET['selected'] ?? $_POST['selected_id'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = $_POST['action'] ?? '';
  $name = trim($_POST['serviceName'] ?? '');
  $description = trim($_POST['serviceDesc'] ?? '');
  $selectedId = intval($_POST['selected_id'] ?? 0);

  if ($action === 'add') {
    if ($name === '' || $description === '') {
      $message = 'Please fill in all fields.';
      $messageClass = 'error';
    } else {
      $maxId = 0;
      foreach ($services as $service) {
        if ($service['id'] > $maxId) {
          $maxId = $service['id'];
        }
      }
      $services[] = ['id' => $maxId + 1, 'name' => $name, 'description' => $description];
      writeServices($servicesFile, $services);
      $message = 'Service added.';
      $messageClass = 'success';
    }
  }

  if ($action === 'edit') {
    foreach ($services as &$service) {
      if ($service['id'] === $selectedId) {
        $service['name'] = $name;
        $service['description'] = $description;
      }
    }
    unset($service);
    writeServices($servicesFile, $services);
    $message = 'Service updated.';
    $messageClass = 'success';
  }

  if ($action === 'delete') {
    $services = array_values(array_filter($services, function ($service) use ($selectedId) {
      return $service['id'] !== $selectedId;
    }));
    writeServices($servicesFile, $services);
    $selectedId = 0;
    $message = 'Service deleted.';
    $messageClass = 'success';
  }

  $services = readServices($servicesFile);
}

$selectedService = null;
foreach ($services as $service) {
  if ($service['id'] === $selectedId) {
    $selectedService = $service;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Manage Services - Al Mesbah Al Modie Foundation</title>
    <link rel="stylesheet" href="adminstyle.css?v=20260310e" />
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
          <a href="manage-users.php">👤 Users</a>
          <a href="manage-services.php" class="active">📦 Services</a>
          <a href="view-donations.php">💰 Donations</a>
          <a href="messages.php">📨 Messages</a>
          <a href="volunteer-requests.php">🤝 Volunteers</a>
          <a href="service-feedback.php">⭐ Feedback</a>
          <div class="logout">
            <a href="admin-login.php?logout=1">Logout</a>
          </div>
        </div>
      </div>

      <div class="main">
        <h2>Manage Services</h2>

        <?php if ($message !== ''): ?>
          <p class="status-message <?php echo htmlspecialchars($messageClass); ?>"><?php echo htmlspecialchars($message); ?></p>
        <?php endif; ?>

        <div class="card">
          <h3>Available Services</h3>
          <table>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Description</th>
              <th>Action</th>
            </tr>
            <?php foreach ($services as $service): ?>
              <tr>
                <td><?php echo htmlspecialchars((string) $service['id']); ?></td>
                <td><?php echo htmlspecialchars($service['name']); ?></td>
                <td><?php echo htmlspecialchars($service['description']); ?></td>
                <td>
                  <a class="button" href="manage-services.php?selected=<?php echo urlencode((string) $service['id']); ?>">Select</a>
                  <form method="post" action="manage-services.php" style="display:inline;">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="selected_id" value="<?php echo htmlspecialchars((string) $service['id']); ?>">
                    <button type="submit" class="button">Delete</button>
                  </form>
                </td>
              </tr>
            <?php endforeach; ?>
          </table>
        </div>

        <div class="card">
          <h3>Create / Update Service</h3>
          <form method="post" action="manage-services.php">
            <input type="hidden" name="selected_id" value="<?php echo htmlspecialchars((string) ($selectedService['id'] ?? 0)); ?>">
            <label for="serviceName">Service Name:</label>
            <input
              type="text"
              id="serviceName"
              name="serviceName"
              value="<?php echo htmlspecialchars($selectedService['name'] ?? ''); ?>"
              placeholder="Enter Service Name"
            />
            <label for="serviceDesc">Description:</label>
            <textarea
              id="serviceDesc"
              name="serviceDesc"
              placeholder="Enter Service Description"
              rows="4"
            ><?php echo htmlspecialchars($selectedService['description'] ?? ''); ?></textarea>
            <button type="submit" class="button" name="action" value="add">Add Service</button>
            <button type="submit" class="button" name="action" value="edit">Update Service</button>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
