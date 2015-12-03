<!DOCTYPE html>
<html lang="en">
<head>
  <title>Customer Dashboard</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<!--------------------------------------------------------------- PHP Code ------------------------------------------------------------------>
<?php

echo $_SESSION["ur_id"];


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
    
    echo $h_success;
		
} else {
   echo $h_fail;
   //echo "  <div class='alert alert-danger'><strong>Sorry!</strong>" . $h_fail . "</div></div>";
}

$conn->close();
}

//---------------------------------------------- Add tower -------------------------------------------------------------------------------
function add_tower($tw_id, $desc)
{

$sql = "INSERT INTO tower (tw_id, name, cr_dt) values ('$tw_id', '$desc', now());";
$h_success = "Tower: " . $desc . " Added Successfully";
$h_success = "<script type='text/javascript'>alert('$h_success');</script>";
$h_fail = "Tower: " . $tw_id . " Not Added";

database($sql, $h_success, $h_fail);


}

//---------------------------------------------- Add Type -------------------------------------------------------------------------------
function add_type($type_id, $desc, $tw_id,$price)
{

$sql = "INSERT INTO type (type_id, name, tw_id, price, cr_dt) VALUES ('$type_id', '$desc', '$tw_id', '$price', now());";
$h_success = "Tower: " . $desc . " Added Successfully";
$h_success = "<script type='text/javascript'>alert('$h_success');</script>";
$h_fail = "Type: " . $type_id . " Not Added";

database($sql, $h_success, $h_fail);


}
//---------------------------------------------- Add Unit -------------------------------------------------------------------------------
function add_unit($ut_id, $type, $tw_id, $floor, $area)
{

$sql = "INSERT INTO unit (ut_id, type, tw_id, floor, area, cr_dt)
VALUES ('$ut_id', '$type', '$tw_id', '$floor', '$area', now());";
$h_success = "Tower: " . $desc . " Added Successfully";
$h_success = "<script type='text/javascript'>alert('$h_success');</script>";
$h_fail = "Unit: " . $ut_id . " Not Added";

database($sql, $h_success, $h_fail);
}

switch ($_POST[add])
{
case "tower" : unset($msg); add_tower($_POST['tw_id'], $_POST['desc']); break; //add tower
case "type"  : unset($msg); add_type($_POST[type_id],$_POST[desc],$_POST[tw_id],$_POST[price]); break; //add type
case "unit"  : unset($msg); add_unit($_POST[ut_id], $_POST[type], $_POST[tw_id], $_POST[floor], $_POST[area]); break; //add unit

}
?>

<div class="container">
  <h2>Customer View</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Sales Order </a></li>
    <li><a data-toggle="tab" href="#menu1">Owner</a></li>
    <li><a data-toggle="tab" href="#menu2">Payment</a></li>
    <li><a data-toggle="tab" href="#menu3">Construction Progress</a></li>
<ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span>Logout</a></li>
</ul>
   
  </ul>

  <div class="tab-content">
<!tab 1>
    <div id="home" class="tab-pane fade in active">
    <h3>View Sales Order</h3>
    <div class="container">
    <form role="form" action = "sales_dash.php" method = "POST">
      <div class="form-group">
        <label>Sales Order Number:</label>
         
	 <div class="well well-sm" name="tw_id">Basic Well</div>
      </div>
      <div class="form-group">
        <label for="tower">Tower Name:</label>
         <input type="text" class="form-control" name="desc" placeholder="Enter Tower Name " required>
      </div>

      <button type="submit" class="btn pull-right" name="add" value="tower" >Add Tower</button>

      </form>
    </div>
    </div>

<!tab2>

    <div id="menu1" class="tab-pane fade">
      <h3>Add Type</h3>
        <div class="container">
       <form role="form" action = "sales_dash.php" method = "POST">
      <div class="form-group">
        <label>Type ID:</label>
          <input type="text" class="form-control" name="type_id" placeholder="Enter Type ID " required>
      </div>

       <div class="form-group">
        <label for="tower">Description:</label>
         <input type="text" class="form-control" name="desc" placeholder="Enter Type Description " required>
      </div>

      <div class="form-group">
	<label for="tw_id">Choose Tower (select one):</label>
	 <select class="form-control" name="tw_id">

<!-------- code for fetching available values from Database for input dropdown options ------------------------------------------------------>
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

	$sql = "SELECT tw_id, name from tower where tw_id != ''";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
 	
	while($row = $result->fetch_assoc()) {
	
		echo "<option>" . $row['tw_id'] . "</option>";
	    }	

	} 
	$conn->close();
	?>
<!-------------------------------------------------- End of Dropdown --------------------------------------------------------------------->
	</select>
	</div>

      <div class="form-group">
        <label>Price:</label>
         <input type="text" class="form-control" name="price" placeholder="Enter Price " required>
      </div>

     <button type="submit" class="btn pull-right" name="add" value="type" >Add Type</button>
     </form>


      </div>
    </div>

<!tab3>


      <div id="menu2" class="tab-pane fade">
      <h3>Add Unit Details</h3>

    <div class="container">
      <form role="form" action = "sales_dash.php" method = "POST">

      <div class="form-group">
        <label>Unit ID:</label>
         <input type="text" class="form-control" name="ut_id" placeholder="Enter Tower ID " required>
      </div>

      <div class="form-group">
	<label for="type">Choose Type (select one):</label>
	 <select class="form-control" name="type">

<!-------- code for fetching available values from Database for input dropdown options ------------------------------------------------------>
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

	$sql = "SELECT type_id from type where type_id != ''";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
 	
	while($row = $result->fetch_assoc()) {
	
		echo "<option>" . $row['type_id'] . "</option>";
	    }	

	} 
	$conn->close();
	?>
<!-------------------------------------------------- End of Dropdown --------------------------------------------------------------------->
	</select>
	</div>

       <div class="form-group">
	<label for="tw_id">Choose Tower (select one):</label>
	 <select class="form-control" name="tw_id">

<!-------- code for fetching available values from Database for input dropdown options ------------------------------------------------------>
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

	$sql = "SELECT tw_id, name from tower where tw_id != ''";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
 	
	while($row = $result->fetch_assoc()) {
	
		echo "<option>" . $row['tw_id'] . "</option>";
	    }	

	} 
	$conn->close();
	?>
<!-------------------------------------------------- End of Dropdown --------------------------------------------------------------------->
	</select>
	</div>

          <div class="form-group">
        <label>Floor:</label>
         <input type="text" class="form-control" name="floor" placeholder="Enter Tower ID " required>
      </div>

      <div class="form-group">
        <label>Area in Sqft:</label>
         <input type="text" class="form-control" name="area" placeholder="Enter Tower ID " required>
      </div>

   <button type="submit" class="btn pull-right" name="add" value="unit" >Add Unit</button>
    </form>
    </div>
    </div>
    </div>

<!--tab 4-->
    <div id="menu3" class="tab-pane fade in active">
    <h3>View Sales Order</h3>
    <div class="container">
    <form role="form" action = "sales_dash.php" method = "POST">
      <div class="form-group">
        <label>Sales Order Number:</label>
         
	 <div class="well well-sm" name="tw_id">Basic Well</div>
      </div>
      <div class="form-group">
        <label for="tower">Tower Name:</label>
         <input type="text" class="form-control" name="desc" placeholder="Enter Tower Name " required>
      </div>

      <button type="submit" class="btn pull-right" name="add" value="tower" >Add Tower</button>

      </form>
    </div>
    </div>

  </div>
</div>

</body>
</html>
