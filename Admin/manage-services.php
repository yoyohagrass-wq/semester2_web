<?php
session_start();

if(!isset($_SESSION["admin_logged_in"])){
    header("Location: admin-login.php");
    exit();
}

$fileName = "services-data.txt";
$message = "";

$selectedId = "";
$name = "";
$desc = "";

if(isset($_GET["selected"])){

    $selectedId = $_GET["selected"];

    $FileHandler = fopen($fileName,"r") or die("error opening file!");

    while(!feof($FileHandler)){

        $line = fgets($FileHandler);
        $data = explode("~",trim($line));

        if(count($data) > 2){

            if($data[0] == $selectedId){

                $name = $data[1];
                $desc = $data[2];
                break;
            }
        }
    }

    fclose($FileHandler);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $action = $_POST["action"];
    $selectedId = $_POST["selected_id"];
    $name = trim($_POST["serviceName"]);
    $desc = trim($_POST["serviceDesc"]);

    if($action == "add"){

        if($name == "" || $desc == ""){
            $message = "Please fill all fields";
        }
        else {

            $FileHandler = fopen($fileName,"a+") or die("error opening file!");

            $id = 1;

            rewind($FileHandler);

            while(!feof($FileHandler)){

                $line = fgets($FileHandler);
                $data = explode("~",$line);

                if(count($data) > 0 && trim($data[0]) != ""){
                    $id = (int)trim($data[0]) + 1;
                }
            }

            $record = $id."~".$name."~".$desc."\r\n";

            fwrite($FileHandler,$record);
            fclose($FileHandler);

            $message = "Service Added";
        }
    }

    if($action == "edit"){

        $contents = file_get_contents($fileName);

        $FileHandler = fopen($fileName,"r");

        while(!feof($FileHandler)){

            $line = fgets($FileHandler);
            $data = explode("~",trim($line));

            if(count($data) > 2){

                if($data[0] == $selectedId){

                    $oldRecord = $line;

                    $newRecord =
                    $selectedId."~".
                    $name."~".
                    $desc."\r\n";

                    $contents =
                    str_replace(
                    $oldRecord,
                    $newRecord,
                    $contents);
                }
            }
        }

        fclose($FileHandler);

        file_put_contents($fileName,$contents);

        $message = "Service Updated";
    }

    if($action == "delete"){

        $contents = file_get_contents($fileName);

        $FileHandler = fopen($fileName,"r");

        while(!feof($FileHandler)){

            $line = fgets($FileHandler);
            $data = explode("~",trim($line));

            if(count($data) > 2){

                if($data[0] == $selectedId){

                    $contents =
                    str_replace(
                    $line,
                    "",
                    $contents);
                }
            }
        }

        fclose($FileHandler);

        file_put_contents($fileName,$contents);

        $message = "Service Deleted";

        $selectedId = "";
        $name = "";
        $desc = "";
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

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 px-4 py-4">
                <h2>Manage Services</h2>

                <font color="red">
                    <?php echo $message; ?>
                </font>

                <br><br>

                <table class="table table-bordered">

                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Select</th>
                        <th>Delete</th>
                    </tr>

                    <?php

                    for($i=0;$i<count($AllServices);$i++)
                    {
                        $Row=explode("~",$AllServices[$i]);

                        if(count($Row)>2)
                        {
                            echo "<tr>";

                            echo "<td>".$Row[0]."</td>";
                            echo "<td>".$Row[1]."</td>";
                            echo "<td>".$Row[2]."</td>";

                            echo "<td>
                            <a class='btn btn-info btn-sm' href=manage-services.php?selected=".$Row[0].">
                            Select
                            </a>
                            </td>";

                            echo "<td>
                            <form method=post action=manage-services.php>
                            <input type=hidden name=action value=delete>
                            <input type=hidden name=selected_id value=".$Row[0].">
                            <input type=submit value=Delete class='btn btn-danger btn-sm'>
                            </form>
                            </td>";

                            echo "</tr>";
                        }
                    }

                    ?>

                </table>

                <hr>

                <form method="post" action="manage-services.php" class="bg-white p-4 rounded shadow-sm mb-4">

                    <input type="hidden" name="selected_id" value="<?php echo $selectedId; ?>">

                    <div class="mb-3">
                        <label class="form-label">Service Name</label>
                        <input type="text" name="serviceName"
                        class="form-control"
                        value="<?php echo $SelectedName; ?>">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea
                        name="serviceDesc"
                        class="form-control" rows="3"><?php echo $SelectedDesc; ?></textarea>
                    </div>

                    <button type="submit" name="action" value="add" class="btn btn-success">Add</button>
                    <button type="submit" name="action" value="edit" class="btn btn-primary">Edit</button>

                </form>

            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>