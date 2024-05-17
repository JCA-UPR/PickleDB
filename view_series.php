<?php
include "credentials.php";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        

    $sql = "SELECT * FROM series";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        echo "<table>";
        echo "<tr><th>ID</th><th>Series Name</th><th>Description</th><th>Brand</th></tr>";
        while($row = mysqli_fetch_assoc($result)) {
            echo  "tr><td>" . $row["id"] ."</td><td>" . $row["series_name"]. "</td><td>" . $row["description"]. "</td><td>" . $row["brand_name"] ."</td></tr>";
        }
        echo "</table>";
        } else {
        echo "0 results";
        }
    mysqli_close($conn);
    
?>