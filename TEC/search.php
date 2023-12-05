<?php
$dbServername = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'TEC';

$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Openings</title>
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
  <a href="update.php">Update</a>
  <a href="delete.php">Delete</a>
  <a href="add.php">Add</a>
</div>

<div>
    <form action="search.php" method="GET">
      <input type="text" name="search" placeholder="Search...">
      <input type="submit" value="Search">
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
    // Check if search query exists
    if (isset($_GET['search'])) {
        $input1 = $_GET['search'];
        $query = "SELECT * FROM opening WHERE OPENING_ID LIKE '%$input1%' OR COMPANY_ID LIKE '%$input1%' OR NUM_OF_POSITIONS LIKE '%$input1%' OR START_DT LIKE '%$input1%' OR HOURLY_PAY LIKE '%$input1%';";
        
        // Perform the search query
        $result = mysqli_query($conn, $query);

        // Display search results
        if ($result && mysqli_num_rows($result) > 0) {
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
        } else {
            echo "<tr><td colspan='6'>No results found.</td></tr>";
        }
    } else {
        // Fetch all records if no search query
        $query = "SELECT * FROM OPENING";
        $result = mysqli_query($conn, $query);

        // Display all records
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
    }
    $conn->close();
    ?>
  </tbody>
</table>

</body>
</html>
