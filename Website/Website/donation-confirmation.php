<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Donation Successful - Al Mesbah Al Modie Foundation</title>
  <meta name="description" content="Donation confirmation for Al Mesbah Al Modie Foundation, a charity and humanitarian aid organization in Egypt.">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body class="bg-light">
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $amount = trim($_POST['Donation-Amount'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if ($name && $email && $amount && is_numeric($amount) && $amount > 0) {
        $filepath = __DIR__ . DIRECTORY_SEPARATOR . 'donations.txt';
        $lastid = 0;
        if (file_exists($filepath)) {
            $lines = file($filepath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            if (!empty($lines)) {
                $lastLine = end($lines);
                $data = explode("~", $lastLine);
                $lastid = intval($data[0] ?? 0);
            }
        }
        $newid = $lastid + 1;
        $line = $newid . "~" . $name . "~" . $email . "~" . $amount . "~" . $message . "~" . date('Y-m-d H:i:s') . "\n";
        file_put_contents($filepath, $line, FILE_APPEND);
    }
}
?>
  <div class="min-vh-100 d-flex align-items-center justify-content-center py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
          <div class="card shadow-lg border-0 rounded-4 text-center">
            <div class="card-body p-5">
              <div class="mb-4">
                <i class="fas fa-check-circle text-success check-icon"></i>
              </div>
              <h6 class="text-muted mb-3 text-uppercase fw-semibold">Donation received</h6>
              <h2 class="mb-2 fw-bold">Al Mesbah Al Modie Foundation</h2>
              <p class="text-muted mb-4">Charity and humanitarian aid in Egypt</p>
              <h1 class="display-5 fw-bold mb-4">Thank You</h1>
              <p class="lead mb-3">Your donation has been received successfully.</p>
              <p class="text-muted mb-5">Your support helps Al Mesbah Al Modie Foundation deliver food, medical care, and emergency relief to families across Egypt.</p>
              <a href="index.php" class="btn btn-warning btn-lg px-5 fw-semibold"><i class="fas fa-home me-2"></i>Back to Home</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
