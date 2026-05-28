<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Donations - Al Mesbah Al Modie Foundation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link rel="stylesheet" href="adminstyle.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">View Donations</span>
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
                        <li class="nav-item"><a class="nav-link text-white" href="manage-services.php"><i class="fas fa-boxes me-2"></i>Services</a></li>
                        <li class="nav-item"><a class="nav-link active text-white" href="view-donations.php"><i class="fas fa-dollar-sign me-2"></i>Donations</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="messages.php"><i class="fas fa-envelope me-2"></i>Messages</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="volunteer-requests.php"><i class="fas fa-handshake me-2"></i>Volunteers</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="service-feedback.php"><i class="fas fa-star me-2"></i>Feedback</a></li>
                        <li class="nav-item mt-4"><a class="nav-link text-danger" href="admin-login.php?logout=1"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 px-4 py-4">
                <h2 class="mb-4">Donations Overview</h2>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-primary text-white">
                                <h5 class="mb-0"><i class="fas fa-list me-2"></i>Recent Donations</h5>
                            </div>
                            <div class="card-body table-responsive">
                                <table class="table table-sm table-hover">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Donor Name</th>
                                            <th>Amount (EGP)</th>
                                            <th>Date</th>
                                            <th>Method</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Ahmed Hassan</td>
                                            <td><span class="badge bg-success">500</span></td>
                                            <td>Oct 28, 2025</td>
                                            <td><span class="badge bg-info">Credit Card</span></td>
                                        </tr>
                                        <tr>
                                            <td>Fatma Ali</td>
                                            <td><span class="badge bg-success">200</span></td>
                                            <td>Oct 25, 2025</td>
                                            <td><span class="badge bg-warning">Cash</span></td>
                                        </tr>
                                        <tr>
                                            <td>Mohamed Youssef</td>
                                            <td><span class="badge bg-success">350</span></td>
                                            <td>Oct 20, 2025</td>
                                            <td><span class="badge bg-secondary">Bank Transfer</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card shadow-sm border-0">
                            <div class="card-header bg-success text-white">
                                <h5 class="mb-0"><i class="fas fa-chart-pie me-2"></i>Donations Summary</h5>
                            </div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <p class="mb-1"><strong>Total Donations:</strong></p>
                                    <h3 class="text-success">3</h3>
                                </div>
                                <div class="mb-3">
                                    <p class="mb-1"><strong>Total Amount:</strong></p>
                                    <h3 class="text-primary">1,050 EGP</h3>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar bg-success w-100" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <small class="text-muted">Target: 100,000 EGP</small>
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
