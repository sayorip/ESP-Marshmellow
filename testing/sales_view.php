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

//-----------------------------------------------------Processing SQL Database queries--------------------------------------------------------
function database ($sql, $h_success, $h_fail)
{
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

if ($conn->query($sql) === TRUE) {
    
    global $msg, $result;
    $msg = "User Successfully Registered";
    $result = $conn->query($sql);
		
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $msg = "<br>Error: " . "<br>" . $conn->error;
    $h_fail = $h_fail . "?msg=" . $msg;
    //if(isset($h_fail))
    //{
    header($h_fail);
    exit();
    //}
}

$conn->close();
}

//---------------------------------------------- Add tower -------------------------------------------------------------------------------
function add_tower($tw_id, $desc)
{

$sql = "INSERT INTO tower (tw_id, name, cr_dt) values ('$tw_id', '$desc', now());";

$h_success = "Tower " . $desc . " Added Successfully";
$h_fail = "Location:reg_fail.php";

database($sql, $h_success, $h_fail);


}

//---------------------------------------------- Add Type -------------------------------------------------------------------------------
function add_type($type_id, $desc, $tw_id,$price)
{

$sql = "INSERT INTO type (type_id, name, tw_id, price, cr_dt) VALUES ('$type_id', '$desc', '$tw_id', '$price', now());";

$h_success = "Type " . $desc . " Added Successfully";
$h_fail = "Location:reg_fail.php";

database($sql, $h_success, $h_fail);


}
//---------------------------------------------- Add Unit -------------------------------------------------------------------------------
function add_unit($ut_id, $type, $tw_id, $floor, $area)
{

$sql = "INSERT INTO unit (ut_id, type, tw_id, floor, area, cr_dt)
VALUES ('$ut_id', '$type', '$tw_id', '$floor', '$area', now());";

$h_success = "Unit " . $ut_id . " Added Successfully";
$h_fail = "Location:reg_fail.php";

database($sql, $h_success, $h_fail);
}



switch ($_POST[action])
{
case "add_tower" : unset($msg); add_tower($_POST[tw_id], $_POST[desc]); break; //add tower
case "add_type"  : unset($msg); add_type($_POST[type_id],$_POST[desc],$_POST[tw_id],$_POST[price]); break; //add type
case "add_unit"  : unset($msg); add_unit($_POST[ut_id], $_POST[type], $_POST[tw_id], $_POST[floor], $_POST[area]); break; //add unit
//case "disp_unit"  : unset($msg); disp_unit(); break; //display unit
//case "disp_tower" : unset($msg); disp_tower(); break; //display tower
//case "disp_type"  : unset($msg); disp_type(); break; //display type

}
?>


<form action = "sales_view.php" method = "POST">
<div class="container">
<div>
<button type="submit" name="action" value="add_tower" class="btn btn-primary">Add New Tower</button>
</div>
<div>
<button type="submit" name="action" value="add_unit" class="btn btn-primary">Add Apartment</button>
</div>
<div>
<button type="submit" name="action" value="add_type" class="btn btn-primary">Add Apartment Type</button>
</div>
</div>
</form>


</body>
</html>
