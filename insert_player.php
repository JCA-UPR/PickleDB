<?php
// Get form data
$name = $_POST["name"];
$ducpr = isset($_POST["ducpr"]) ? $_POST["ducpr"] : "";
$country = $_POST['country'];
$main_paddle = $_POST["main_paddle"];
$team_id = $_POST["league_id"];

// Connect to the database
$servername = "localhost:3306";
$username = "juliansp";
$password = "julian012803";
$dbname = "S224DB_juliansp";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Prepare SQL statement to insert data into players table
$sql = "INSERT INTO players (name, DUCPR, country, main_paddle, team_id)
VALUES ('$name', $ducpr, '$country', $main_paddle, $team_id)";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);

?>
