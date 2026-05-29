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
<html>
<head>
    <title>User Management</title>
</head>
<body>

<h2>Users List</h2>

<table border="1" cellpadding="10">

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
                <a href="?delete=<?php echo $i; ?>">Delete</a>
            </td>
        </tr>

    <?php } ?>

</table>

</body>
</html>