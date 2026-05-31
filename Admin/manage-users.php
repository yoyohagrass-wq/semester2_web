<?php

function ListAllUsers(){

    $allUsers=array();

    $fileHandler=fopen("../Website/userdata.txt","r") or die("error opening file!");
    while(($line=fgets($fileHandler))!==false){

            $data=explode("~",$line);
            $allUsers[]=array(
                "name"=>$data[0],
                "password"=>$data[1],
                "email"=>$data[2]
            );
        }

    fclose($fileHandler);
    return $allUsers;
}

if(isset($_GET["delete"])){

    $filePath="../Website/userdata.txt";

    $deleteIndex=$_GET["delete"];

    $lines=file($filePath);

    if(isset($lines[$deleteIndex])){

        unset($lines[$deleteIndex]);

        file_put_contents("../Website/userdata.txt",implode("",$lines));
    }

    header("Location: ".$_SERVER['PHP_SELF']);

    exit();
}

$AllUsers=ListAllUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - Al Mesbah Al Modie Foundation</title>
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
            <!-- Sidebar -->
            <nav class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar py-4">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item"><a class="nav-link text-white" href="admin-dashboard.php"><i class="fas fa-home me-2"></i>Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link active text-white" href="manage-users.php"><i class="fas fa-users me-2"></i>Users</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="manage-services.php"><i class="fas fa-boxes me-2"></i>Services</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="view-donations.php"><i class="fas fa-dollar-sign me-2"></i>Donations</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="messages.php"><i class="fas fa-envelope me-2"></i>Messages</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="volunteer-requests.php"><i class="fas fa-handshake me-2"></i>Volunteers</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="service-feedback.php"><i class="fas fa-star me-2"></i>Feedback</a></li>
                        <li class="nav-item mt-4"><a class="nav-link text-danger" href="admin-dashboard.php?logout=1"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 px-4 py-4">
                <h2 class="mb-4">Users List</h2>
                
                <div class="card shadow-sm">
                    <div class="card-body p-0">
                        <table class="table table-hover mb-0">

                            <tr>
                                <th>Name</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Delete</th>
                            </tr>

                            <?php for($i=0;$i<count($AllUsers);$i++){ ?>

                                <tr>
                                    <td><?php echo $AllUsers[$i]["name"]; ?></td>
                                    <td><?php echo $AllUsers[$i]["password"]; ?></td>
                                    <td><?php echo $AllUsers[$i]["email"]; ?></td>
                                    <td>
                                        <a href="?delete=<?php echo $i; ?>" class="btn btn-sm btn-danger">Delete</a>
                                    </td>
                                </tr>

                            <?php } ?>

                        </table>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>