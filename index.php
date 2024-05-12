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
<form>
    <form action="select.php" method="post">
    <label for="query">SELECT:</label>
    <input type="text" id="query" name="query"><br><br>
    <input type="submit" value="Submit">
</form>
    
    <h2>Enter Brand Information</h2>

    <form action="insert_brand.php" method="post">
    <label for="name">Name:</label>
    <input type="text" id="name" name="name"><br><br>

    <label for="estYear">Establishment Year:</label>
    <input type="number" id="estYear" name="estYear"><br><br>

    <label for="country">Country:</label>
    <input type="text" id="country" name="country"><br><br>

    <label for="ceo">CEO:</label>
    <input type="text" id="ceo" name="ceo"><br><br>

    <input type="submit" value="Submit">
</form>

    </div>
    <div id="response"></div>
    <script>
        function insertBrand() {
            var formData = new FormData(document.getElementById("brandForm"));
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "insertBrand.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById("response").innerHTML = xhr.responseText;
                        // Clear the form after successful submission if needed
                        document.getElementById("brandForm").reset();
                    } else {
                        console.error('Error:', xhr.status);
                    }
                }
            };
            xhr.send(formData);
        }
    </script>
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
              echo  "tr><td>" . $row["brand_name"] ."</td><td>" . $row["est_year"]. "</td><td>" . $row["country"]. "</td><td>" . $row["CEO"] ."</td></tr>";
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
    <script>
        function insertBrand() {
            var formData = new FormData(document.getElementById("brandForm"));
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "insert_series.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById("series_response").innerHTML = xhr.responseText;
                        // Clear the form after successful submission if needed
                        document.getElementById("brandForm").reset();
                    } else {
                        console.error('Error:', xhr.status);
                    }
                }
            };
            xhr.send(formData);
        }
    </script>
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
              echo  "tr><td>" . $row["id"] ."</td><td>" . $row["series_name"]. "</td><td>" . $row["description"]. "</td><td>" . $row["brand_name"] ."</td></tr>";
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

    <script>
        function insertPaddle() {
            var formData = new FormData(document.getElementById("paddleForm"));
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "insert_paddle.php", true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        document.getElementById("response").innerHTML = xhr.responseText;
                        // Clear the form after successful submission if needed
                        document.getElementById("paddleForm").reset();
                    } else {
                        console.error('Error:', xhr.status);
                    }
                }
            };
            xhr.send(formData);
        }
    </script>
</body>
</html>
