<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $servername = "localhost:3306";
    $username = "juliansp";
    $password = "julian012803";
    $dbname = "S224DB_juliansp";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE"  . $_POST ["update_query"];

if (mysqli_query($conn, $sql)) {
  echo "Record updated successfully";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
}
?>