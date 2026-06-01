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
                "message"=>$data[3]
            );

            $allFeedbacks[]=$feedback;
        }
    }

    fclose($fileHandler);

    return $allFeedbacks;
}

if(isset($_GET["delete"])){

    $deleteIndex=$_GET["delete"];

    $lines=file("feedback.txt");

    unset($lines[$deleteIndex]);

    file_put_contents("feedback.txt",implode("",$lines));

    header("Location: ".$_SERVER['PHP_SELF']);

    exit();
}

$AllFeedbacks=ListAllFeedBacks();

?>