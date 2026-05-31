<?php
$Conn = new mysqli("localhost", "root", "", "volunteer_db", 3307);

$UserToSearch = $_REQUEST["name"];

$SQL = "SELECT * FROM volunteers 
        WHERE FullName LIKE '%$UserToSearch%'";

$Result = $Conn->query($SQL);

while ($Row = $Result->fetch_assoc()) {
    echo "Name: " . $Row["FullName"] . "<br>";
    echo "Email: " . $Row["Email"] . "<br>";
    echo "Phone: " . $Row["PhoneNumber"] . "<br>";
    echo "Message: " . $Row["Message"] . "<br><hr>";
}
?>