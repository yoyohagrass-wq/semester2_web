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

$selectedService = null;

if(isset($_GET["select"]))
{
    $selectedIndex = $_GET["select"];

    if(isset($allServices[$selectedIndex]))
    {
        $selectedService = $allServices[$selectedIndex];
    }
}

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
                        <li class="nav-item"><a class="nav-link text-white" href="volunteer-requests.php"><i class="fas fa-handshake me-2"></i>Volunteers</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="service-feedback.php"><i class="fas fa-star me-2"></i>Feedback</a></li>
                        <li class="nav-item mt-4"><a class="nav-link text-danger" href="admin-dashboard.php?logout=1" onclick="return confirm('Are you sure you want to logout?');"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 col-lg-10 px-4 py-4">
                <h2>Manage Services</h2>


                <br><br>

                <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <th>Service Name</th>
                        <th>Description</th>
                        <th>Action</th>
                    </tr>

                    <?php
                        for($i = 0; $i < count($allServices); $i++)
                        {
                        echo "<tr>";
                        echo "<td>".$allServices[$i]["Id"]."</td>";
                        echo "<td>".$allServices[$i]["Name"]."</td>";
                        echo "<td>".$allServices[$i]["Description"]."</td>";
                        echo "<td><a href='?select=".$i."'>Select</a></td>";
                        echo "</tr>";
                        }
                    ?>
                </table>

                <hr>


                <form method="post">

                    ID<br>
                    <input type="text" name="id"
                    value="<?php echo $selectedService ? $selectedService["Id"] : ""; ?>">
                    <br><br>

                    Service Name<br>
                    <input type="text" name="name"
                    value="<?php echo $selectedService ? $selectedService["Name"] : ""; ?>">
                    <br><br>

                    Description<br>
                    <textarea name="description"><?php echo $selectedService ? $selectedService["Description"] : ""; ?></textarea>
                    <br><br>

                    <?php if($selectedService){ ?>

                    <input type="hidden" name="selectedIndex"
                    value="<?php echo $selectedIndex; ?>">

                    <input type="submit" name="delete" value="Delete">

                    <?php } else { ?>

                    <input type="submit" name="add" value="Add">

                    <?php } ?>

            </form>
                

            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
