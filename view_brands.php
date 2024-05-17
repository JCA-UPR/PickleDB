<?php
include "credentials.php";
 
 // Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);
 // Check connection
 if (!$conn) {
     die("Connection failed: " . mysqli_connect_error());
   }
   
 
 $sql = "SELECT * FROM brands";
 $result = mysqli_query($conn, $sql);
 
 if (mysqli_num_rows($result) > 0) {
     // output data of each row
     echo "<table>";
     echo "<tr><th>Name</th><th>Established Year</th><th>Country</th><th>CEO</th></tr>";
     while($row = mysqli_fetch_assoc($result)) {
       echo  "tr><td>" . $row["brand_name"] ."</td><td>" . $row["est_year"]. "</td><td>" . $row["country"]. "</td><td>" . $row["CEO"] ."</td></tr>";
     }
     echo "</table>";
   } else {
     echo "0 results";
   }
 mysqli_close($conn);

 ?>