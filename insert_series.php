<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get form data
$series_name = $_POST["series_name"];
$description = $_POST["description"];
$brand = $_POST["brand_name"];



include "credentials.php";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      


    // Prepare SQL statement to insert data into brands table


    $sql = "INSERT INTO series (series_name, description, brand_name)
    VALUES (" . "\"$series_name\""  . "," . "\"$description\""  . "," . "\"$brand\"" . ")";
    echo $sql;
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
      mysqli_close($conn);

?>
