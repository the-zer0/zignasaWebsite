<?php
include 'connection.php'; // Ensure connection.php properly initializes $pdo as a PDO object

// Lists of tables to get counts from, separated by headings
$tablesGroup2 = ['final_ds', 'final_mern', 'final_webdev'];
$tablesGroup1 = ['ds', 'mern', 'webdev'];

// Initialize arrays to hold counts for each group
$tableCountsGroup1 = [];
$tableCountsGroup2 = [];

// Function to fetch counts for a given table list
function fetchTableCounts($pdo, $tables) {
    $tableCounts = [];
    foreach ($tables as $table) {
        $sql = "SELECT COUNT(*) AS count FROM $table";
        $stmt = $pdo->query($sql);

        if ($stmt) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $tableCounts[$table] = $row['count'];
        } else {
            $tableCounts[$table] = "Error fetching count"; // Error handling
        }
    }
    return $tableCounts;
}

// Get counts for each group of tables
$tableCountsGroup1 = fetchTableCounts($pdo, $tablesGroup1);
$tableCountsGroup2 = fetchTableCounts($pdo, $tablesGroup2);
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Zignasa 2K24</title>
    <style>
        /* Basic button styling */
        .button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50; /* Green */
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #45a049; /* Darker green on hover */
        }
    </style>
</head>
<body>
<h2>Number of Teams(Payment Not Verified)</h2>
    <ul>
        <?php foreach ($tableCountsGroup1 as $table => $count): ?>
            <li><?php echo ucfirst($table) . ": " . $count; ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Number of Teams(Payment Verified)</h2>
    <ul>
        <?php foreach ($tableCountsGroup2 as $table => $count): ?>
            <li><?php echo ucfirst($table) . ": " . $count; ?></li>
        <?php endforeach; ?>
    </ul>
    <h2>Choose an Option</h2>

    <a href="dsAdmin.php" class="button">DS Admin</a>
    <a href="mernAdmin.php" class="button">MERN Admin</a>
    <a href="webdevAdmin.php" class="button">Web Dev Admin</a>

</body>
</html>
