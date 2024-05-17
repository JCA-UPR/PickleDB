<?php
// Get form data
$total_score = isset($_POST["tscore"]) ? $_POST["tscore"] : "";
$description = $_POST["description"];
$league_id = $_POST["league_id"];
$team_leader_id = $_POST["team_leader_id"];
$tname = $_POST["tname"];

include "credentials.php";
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
