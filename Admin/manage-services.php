<?php
session_start();

if(!isset($_SESSION["admin_logged_in"])){
    header("Location: admin-login.php");
    exit();
}

function getAllServices()
{
    $allServices = array();

    $fileHandler = fopen("services-data.txt", "r");

    while(!feof($fileHandler))
    {
        $line = trim(fgets($fileHandler));

        if($line != "")
        {
            $lineSplitted = explode("~", $line);

            $serviceData = array(
                "Id" => $lineSplitted[0],
                "Name" => $lineSplitted[1],
                "Description" => $lineSplitted[2]
            );

            $allServices[] = $serviceData;
        }
    }

    fclose($fileHandler);

    return $allServices;
}

$allServices = getAllServices();

$selectedIndex = null;
$selectedService = null;

if(isset($_GET["select"]))
{
    $selectedIndex = $_GET["select"];

    if(isset($allServices[$selectedIndex]))
    {
        $selectedService = $allServices[$selectedIndex];
    }
}

$allServices = getAllServices();


if(isset($_POST["delete"]))
{
    $selectedIndex = $_POST["selectedIndex"];

    $lines = file("services-data.txt");

    unset($lines[$selectedIndex]);

    file_put_contents("services-data.txt", implode("", $lines));

    header("Location: manage-services.php");
    exit();
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
                        <li class="nav-item"><a class="nav-link active text-white" href="manage-services.php"><i class="fas fa-boxes me-2"></i>Services</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="view-donations.php"><i class="fas fa-dollar-sign me-2"></i>Donations</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="messages.php"><i class="fas fa-envelope me-2"></i>Messages</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="volunteer-requests.php"><i class="fas fa-handshake me-2"></i>Volunteers</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="service-feedback.php"><i class="fas fa-star me-2"></i>Feedback</a></li>
                        <li class="nav-item mt-4"><a class="nav-link text-danger" href="admin-dashboard.php?logout=1"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 col-lg-10 px-4 py-4">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-4">
                    <h2 class="mb-0">Manage Services</h2>
                    <?php if ($selectedService) { ?>
                        <a href="manage-services.php" class="btn btn-outline-secondary btn-sm">Clear selection</a>
                    <?php } ?>
                </div>

                <div class="row g-4">
                    <div class="col-xl-8">
                        <div class="card shadow-sm">
                            <div class="card-body p-0">
                                <table class="table table-hover mb-0">
                                    <tr>
                                        <th>ID</th>
                                        <th>Service Name</th>
                                        <th>Description</th>
                                        <th style="width: 1%;">Action</th>
                                    </tr>

                                    <?php
                                        for($i = 0; $i < count($allServices); $i++)
                                        {
                                            $isSelected = ($selectedIndex !== null && (string)$selectedIndex === (string)$i);
                                            echo "<tr".($isSelected ? " class='table-primary'" : "").">";
                                            echo "<td>".$allServices[$i]["Id"]."</td>";
                                            echo "<td>".$allServices[$i]["Name"]."</td>";
                                            echo "<td>".$allServices[$i]["Description"]."</td>";
                                            echo "<td><a href='?select=".$i."' class='btn btn-sm btn-outline-primary'>Select</a></td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title mb-3"><?php echo $selectedService ? "Selected Service" : "Add Service"; ?></h5>

                                <form method="post" class="service-form">
                                    <div class="mb-3">
                                        <label for="serviceId" class="form-label">ID</label>
                                        <input id="serviceId" type="text" name="id" class="form-control"
                                            value="<?php echo $selectedService ? $selectedService["Id"] : ""; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="serviceName" class="form-label">Service Name</label>
                                        <input id="serviceName" type="text" name="name" class="form-control"
                                            value="<?php echo $selectedService ? $selectedService["Name"] : ""; ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="serviceDescription" class="form-label">Description</label>
                                        <textarea id="serviceDescription" name="description" class="form-control" rows="4"><?php echo $selectedService ? $selectedService["Description"] : ""; ?></textarea>
                                    </div>

                                    <?php if($selectedService){ ?>
                                        <input type="hidden" name="selectedIndex" value="<?php echo $selectedIndex; ?>">
                                        <button type="submit" name="delete" value="1" class="btn btn-danger w-100">Delete</button>
                                    <?php } else { ?>
                                        <button type="submit" name="add" value="1" class="btn btn-primary w-100">Add</button>
                                    <?php } ?>
                                </form>
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
