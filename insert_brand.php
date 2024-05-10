<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get form data
$name = $_POST['name'];
$estYear = $_POST['estYear'];
$country = $_POST['country'];
$ceo = $_POST['ceo'];


    // Connect to the SQLite database
    $servername = "localhost:3306";
    $username = "juliansp";
    $password = "julian012803";
    $dbname = "mS224DB_juliansp";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }


    // Prepare SQL statement to insert data into brands table


    $sql = "INSERT INTO brands (name, est_year, country, CEO)
    VALUES (" + $name + "," + $estYear + "," + $country + "," + $ceo +")";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

?>
