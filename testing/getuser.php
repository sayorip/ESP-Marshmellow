<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = $_GET[q];

$con = mysqli_connect('localhost','root','College@2015','ESPDB');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM type WHERE tw_id = '$q'";
$result = mysqli_query($con,$sql);	

if ($q === 'T001')
{ echo "True";
}
else
{
echo "false";
echo $q;
}

echo "<table>
<tr>
<th>Firstname</th>
<th>Middlename</th>
<th>Lastname</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['price'] . "</td>";
    echo "<td>" . $row['type_id'] . "</td>";

    echo "</tr>";
}
echo "</table>";
mysqli_close($con);
?>

</body>
</html>

