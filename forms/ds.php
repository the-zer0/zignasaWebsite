<?php
// Database connection details
include "connection.php";

try {
    // Establish a database connection using PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare SQL statement to insert data into 17 fields
    $sql = "INSERT INTO ds (team_name, team_lead_name, team_lead_clg, team_lead_email, team_lead_phone, team_member2_name, team_member2_clg, team_member2_phone, team_member3_name, team_member3_clg, team_member3_phone, team_member4_name,team_member4_clg, team_member4_phone, team_member5_name, team_member5_clg, team_member5_phone) 
            VALUES (:team_name, :team_lead_name, :team_lead_clg, :team_lead_email, :team_lead_phone, :team_member2_name, :team_member2_clg, :team_member2_phone, :team_member3_name, :team_member3_clg, :team_member3_phone, :team_member4_name, :team_member4_clg, :team_member4_phone, :team_member5_name, :team_member5_clg, :team_member5_phone)";

    // Prepare the statement
    $stmt = $pdo->prepare($sql);

    // Bind parameters (replace $_POST['fieldX'] with actual values from your form or variables)
    $stmt->bindParam(':team_name', $_POST['team_name']);
    $stmt->bindParam(':team_lead_name', $_POST['team_lead_name']);
    $stmt->bindParam(':team_lead_clg', $_POST['team_lead_clg']);
    $stmt->bindParam(':team_lead_email', $_POST['team_lead_email']);
    $stmt->bindParam(':team_lead_phone', $_POST['team_lead_phone']);
    $stmt->bindParam(':team_member2_name', $_POST['team_member2_name']);
    $stmt->bindParam(':team_member2_clg', $_POST['team_member2_clg']);
    $stmt->bindParam(':team_member2_phone', $_POST['team_member2_phone']);
    $stmt->bindParam(':team_member3_name', $_POST['team_member3_name']);
    $stmt->bindParam(':team_member3_clg', $_POST['team_member3_clg']);
    $stmt->bindParam(':team_member3_phone', $_POST['team_member3_phone']);
    $stmt->bindParam(':team_member4_name', $_POST['team_member4_name']);
    $stmt->bindParam(':team_member4_clg', $_POST['team_member4_clg']);
    $stmt->bindParam(':team_member4_phone', $_POST['team_member4_phone']);
    $stmt->bindParam(':team_member5_name', $_POST['team_member5_name']);
    $stmt->bindParam(':team_member5_clg', $_POST['team_member5_clg']);
    $stmt->bindParam(':team_member5_phone', $_POST['team_member5_phone']);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to Google on successful insertion
        header("Location: https://www.google.com");
        exit();
    } else {
        echo "Failed to insert data.";
    }

} catch (PDOException $e) {
    // Display error message if there's an issue with the connection or query
    echo "Database error: " . $e->getMessage();
}
?>
