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

$sql = "SELECT tw_id, name from tower";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
echo "
<div class='form-group'>
<div class='dropdown'>
 <button class='btn btn-default dropdown-toggle' type='button' name='tw_id' data-toggle='dropdown' required>Tower ID
  <span class='caret'></span></button>
  <ul class='dropdown-menu' role='menu' aria-labelledby='menu1'>";
    while($row = $result->fetch_assoc()) {
	
        echo "<li role='presentation'><a role='menuitem' tabindex='-1' href='#'>" . $row["tw_id"] . "</a></li>";
    }
    echo "  </ul>
 </div>
</div>";

} 
$conn->close();
?>


</body>
</html>
