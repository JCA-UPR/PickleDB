<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get form data
$name = $_POST["name"];
$distribuiterID = $_POST['distribuiterID'];
$quality = $_POST["quality"];

    // Connect to the SQLite database
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

    // Prepare SQL statement to insert data into brands table
    $sql = "INSERT INTO materials (name, distribuiter_id, quality, id)
    VALUES (" . "\"$name\""  . "," . $distribuiterID  . "," . "\"$quality\"" . "," . "\"$ceo\"" . ")";
    echo $sql;
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
?>
