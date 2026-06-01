<?php
session_start();

if(!isset($_SESSION["admin_logged_in"])){
    header("Location: admin-login.php");
    exit();
}

function ListAllFeedBacks(){

    $allFeedbacks=array();

    $fileHandler=fopen("feedback.txt","r");

    while(!feof($fileHandler)){

        $line=fgets($fileHandler);

        if(trim($line)!=""){

            $data=explode("~",$line);

            $feedback=array(
                "name"=>$data[0],
                "email"=>$data[1],
                "phone"=>$data[2],
                "mycombobox"=>$data[3],
                "message"=>$data[4]
            );

            $allFeedbacks[]=$feedback;
        }
    }

    fclose($fileHandler);

    return $allFeedbacks;
}
$allFeedbacks=ListAllFeedBacks();

if(isset($_POST["newOption"])){

    $option = trim($_POST["newOption"]);

    if($option != ""){

        $fileHandler = fopen("feedbackoptions.txt", "a+");

        fwrite($fileHandler, $option . "\n");

        fclose($fileHandler);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Feedback - Al Mesbah Al Modie Foundation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="adminstyle.css">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Al Mesbah Al Modie Foundation Admin</span>
            <span class="navbar-text text-white">Charity and humanitarian aid in Egypt</span>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row min-vh-100">
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar py-4">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link text-white" href="admin-dashboard.php"><i class="fas fa-home me-2"></i>Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="manage-users.php"><i class="fas fa-users me-2"></i>Users</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="manage-services.php"><i class="fas fa-boxes me-2"></i>Services</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="view-donations.php"><i class="fas fa-dollar-sign me-2"></i>Donations</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="volunteer-requests.php"><i class="fas fa-handshake me-2"></i>Volunteers</a></li>
                        <li class="nav-item"><a class="nav-link active text-white" href="service-feedback.php"><i class="fas fa-star me-2"></i>Feedback</a></li>
                        <li class="nav-item mt-4"><a class="nav-link text-danger" href="admin-dashboard.php?logout=1" onclick="return confirm('Are you sure you want to logout?');"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 col-lg-10 px-4 py-4">
                <h2 class="mb-4">Feedbacks</h2>

                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Selected Option</th>
                                    <th>Message</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    for($i = 0; $i < count($allFeedbacks); $i++)
                                    {
                                    echo "<tr>";
                                    echo "<td>".$allFeedbacks[$i]["name"]."</td>";
                                    echo "<td>".$allFeedbacks[$i]["email"]."</td>";
                                    echo "<td>".$allFeedbacks[$i]["phone"]."</td>";
                                    echo "<td>".$allFeedbacks[$i]["mycombobox"]."</td>";
                                    echo "<td>".$allFeedbacks[$i]["message"]."</td>";
                                    echo "</tr>";
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr>
    
                <div class="card shadow-sm mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Add New Feedback Option</h5>
                        <p class="card-text text-muted">Add a new option to the feedback form dropdown.</p>
                        <form method="post" class="row g-3 align-items-end">
                            <div class="col">
                                <label for="newOption" class="form-label visually-hidden">New Option</label>
                                <input type="text" id="newOption" name="newOption" class="form-control" placeholder="Enter new feedback option" required>
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Add Option</button>
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