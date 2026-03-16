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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Services - Al Mesbah Al Modie Foundation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Manage Services</span>
            <span class="navbar-text text-white">Al Mesbah Al Modie Foundation</span>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row min-vh-100">
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar py-4">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link text-white" href="admin-dashboard.php"><i class="fas fa-home me-2"></i>Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="manage-users.php"><i class="fas fa-users me-2"></i>Users</a></li>
                        <li class="nav-item"><a class="nav-link active text-white" href="manage-services.php"><i class="fas fa-boxes me-2"></i>Services</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="view-donations.php"><i class="fas fa-dollar-sign me-2"></i>Donations</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="messages.php"><i class="fas fa-envelope me-2"></i>Messages</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="volunteer-requests.php"><i class="fas fa-handshake me-2"></i>Volunteers</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="service-feedback.php"><i class="fas fa-star me-2"></i>Feedback</a></li>
                        <li class="nav-item mt-4"><a class="nav-link text-danger" href="admin-login.php?logout=1"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 px-4 py-4">
                <h2 class="mb-4">Manage Services</h2>

                <?php if ($message !== ''): ?>
                    <div class="alert alert-<?php echo $messageClass === 'success' ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
                        <?php echo htmlspecialchars($message); ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="fas fa-list me-2"></i>Available Services</h5>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-hover table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($services as $service): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars((string) $service['id']); ?></td>
                                        <td><?php echo htmlspecialchars($service['name']); ?></td>
                                        <td><?php echo htmlspecialchars(substr($service['description'], 0, 50)); ?>...</td>
                                        <td>
                                            <a class="btn btn-sm btn-info" href="manage-services.php?selected=<?php echo urlencode((string) $service['id']); ?>">Select</a>
                                            <form method="post" action="manage-services.php" style="display:inline;">
                                                <input type="hidden" name="action" value="delete">
                                                <input type="hidden" name="selected_id" value="<?php echo htmlspecialchars((string) $service['id']); ?>">
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this service?')">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card shadow-sm">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="fas fa-plus me-2"></i>Create / Update Service</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" action="manage-services.php">
                            <input type="hidden" name="selected_id" value="<?php echo htmlspecialchars((string) ($selectedService['id'] ?? 0)); ?>">

                            <div class="mb-3">
                                <label for="serviceName" class="form-label">Service Name</label>
                                <input type="text" id="serviceName" name="serviceName" class="form-control" value="<?php echo htmlspecialchars($selectedService['name'] ?? ''); ?>" placeholder="Enter Service Name" required>
                            </div>

                            <div class="mb-3">
                                <label for="serviceDesc" class="form-label">Description</label>
                                <textarea id="serviceDesc" name="serviceDesc" class="form-control" placeholder="Enter Service Description" rows="4" required><?php echo htmlspecialchars($selectedService['description'] ?? ''); ?></textarea>
                            </div>

                            <div class="btn-group w-100" role="group">
                                <button type="submit" class="btn btn-outline-success" name="action" value="add"><i class="fas fa-plus me-2"></i>Add Service</button>
                                <button type="submit" class="btn btn-outline-primary" name="action" value="edit"><i class="fas fa-edit me-2"></i>Update Service</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
