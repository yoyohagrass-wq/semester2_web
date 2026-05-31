<?php
$Conn = new mysqli("localhost", "root", "", "volunteer_db", 3307);

$UserToSearch = $_REQUEST["name"];

$SQL = "SELECT * FROM volunteers 
        WHERE name LIKE '%$UserToSearch%'";

$Result = $Conn->query($SQL);

while ($Row = $Result->fetch_assoc()) {
    echo "Name: " . $Row["name"] . "<br>";
    echo "Email: " . $Row["email"] . "<br>";
    echo "Phone: " . $Row["phone"] . "<br>";
    echo "Message: " . $Row["message"] . "<br><hr>";
}
?>