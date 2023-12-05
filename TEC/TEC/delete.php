<?php
$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'TEC';

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Check if delete query exists
if (isset($_POST['delete'])) {
    $openingID = $_POST['openingID'];

    if (!is_numeric($openingID)) {
        echo "<p>Please input a valid ID.</p>";
    } else {
        $checkQuery = "SELECT * FROM OPENING WHERE OPENING_ID = '$openingID'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) === 0) {
            echo "<p>Record with ID $openingID doesn't exist.</p>";
        } else {
            $deleteQuery = "DELETE FROM OPENING WHERE OPENING_ID = '$openingID'";
            $deleteResult = mysqli_query($conn, $deleteQuery);

            if ($deleteResult) {
                echo "<p>Record with ID $openingID has been deleted.</p>";
            } else {
                echo "<p>Error deleting the record: " . mysqli_error($conn) . "</p>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Opening</title>
    <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }
    th, td {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }
    th {
      background-color: #f2f2f2;
    }
    </style>
</head>
<body>

<div>
    <a href="dashboard.php">Dashboard</a>
    <a href="add.php">Add</a>
    <a href="update.php">Update</a>
    <a href="search.php">Search</a>

    <form action="delete.php" method="POST">
        <input type="text" name="openingID" placeholder="Enter Opening ID">
        <input type="submit" name="delete" value="Delete">
    </form>
</div>

<table>
    <thead>
    <tr>
        <th>Opening ID</th>
        <th>Company ID</th>
        <th>Number of Positions</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Hourly Pay</th>
    </tr>
    </thead>
    <tbody>
    <?php
    // Fetch and display existing records
    $query = "SELECT * FROM OPENING";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>{$row['OPENING_ID']}</td>";
        echo "<td>{$row['COMPANY_ID']}</td>";
        echo "<td>{$row['NUM_OF_POSITIONS']}</td>";
        echo "<td>{$row['START_DT']}</td>";
        echo "<td>{$row['END_DT']}</td>";
        echo "<td>{$row['HOURLY_PAY']}</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

</body>
</html>
