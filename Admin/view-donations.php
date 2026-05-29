<?php


function ListAllDonations(){

    $allDonations=array();

    $fileHandler=fopen("donations.txt","r");

    while(!feof($fileHandler)){

        $line=fgets($fileHandler);

        if(trim($line)!=""){

            $data=explode("~",$line);

            $donation=array(
                "name"=>$data[0],
                "email"=>$data[1],
                "amount"=>$data[2],
                "message"=>$data[3]
            );

            $allDonations[]=$donation;
        }
    }

    fclose($fileHandler);

    return $allDonations;
}

if(isset($_GET["delete"])){

    $deleteIndex=$_GET["delete"];

    $lines=file("donations.txt");

    unset($lines[$deleteIndex]);

    file_put_contents("donations.txt",implode("",$lines));

    header("Location: ".$_SERVER['PHP_SELF']);

    exit();
}

$AllDonations=ListAllDonations();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Donations</title>
</head>
<body>

<h2>All Donations</h2>

<table border="1" cellpadding="10">

    <tr>
        <th>Name</th>
        <th>Email</th>
        <th>Amount</th>
        <th>Message</th>
        <th>Delete</th>
    </tr>

    <?php for($i=0;$i<count($AllDonations);$i++){ ?>

        <tr>

            <td>
                <?php echo $AllDonations[$i]["name"]; ?>
            </td>

            <td>
                <?php echo $AllDonations[$i]["email"]; ?>
            </td>

            <td>
                <?php echo $AllDonations[$i]["amount"]; ?>
            </td>

            <td>
                <?php echo $AllDonations[$i]["message"]; ?>
            </td>

            <td>

                <a href="?delete=<?php echo $i; ?>">
                    Delete
                </a>

            </td>

        </tr>

    <?php } ?>

</table>

</body>
</html>