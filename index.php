<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Pickle DB</title>
    <link rel="stylesheet" href="css/styles.css">

</head>
<body>
    <div>
    <div>
    <h2>Enter Brand Information</h2>

    <form action="insert_brand.php" method="post">

    <label for="name">Name:</label>
    <input type="text" id="name" name="name"><br><br>

    <label for="est_date">Established Date:</label>
    <input type="number" id="est_date" name="est_date"><br><br>

    <label for="based_country">Country:</label>
    <input type="text" id="based_country" name="based_country"><br><br>

    <label for="ceo">CEO:</label>
    <input type="text" id="ceo" name="ceo"><br><br>

    <input type="submit" value="Submit">

    <div>
    <h2>Brands Table</h2>
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
        
        
        $sql = "SELECT * FROM brands";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo "<table>";
            echo "<tr><th>Name</th><th>Established Year</th><th>Country</th><th>CEO</th></tr>";
            while($row = mysqli_fetch_assoc($result)) {
            echo  "<tr><td>" . $row["brand_name"] ."</td><td>" . $row["est_year"]. "</td><td>" . $row["country"]. "</td><td>" . $row["CEO"] ."</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        mysqli_close($conn);

    ?>
    </table>
    </div>
        </div>
        <div>
    <div>
    <h2>Enter Series Information</h2>

    <form action="insert_series.php" method="post">
    <label for="series_name">Name:</label>
    <input type="text" id="series_name" name="series_name"><br><br>

    <label for="description">Description:</label>
    <input type="text" id="description" name="description"><br><br>

    <label for="brand_name">Brand:</label>
    <input type="text" id="brand_name" name="brand_name"><br><br>

    <input type="submit" value="Submit">
</form>

    </div>
    <div id="series_response"></div>

    <div>
    <h2>Series Table</h2>
    
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
          
        
        $sql = "SELECT * FROM series";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo "<table>";
            echo "<tr><th>ID</th><th>Series Name</th><th>Description</th><th>Brand</th></tr>";
            while($row = mysqli_fetch_assoc($result)) {
              echo  "<tr><td>" . $row["id"] ."</td><td>" . $row["series_name"]. "</td><td>" . $row["description"]. "</td><td>" . $row["brand_name"] ."</td></tr>";
            }
            echo "</table>";
          } else {
            echo "0 results";
          }
        mysqli_close($conn);
    
        ?>
    </table>
    <div>
        <h2>Enter Paddle Information</h2>
        <form id="paddleForm" action="insert_paddle.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br><br>

            <label for="series_id">Series ID:</label>
            <input type="number" id="series_id" name="series_id"><br><br>

            <label for="retail_price">Retail Price:</label>
            <input type="number" step="0.01" id="retail_price" name="retail_price"><br><br>

            <label for="shape">Shape:</label>
            <input type="text" id="shape" name="shape"><br><br>

            <label for="thickness">Thickness:</label>
            <input type="number" id="thickness" name="thickness"><br><br>

            <label for="core">Core:</label>
            <input type="text" id="core" name="core"><br><br>

            <label for="face_material_id">Face Material ID:</label>
            <input type="number" id="face_material_id" name="face_material_id"><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>
    <div id="response"></div>

    <div>
        <h2>Paddle Table</h2>
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
        
        $sql = "SELECT * FROM paddle";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo "<table>";
            echo "<tr><th>Name</th><th>Series ID</th><th>Retail Price</th><th>Shape</th><th>Thickness</th><th>Core</th><th>Face Material ID</th></tr>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["name"] . "</td><td>" . $row["series_id"] . "</td><td>" . $row["retail_price"] . "</td><td>" . $row["shape"] . "</td><td>" . $row["thickness"] . "</td><td>" . $row["core"] . "</td><td>" . $row["face_material_id"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        mysqli_close($conn);
        ?>
    </div>  



    <!--  League info entry -->
    <div>
        <h2>Enter League Information</h2>
        <form id="leagueForm" action="insert_league.php" method="post">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br><br>

            <label for="league_description">Description:</label>
            <input type="text" id="league_description" name="league_description"><br><br>

            <label for="Country">Country:</label>
            <input type="text" id="Country" name="Country"><br><br>

            <label for="Leader">Leader:</label>
            <input type="text" id="leader" name="leader"><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <div id="response"></div>
    
    <!-- Visualize League table -->
    <div>
        <h2>League Table</h2>
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
        
        $sql = "SELECT * FROM league";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo "<table>";
            echo "<tr><th>Name</th><th>Description</th><th>Country</th><th>Leader</th>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["description"] . "</td><td>" . $row["country"];
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        mysqli_close($conn);
        ?>
    </div>  


    <!-- Materials info entry -->
 
    <div>
        <h2>Enter Material Information</h2>
        <form id="materialForm" action="insert_material.php" method="post">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br><br>

            <label for="distibuiter_id">Distribuiter ID:</label>
            <input type="text" id="distibuiter_id" name="distibuiter_id"><br><br>

            <label for="Quality">Quality:</label>
            <input type="text" id="Quality" name="Quality"><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <div id="response"></div>
    
    <!-- Visualize Material table -->
    <div>
        <h2>Material Table</h2>
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
        
        $sql = "SELECT * FROM materials";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Distribuiter ID</th><th>Quality</th>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["distribuiter_id"] . "</td><td>" . $row["quality"];
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        mysqli_close($conn);
        ?>
    </div> 

    <!-- material_distributor -->
 
    <div>
        <h2>Enter Material Distributor Information</h2>
        <form id="material_distributorForm" action="insert_material_distributor.php" method="post">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br><br>

            <label for="country">Country:</label>
            <input type="text" id="country" name="country"><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <div id="response"></div>
    
    <!-- Visualize Material Distributor table -->
    <div>
        <h2>Material Distributor Table</h2>
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
        
        $sql = "SELECT * FROM material_dist";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>Country</th>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["country"];
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        mysqli_close($conn);
        ?>
    </div> 

    <!-- PLAYERS -->
    <div>
        <h2>Enter Player Information</h2>
        <form id="playerForm" action="insert_player.php" method="post">

            <label for="name">Name:</label>
            <input type="text" id="name" name="name"><br><br>

            <label for="ducpr">DUCPR:</label>
            <input type="number" id="ducpr" name="ducpr"><br><br>

            <label for="country">Country:</label>
            <input type="text" id="country" name="country"><br><br>

            <label for="main_paddle">Main Paddle:</label>
            <input type="number" id="main_paddle" name="main_paddle"><br><br>

            <label for="league_id">League ID:</label>
            <input type="number" id="league_id" name="league_id"><br><br>
            
            <input type="submit" value="Submit">
        </form>
    </div>

    <div id="response"></div>
    
    <!-- Visualize Player table -->
    <div>
        <h2>Player Table</h2>
        <?php
        $servername =   "localhost:3306";
        $username =     "juliansp";
        $password =     "julian012803";
        $dbname =       "S224DB_juliansp";
        
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM players";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th><th>DCUPR</th><th>Country</th><th>Main Paddle</th><th>League ID</th>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["DUCPR"] . "</td><td>" . $row["country"] . "</td><td>" . $row["main_paddle"] . "</td><td>" . $row["league_id"] ;
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        mysqli_close($conn);
        ?>
    </div>  

    <!-- TEAMS -->

    <div>
        <h2>Enter Team Information</h2>
        <form id="teamForm" action="insert_team.php" method="post">

            <label for="tscore">Total Score:</label>
            <input type="number" id="tscore" name="tscore"><br><br>

            <label for="description">Description:</label>
            <input type="text" id="description" name="description"><br><br>

            <label for="league_id">League ID:</label>
            <input type="number" id="league_id" name="league_id"><br><br>

            <label for="team_leader_id">Team Leader ID:</label>
            <input type="number" id="team_leader_id" name="team_leader_id"><br><br>

            <label for="tname">Name:</label>
            <input type="text" id="tname" name="tname"><br><br>
            
            <input type="submit" value="Submit">
        </form>
    </div>

    <div id="response"></div>
    
    <!-- Visualize Team table -->
    <div>
        <h2>Team Table</h2>
        <?php
        $servername =   "localhost:3306";
        $username =     "juliansp";
        $password =     "julian012803";
        $dbname =       "S224DB_juliansp";
        
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        
        $sql = "SELECT * FROM team";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            echo "<table>";
            echo "<tr><th>ID</th><th>Total Score</th><th>Description</th><th>League ID</th><th>Team Leader ID</th><th>Team Name</th>";
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["total_score"] . "</td><td>" . $row["description"] . "</td><td>" . $row["league_id"] . "</td><td>" . $row["team_leader_id"] . "</td><td>" . $row["team_name"];
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        mysqli_close($conn);
        ?>
    </div>  

</body>
</html>
