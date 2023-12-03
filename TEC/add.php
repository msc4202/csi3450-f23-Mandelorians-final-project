<?php
$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'TEC';

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Check if add query exists
if (isset($_POST['submit'])) {
    $openingID = $_POST['openingID'];
    $companyID = $_POST['companyID'];
    $numPositions = $_POST['numPositions'];
    $startDate = $_POST['startDate'];
    $endDate = $_POST['endDate'] ? $_POST['endDate'] : NULL;
    $hourlyPay = $_POST['hourlyPay'];

    //Insert query is set up to check to see if the end date is null. If it is NULL is input as the value.
    $insertQuery = "INSERT INTO OPENING VALUES ('$openingID', '$companyID', '$numPositions', '$startDate', ";

    if ($endDate === NULL) {
        $insertQuery .= "NULL, ";
    } else {
        $insertQuery .= "'$endDate', ";
    }

    $insertQuery .= "'$hourlyPay')";

    $insertResult = mysqli_query($conn, $insertQuery);

    if ($insertResult) {
        echo "<p>New opening has been added successfully.</p>";
    } else {
        echo "<p>Error adding the opening: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Opening</title>
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
    <a href="delete.php">Delete</a>
    <a href="update.php">Update</a>
    <a href="search.php">Search</a>

    <h3>Add a New Opening</h3>
    <form action="add.php" method="POST">
        <label for="companyID">Opening ID:</label>
        <input type="text" id="openingID" name="openingID" placeholder="Enter Opening ID"><br>

        <label for="companyID">Company ID:</label>
        <input type="text" id="companyID" name="companyID" placeholder="Enter Company ID"><br>

        <label for="numPositions">Number of Positions:</label>
        <input type="text" id="numPositions" name="numPositions" placeholder="Enter Number of Positions"><br>

        <label for="startDate">Start Date:</label>
        <input type="text" id="startDate" name="startDate" placeholder="Enter Start Date"><br>

        <label for="endDate">End Date:</label>
        <input type="text" id="endDate" name="endDate" placeholder="Enter End Date."><br>

        <label for="hourlyPay">Hourly Pay:</label>
        <input type="text" id="hourlyPay" name="hourlyPay" placeholder="Enter Hourly Pay"><br>

        <input type="submit" name="submit" value="Submit">
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
