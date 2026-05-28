<?php
session_start();

if (!isset($_SESSION["admin_logged_in"]))
{
    header("Location: admin-login.php");
    exit();
}

$fileName = "services-data.txt";
$message = "";

function ListAllServices($fileName)
{
    $Result=array();

    if (!file_exists($fileName))
    {
        return $Result;
    }

    $myfile = fopen($fileName, "r");

    $i=0;

    while(!feof($myfile))
    {
        $line = fgets($myfile);

        if($line!="")
        {
            $Result[$i]=$line;
            $i++;
        }
    }

    fclose($myfile);

    return $Result;
}

function getLastId($fileName,$Separator)
{
    if (!file_exists($fileName))
    {
        return 0;
    }

    $myfile = fopen($fileName,"r");
    $LastId=0;

    while(!feof($myfile))
    {
        $line=fgets($myfile);
        $ArrayLine=explode($Separator,$line);

        if($ArrayLine[0]!="")
        {
            $LastId=$ArrayLine[0];
        }
    }

    fclose($myfile);

    return $LastId;
}

function getServiceById($fileName,$id)
{
    $myfile=fopen($fileName,"r");

    while(!feof($myfile))
    {
        $line=fgets($myfile);
        $ArrayLine=explode("~",$line);

        if($ArrayLine[0]==$id)
        {
            fclose($myfile);
            return $line;
        }
    }

    fclose($myfile);
    return FALSE;
}

function StoreRecord($fileName,$record)
{
    $myfile=fopen($fileName,"a+");
    fwrite($myfile,$record."\r\n");
    fclose($myfile);
}

function DeleteRecord($fileName,$record)
{
    $contents=file_get_contents($fileName);
    $contents=str_replace($record,'',$contents);
    file_put_contents($fileName,$contents);
}

function UpdateRecord($fileName,$NewRecord,$OldRecord)
{
    $contents=file_get_contents($fileName);
    $contents=str_replace($OldRecord,$NewRecord,$contents);
    file_put_contents($fileName,$contents);
}

if(isset($_GET["selected"]))
{
    $selectedId=$_GET["selected"];
}
else
{
    $selectedId=0;
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $action=$_POST["action"];
    $name=trim($_POST["serviceName"]);
    $desc=trim($_POST["serviceDesc"]);
    $selectedId=$_POST["selected_id"];

    if($action=="add")
    {
        $id=getLastId($fileName,"~")+1;
        $record=$id."~".$name."~".$desc;

        StoreRecord($fileName,$record);

        $message="Service Added";
    }

    if($action=="edit")
    {
        $OldRecord=getServiceById($fileName,$selectedId);
        $NewRecord=$selectedId."~".$name."~".$desc."\r\n";

        UpdateRecord($fileName,$NewRecord,$OldRecord);

        $message="Service Updated";
    }

    if($action=="delete")
    {
        $record=getServiceById($fileName,$selectedId);

        DeleteRecord($fileName,$record);

        $message="Service Deleted";

        $selectedId=0;
    }
}

$SelectedName="";
$SelectedDesc="";

if($selectedId!=0)
{
    $SelectedRecord=getServiceById($fileName,$selectedId);

    if($SelectedRecord!=FALSE)
    {
        $Arr=explode("~",$SelectedRecord);

        $SelectedName=trim($Arr[1]);
        $SelectedDesc=trim($Arr[2]);
    }
}

$AllServices=ListAllServices($fileName);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Services</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-4">

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
                <a href=manage-services.php?selected=".$Row[0].">
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

    <form method="post" action="manage-services.php">

        <input type="hidden" name="selected_id" value="<?php echo $selectedId; ?>">

        Service Name<br>
        <input type="text" name="serviceName"
        class="form-control"
        value="<?php echo $SelectedName; ?>">
        <br>

        Description<br>
        <textarea
        name="serviceDesc"
        class="form-control"><?php echo $SelectedDesc; ?></textarea>
        <br>

        <input type="submit"
        name="action"
        value="add"
        class="btn btn-success">

        <input type="submit"
        name="action"
        value="edit"
        class="btn btn-primary">

    </form>

</div>

</body>
</html>