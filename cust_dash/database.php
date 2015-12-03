<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','root','College@2015','ESPDB');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM customer WHERE cust_id = 1";
$result = mysqli_query($con,$sql);

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['f_nm'] . "</td>";
    echo "<td>" . $row['l_nm'] . "</td>";
    echo "<td>" . $row['dob'] . "</td>";
    echo "<td>" . $row['street'] . "</td>";
    echo "<td>" . $row['city'] . "</td>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>

</body>
</html>

