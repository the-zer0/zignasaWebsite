<?php
session_start();

// Hardcoded credentials for demonstration (replace with database check in a real app)
$valid_username = "nunnu";
$valid_password = "~Legr@nd~";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check credentials
    if ($username === $valid_username && $password === $valid_password) {
        $_SESSION['loggedin'] = true;
        header("Location: adminHome.php"); // Redirect to the protected page
        exit();
    } else {
        echo "<p>Invalid username or password. Please try again.</p>";
    }
}
?>
