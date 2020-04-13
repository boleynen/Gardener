<?php

$servername     = "localhost";
$dbUsername     = "root";
$dbPassword     = "root";
$dbName         = "gardener";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

?>