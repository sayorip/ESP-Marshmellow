<!DOCTYPE html>
<html lang="en">
<head>
  <title>Unit </title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>


<style>
.table{width: 500px;height: 200px;border-collapse:collapse;}
.table-wrap{max-height: 200px;width:100%;overflow-y:auto;overflow-x:hidden;}
.table-dalam{height:300px;width:500px;border-collapse:collapse;}
.td-nya{border-left:1px solid white;border-right:1px solid grey;border-bottom:1px solid grey;}

</style>


<?php
$servername = "localhost";
$username = "root";
$password = "College@2015";
$dbname = "ESPDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT cust_id, f_nm, l_nm from customer";
$sql0 = "SELECT ut_id, type, tw_id, floor, area FROM unit";
$sql1 = "SELECT tw_id, desc from tower";
$sql2 = "SELECT type_id, desc, price from type";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "
<div class='container'>
  <h2>Units Available in the previously selected criteria</h2>      
  <table class='table table-hover table-bordered'>
    <thead>
      <tr class='success'>
        <th>customer id</th>
        <th>First name</th>
        <th>Last name</th>
      </tr>
    </thead>
    <tbody>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
	
        echo "<tr><td><a href='Frontend.html'>".$row["cust_id"]."</td><td>".$row["f_nm"]."</td><td>".$row["l_nm"]."</a></td></tr>";
    }
    echo "</tbody>
  </table>
</div>";

} else {
    echo "No Result found";
}
$conn->close();

?>


</body>
</html>
