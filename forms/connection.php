<?php
$host = 'localhost';       // Host name
$dbname = 'zignasa2k24';  // Database name
$username = 'root';// Database username
$password = '';// Database password

try {
    // Create a PDO instance (connect to the database)
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);

    // Set error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo "Connected to the database successfully!";
} catch (PDOException $e) {
    // Display error message if connection fails
    echo "Database connection failed: " . $e->getMessage();
}
?>
