<?php
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

$sql = "SELECT" . $_POST ["query"];
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    foreach ($row as $value){
        echo $value . "<br>";
    }
  }
} else {
  echo "0 results";
}

mysqli_close($conn);
?>