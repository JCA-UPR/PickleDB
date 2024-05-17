<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include "credentials.php";

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
  while ($row = mysqli_fetch_assoc($result)) {
    // Loop through each row
    foreach ($row as $key => $value) {
        // Print attribute name and value
        echo $key . ": " . $value . "<br>";
    }
    echo "<br>"; // Add a line break after each row
}
  echo "</table>";
} else {
  echo "0 results";
}

mysqli_close($conn);
}
?>