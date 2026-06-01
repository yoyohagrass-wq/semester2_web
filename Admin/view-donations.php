<?php
session_start();

if(!isset($_SESSION["admin_logged_in"])){
    header("Location: admin-login.php");
    exit();
}

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

function getTotalDonations(){

    $file = fopen("donations.txt", "r") or die("Unable to open file!");

    $sum = 0;

    while(!feof($file)){

        $line = fgets($file);
        $data = explode("~", $line);

        if(isset($data[2])){
            $sum += (float) trim($data[2]);
        }
    }

    fclose($file);

    return $sum;
}