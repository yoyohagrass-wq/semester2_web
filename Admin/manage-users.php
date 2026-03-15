<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: admin-login.php');
    exit;
}

$usersFile = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'Website' . DIRECTORY_SEPARATOR . 'Website' . DIRECTORY_SEPARATOR . 'users.txt';

function readUsers($filePath)
{
    $users = [];

    if (!file_exists($filePath)) {
        return $users;
    }

    $lines = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    if ($lines === false) {
        return $users;
    }

    foreach ($lines as $line) {
        $parts = explode('~', $line, 3);
        $id = intval(trim($parts[0] ?? '0'));
        $name = trim($parts[1] ?? '');
        $email = trim($parts[2] ?? '');

        if ($id > 0 && $name !== '' && $email !== '') {
            $users[] = [
                'id' => $id,
                'name' => $name,
                'email' => $email
            ];
        }
    }

    return $users;
}

function writeUsers($filePath, $users)
{
    $rows = [];

    foreach ($users as $user) {
        $rows[] = $user['id'] . '~' . $user['name'] . '~' . $user['email'];
    }

    file_put_contents($filePath, implode("\n", $rows) . (!empty($rows) ? "\n" : ''));
}

$message = '';
$messageClass = '';
$users = readUsers($usersFile);
$selectedId = intval($_GET['selected'] ?? $_POST['selected_id'] ?? 0);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';
    $name = trim($_POST['userName'] ?? '');
    $email = trim($_POST['userEmail'] ?? '');
    $selectedId = intval($_POST['selected_id'] ?? 0);

    if ($action === 'add') {
        if ($name === '' || $email === '') {
            $message = 'Please fill in all fields.';
            $messageClass = 'error';
        } else {
            $maxId = 0;
            foreach ($users as $user) {
                if ($user['id'] > $maxId) {
                    $maxId = $user['id'];
                }
            }
            $users[] = [
                'id' => $maxId + 1,
                'name' => $name,
                'email' => $email
            ];
            writeUsers($usersFile, $users);
            $message = 'User added.';
            $messageClass = 'success';
        }
    }

    if ($action === 'edit') {
        if ($selectedId > 0 && $name !== '' && $email !== '') {
            foreach ($users as &$user) {
                if ($user['id'] === $selectedId) {
                    $user['name'] = $name;
                    $user['email'] = $email;
                }
            }
            unset($user);
            writeUsers($usersFile, $users);
            $message = 'User updated.';
            $messageClass = 'success';
        } else {
            $message = 'Select a user and fill in all fields.';
            $messageClass = 'error';
        }
    }

    if ($action === 'delete') {
        $users = array_values(array_filter($users, function ($user) use ($selectedId) {
            return $user['id'] !== $selectedId;
        }));
        writeUsers($usersFile, $users);
        $selectedId = 0;
        $message = 'User deleted.';
        $messageClass = 'success';
    }

    $users = readUsers($usersFile);
}

$selectedUser = null;
foreach ($users as $user) {
    if ($user['id'] === $selectedId) {
        $selectedUser = $user;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Manage Users - Al Mesbah Al Modie Foundation</title>
  <link rel="stylesheet" href="adminstyle.css?v=20260310e" />
</head>
<body>
  <header>
    <h1>Manage Users - Al Mesbah Al Modie Foundation</h1>
    <p>Charity and humanitarian aid in Egypt</p>
  </header>

  <div class="container">
    <div class="sidebar">
      <div class="sidebar-list">
        <a href="admin-dashboard.php">🏠 Dashboard</a>
        <a href="manage-users.php" class="active">👤 Users</a>
        <a href="manage-services.php">📦 Services</a>
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
      <h2>Users CRUD</h2>

      <?php if ($message !== ''): ?>
        <p class="status-message <?php echo htmlspecialchars($messageClass); ?>"><?php echo htmlspecialchars($message); ?></p>
      <?php endif; ?>

      <div class="card">
        <h3>All Users</h3>
        <table>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
          <?php foreach ($users as $user): ?>
            <tr>
              <td><?php echo htmlspecialchars((string) $user['id']); ?></td>
              <td><?php echo htmlspecialchars($user['name']); ?></td>
              <td><?php echo htmlspecialchars($user['email']); ?></td>
              <td>
                <a class="button" href="manage-users.php?selected=<?php echo urlencode((string) $user['id']); ?>">Select</a>
                <form method="post" action="manage-users.php" style="display:inline;">
                  <input type="hidden" name="action" value="delete">
                  <input type="hidden" name="selected_id" value="<?php echo htmlspecialchars((string) $user['id']); ?>">
                  <button type="submit" class="button">Delete</button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
      </div>

      <div class="card">
        <h3>Create / Update User</h3>
        <form method="post" action="manage-users.php">
          <input type="hidden" name="selected_id" value="<?php echo htmlspecialchars((string) ($selectedUser['id'] ?? 0)); ?>">

          <label for="userName">Name:</label>
          <input type="text" id="userName" name="userName" value="<?php echo htmlspecialchars($selectedUser['name'] ?? ''); ?>" placeholder="Enter user name">

          <label for="userEmail">Email:</label>
          <input type="text" id="userEmail" name="userEmail" value="<?php echo htmlspecialchars($selectedUser['email'] ?? ''); ?>" placeholder="Enter user email">

          <button type="submit" class="button" name="action" value="add">Add User</button>
          <button type="submit" class="button" name="action" value="edit">Update User</button>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
