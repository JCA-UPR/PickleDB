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
        // Open SQLite database connection
        $db = new SQLite3('pickle.db');

        // Query to select all rows from 'brands' table
        $query = "SELECT * FROM brands";

        // Execute the query
        $result = $db->query($query);

        // Loop through the results and display each row
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['estYear'] . "</td>";
            echo "<td>" . $row['based'] . "</td>";
            echo "<td>" . $row['CEO'] . "</td>";
            echo "</tr>";
        }

        // Close database connection
        $db->close();
        ?>
    </table>
    </div>
</body>
</html>
