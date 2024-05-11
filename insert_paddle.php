<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Get form data
$name = $_POST["name"];
$series_id = $_POST["series_id"];
$retail_price = $_POST["retail_price"];
$shape = $_POST["shape"];
$thickness = $_POST["thickness"];
$core = $_POST["core"];
$face_material_id = $_POST["face_material_id"];

// Connect to the MySQL database
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

// Prepare SQL statement to insert data into paddle table
$sql = "INSERT INTO paddle (name, series_id, retail_price, shape, thickness, core, face_material_id)
VALUES ('$name', $series_id, $retail_price, '$shape', $thickness, '$core', $face_material_id)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>