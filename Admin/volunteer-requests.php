<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]))
{
    header("Location: admin-login.php");
    exit();
}

$fileName="volunteer-data.txt";

function ListAllVolunteers($fileName)
{
    $Result=array();

    if(!file_exists($fileName))
    {
        return $Result;
    }

    $myfile=fopen($fileName,"r");

    $i=0;

    while(!feof($myfile))
    {
        $line=fgets($myfile);

        if($line!="")
        {
            $Result[$i]=$line;
            $i++;
        }
    }

    fclose($myfile);

    return $Result;
}

function getVolunteerById($fileName,$id)
{
    if(!file_exists($fileName))
    {
        return FALSE;
    }

    $myfile=fopen($fileName,"r");

    while(!feof($myfile))
    {
        $line=fgets($myfile);
        $Arr=explode("~",$line);

        if(count($Arr)>6)
        {
            if($Arr[0]==$id)
            {
                fclose($myfile);
                return $line;
            }
        }
    }

    fclose($myfile);

    return FALSE;
}

function UpdateRecord($fileName,$NewRecord,$OldRecord)
{
    $contents=file_get_contents($fileName);
    $contents=str_replace($OldRecord,$NewRecord,$contents);
    file_put_contents($fileName,$contents);
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    if(isset($_POST["action"]) && isset($_POST["id"]))
    {
        $action=$_POST["action"];
        $targetId=$_POST["id"];

        $OldRecord=getVolunteerById($fileName,$targetId);

        if($OldRecord!=FALSE)
        {
            $Arr=explode("~",$OldRecord);

            if(count($Arr)>6)
            {
                if($action=="approve")
                {
                    $Arr[6]="Approved";
                }

                if($action=="reject")
                {
                    $Arr[6]="Rejected";
                }

                $NewRecord=
                $Arr[0]."~".
                $Arr[1]."~".
                $Arr[2]."~".
                $Arr[3]."~".
                $Arr[4]."~".
                $Arr[5]."~".
                $Arr[6]."\r\n";

                UpdateRecord(
                $fileName,
                $NewRecord,
                $OldRecord);
            }
        }
    }
}

$volunteers=ListAllVolunteers($fileName);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Requests - Al Mesbah Al Modie Foundation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<link rel="stylesheet" href="adminstyle.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container-fluid">
            <span class="navbar-brand mb-0 h1">Volunteer Requests</span>
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
                        <li class="nav-item"><a class="nav-link text-white" href="view-donations.php"><i class="fas fa-dollar-sign me-2"></i>Donations</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="messages.php"><i class="fas fa-envelope me-2"></i>Messages</a></li>
                        <li class="nav-item"><a class="nav-link active text-white" href="volunteer-requests.php"><i class="fas fa-handshake me-2"></i>Volunteers</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="service-feedback.php"><i class="fas fa-star me-2"></i>Feedback</a></li>
                        <li class="nav-item mt-4"><a class="nav-link text-danger" href="admin-dashboard.php?logout=1"><i class="fas fa-sign-out-alt me-2"></i>Logout</a></li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main class="col-md-9 col-lg-10 px-4 py-4">
                <h2 class="mb-4">Submitted Volunteer Requests</h2>

    <table class="table table-bordered table-striped">

        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Date</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>

        <?php

        if(count($volunteers)==0)
        {
            echo "<tr>";
            echo "<td colspan=7>No volunteer requests found</td>";
            echo "</tr>";
        }
        else
        {
            for($i=0;$i<count($volunteers);$i++)
            {
                $v=explode("~",$volunteers[$i]);

                if(count($v)>6)
                {
                    echo "<tr>";

                    echo "<td>".$v[1]."</td>";
                    echo "<td>".$v[2]."</td>";
                    echo "<td>".$v[3]."</td>";
                    echo "<td>".$v[4]."</td>";
                    echo "<td>".$v[5]."</td>";

                    if(trim($v[6])=="Approved")
                    {
                        echo "<td>Approved</td>";
                    }
                    else if(trim($v[6])=="Rejected")
                    {
                        echo "<td>Rejected</td>";
                    }
                    else
                    {
                        echo "<td>Pending</td>";
                    }

                    echo "<td>";

                    if(trim($v[6])=="Pending")
                    {
                        ?>

                        <form method="post"
                        action="volunteer-requests.php">

                            <input type="hidden"
                            name="id"
                            value="<?php echo $v[0]; ?>">

                            <input type="hidden"
                            name="action"
                            value="approve">

                            <input type="submit"
                            value="Approve"
                            class="btn btn-success btn-sm">

                        </form>

                        <form method="post"
                        action="volunteer-requests.php">

                            <input type="hidden"
                            name="id"
                            value="<?php echo $v[0]; ?>">

                            <input type="hidden"
                            name="action"
                            value="reject">

                            <input type="submit"
                            value="Reject"
                            class="btn btn-danger btn-sm">

                        </form>

                        <?php
                    }
                    else
                    {
                        echo "Done";
                    }

                    echo "</td>";
                    echo "</tr>";
                }
            }
        }

        ?>

    </table>

            </main>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>