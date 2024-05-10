<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// SQLite database file path
$db_path = 'pickle.db';

// Get form data
$name = $_POST['name'];
$estYear = $_POST['estYear'];
$country = $_POST['country'];
$ceo = $_POST['ceo'];

try {
    // Connect to the SQLite database
    $db = new mySQL($db_path);

    // Prepare SQL statement to insert data into brands table
    $stmt = $db->prepare("INSERT INTO brands (name, estYear, based, CEO) VALUES (:name, :estYear, :country, :ceo)");

    // Bind parameters
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':estYear', $estYear);
    $stmt->bindParam(':based', $country);
    $stmt->bindParam(':ceo', $ceo);

    // Execute the statement
    $stmt->execute();

    echo "Brand information inserted successfully.";
} catch(Exception $e) {
    // Print error message if something goes wrong
    echo "Error: " . $e->getMessage();
}

// Close the database connection
$db->close();
?>
