<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get form data
$name = $_POST["name"];
$estYear = $_POST['est_date'];
$country = $_POST["based_country"];
$ceo = $_POST["ceo"];


include "credentials.php";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
    // Prepare SQL statement to insert data into brands table


    $sql = "INSERT INTO brands (brand_name, est_year, country, CEO)
    VALUES (" . "\"$name\""  . "," . $estYear  . "," . "\"$country\"" . "," . "\"$ceo\"" . ")";
    echo $sql;
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
      mysqli_close($conn);

?>
