<?php
// Get form data
$total_score = isset($_POST["tscore"]) ? $_POST["tscore"] : "";
$description = $_POST["description"];
$league_id = $_POST["league_id"];
$team_leader_id = $_POST["team_leader_id"];
$tname = $_POST["tname"];

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
$sql = "INSERT INTO team (total_score, description, league_id, team_leader_id, team_name)
VALUES (" . $total_score  . "," . "\"$description\""  . "," . $league_id . "," . $team_leader_id . "," . "\"$tname\"" . ")";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
// -- VALUES ($total_score, $description, $league_id, $team_leader_id, $tname)";
// Close connection
mysqli_close($conn);

?>
