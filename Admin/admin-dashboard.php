<?php
session_start();

if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin-login.php");
    exit();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: admin-login.php");
    exit();
}

function getTotalDonations(){

    $file = fopen("donations.txt", "r") or die("Unable to open file!");

    $sum = 0;

    while(!feof($file)){

        $line = fgets($file);
        $data = explode("~", $line);

        if(isset($data[2])){
            $sum += (float) trim($data[2]);
        }
    }

    fclose($file);

    return $sum;
}

$totalDonations = getTotalDonations();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Al Mesbah Al Modie Foundation</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="adminstyle.css">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">
                Al Mesbah Al Modie Foundation Admin
            </span>

            <span class="navbar-text text-white">
                Charity and humanitarian aid in Egypt
            </span>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row min-vh-100">

            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar py-4">
                <div class="position-sticky">

                    <ul class="nav flex-column">

                        <li class="nav-item">
                            <a class="nav-link active text-white" href="admin-dashboard.php">
                                <i class="fas fa-home me-2"></i>Dashboard
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="manage-users.php">
                                <i class="fas fa-users me-2"></i>Users
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="manage-services.php">
                                <i class="fas fa-boxes me-2"></i>Services
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="view-donations.php">
                                <i class="fas fa-dollar-sign me-2"></i>Donations
                            </a>
                        </li>

                        

                        <li class="nav-item">
                            <a class="nav-link text-white" href="volunteer-requests.php">
                                <i class="fas fa-handshake me-2"></i>Volunteers
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-white" href="service-feedback.php">
                                <i class="fas fa-star me-2"></i>Feedback
                            </a>
                        </li>

                        <li class="nav-item mt-4">
                            <a class="nav-link text-danger" href="admin-dashboard.php?logout=1" onclick="return confirm('Are you sure you want to logout?');">
                                <i class="fas fa-sign-out-alt me-2"></i>Logout
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 px-4 py-4">

                <h2 class="mb-4">
                    Welcome
                </h2>

                <div class="row g-4">

                    <!-- Total Donations -->
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0 h-100">
                            <div class="card-body d-flex flex-column justify-content-center">

                                <h5 class="card-title">
                                    <i class="fas fa-donate text-success me-2"></i>
                                    Total Donations
                                </h5>

                                <h2 class="fw-bold text-success mb-0">
                                    <?php echo $totalDonations; ?> EGP
                                </h2>

                            </div>
                        </div>
                    </div>

                    <!-- Upcoming Events -->
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">

                                <h5 class="card-title">
                                    <i class="fas fa-calendar text-warning me-2"></i>
                                    Upcoming Events
                                </h5>

                                <ul class="list-unstyled">
                                    <li><strong>Maedat El Rahman:</strong> March 15 - Giza</li>
                                    <li><strong>Mother's Day:</strong> March 21 - Cairo</li>
                                </ul>

                            </div>
                        </div>
                    </div>

                    <!-- Feedback Messages -->
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">

                                <h5 class="card-title">
                                    <i class="fas fa-envelope text-info me-2"></i>
                                    New Feedback Messages
                                </h5>

                                <p class="mb-0">
                                    You have <strong>5</strong> new feedback messages.
                                </p>

                                <a href="service-feedback.php" class="btn btn-sm btn-info mt-3">
                                    View Feedback
                                </a>

                            </div>
                        </div>
                    </div>

                    <!-- Admin Tasks -->
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-body">

                                <h5 class="card-title">
                                    <i class="fas fa-tasks text-primary me-2"></i>
                                    Admin Tasks
                                </h5>

                                <div class="btn-group-vertical w-100" role="group">
                                    <a href="manage-users.php" class="btn btn-outline-primary text-start">
                                        Manage Users
                                    </a>

                                    <a href="manage-services.php" class="btn btn-outline-primary text-start">
                                        Manage Services
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
