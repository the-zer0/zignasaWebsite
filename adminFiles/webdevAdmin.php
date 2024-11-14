<?php
// Connect to the database using PDO in connection.php
include "connection.php";
session_start();

// Check if the user is logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.html");
    exit();
}

// Fetch all recorwebdev from 'webdev' table
$sql = "SELECT * FROM webdev";
$result = $pdo->prepare($sql);
$result->execute();
$rows = $result->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Team Information</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .btn {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 4px;
        }
        .btn-yes {
            background-color: #4CAF50;
            color: white;
        }
        .btn-no {
            background-color: #f44336;
            color: white;
        }
        #searchInput {
            margin-bottom: 20px;
            padding: 8px;
            width: 100%;
        }
    </style>
    <script>
        function searchTable() {
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("searchInput");
            filter = input.value.toLowerCase();
            table = document.getElementById("teamTable");
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                tr[i].style.display = "none"; // Hide all rows initially
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    if (td[j]) {
                        txtValue = td[j].textContent || td[j].innerText;
                        if (txtValue.toLowerCase().indexOf(filter) > -1) {
                            tr[i].style.display = ""; // Show matching rows
                            break;
                        }
                    }
                }
            }
        }
    </script>
</head>
<body>

<h2>Team Information</h2>

<!-- Search Input -->
<input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search for teams..">

<!-- Table of team information -->
<table id="teamTable">
    <tr>
        <th>S.No</th>
        <th>Team Name</th>
        <th>Team Lead Name</th>
        <th>Team Lead College</th>
        <th>Team Lead Email</th>
        <th>Team Lead Phone No.</th>
        <th>Team Member 2 Name</th>
        <th>Team Member 2 College</th>
        <th>Team Member 2 Phone No.</th>
        <th>Team Member 3 Name</th>
        <th>Team Member 3 College</th>
        <th>Team Member 3 Phone No.</th>
        <th>Team Member 4 Name</th>
        <th>Team Member 4 College</th>
        <th>Team Member 4 Phone No.</th>
        <th>Team Member 5 Name</th>
        <th>Team Member 5 College</th>
        <th>Team Member 5 Phone No.</th>
        <th>Yes</th>
        <th>No</th>
    </tr>

    <?php
    if (count($rows) > 0) {
        $serial_no = 1; // Initialize serial number
        foreach ($rows as $row) {
            echo "<tr>";
            echo "<td>" . $serial_no++ . "</td>";
            echo "<td>" . htmlspecialchars($row['team_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team_lead_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team_lead_clg']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team_lead_email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team_lead_phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team_member2_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team_member2_clg']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team_member2_phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team_member3_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team_member3_clg']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team_member3_phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team_member4_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team_member4_clg']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team_member4_phone']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team_member5_name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team_member5_clg']) . "</td>";
            echo "<td>" . htmlspecialchars($row['team_member5_phone']) . "</td>";

            // YES button to move record to another table
            echo "<td><form method='POST' action=''>
                    <input type='hidden' name='team_name' value='" . htmlspecialchars($row['team_name']) . "'>
                    <button type='submit' name='moveRecord' class='btn btn-yes'>Yes</button>
                  </form></td>";

            // NO button to delete record
            echo "<td><form method='POST' action=''>
                    <input type='hidden' name='team_name' value='" . htmlspecialchars($row['team_name']) . "'>
                    <button type='submit' name='deleteRecord' class='btn btn-no'>No</button>
                  </form></td>";

            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='20'>No recorwebdev found</td></tr>";
    }
    ?>
</table>

<?php
// Handling 'NO' button - Delete Record
if (isset($_POST['deleteRecord'])) {
    $team_name = $_POST['team_name'];
    $delete_sql = "DELETE FROM webdev WHERE team_name = :team_name";
    $stmt = $pdo->prepare($delete_sql);
    $stmt->bindParam(':team_name', $team_name);

    if ($stmt->execute()) {
        echo "<script>alert('Record deleted successfully');window.location.reload();</script>";
    } else {
        echo "Error deleting record.";
    }
}

// Handling 'YES' button - Move Record to another table
if (isset($_POST['moveRecord'])) {
    $team_name = $_POST['team_name'];

    // Move record to 'final_webdev' table
    $move_sql = "INSERT INTO final_webdev SELECT * FROM webdev WHERE team_name = :team_name";
    $delete_sql = "DELETE FROM webdev WHERE team_name = :team_name"; // Delete from original table

    $stmt_move = $pdo->prepare($move_sql);
    $stmt_delete = $pdo->prepare($delete_sql);
    $stmt_move->bindParam(':team_name', $team_name);
    $stmt_delete->bindParam(':team_name', $team_name);

    if ($stmt_move->execute() && $stmt_delete->execute()) {
        echo "<script>alert('Record moved successfully');window.location.reload();</script>";
    } else {
        echo "Error moving record.";
    }
}
?>

</body>
</html>
