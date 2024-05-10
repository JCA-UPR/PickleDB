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
    <table>
        <tr>
            
            <th>Name</th>
            <th>Established Year</th>
            <th>Country Initials</th>
            <th>CEO</th>
        </tr>
        <?php
        $servername = "localhost:3306";
        $username = "juliansp";
        $password = "julian012803";
        $dbname = "mS224DB_juliansp";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        
        $sql = "SELECT * FROM brands";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            echo "name: " . $row["name"]. " - established year: " . $row["est_year"]. "  country: " . $row["country"]. " CEO:". $row["CEO"] . "<br>";
          }
        } else {
          echo "0 results";
        }
        $conn->close();
    
        ?>
    </table>
    </div>
</body>
</html>
