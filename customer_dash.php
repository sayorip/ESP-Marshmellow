<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sales View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<!--------------------------------------------------------------- PHP Code ------------------------------------------------------------------>
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
    
    echo $h_success;
		
} else {
   $h_fail = $h_fail. "Error : " . $conn->error;
   echo "<div class='alert alert-danger'><strong>Sorry!</strong>" . $h_fail . "</div>";
   echo "<script type='text/javascript'>alert('$h_fail');</script>";
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

//---------------------------------------------- Add Billing Plan ---------------------------------------------------------------------------
function add_plan($bill_plan, $name, $years, $roi)
{

$sql = "INSERT INTO bill_plan (bill_plan, name, no_years, roi, cr_dt)
VALUES ('$bill_plan', '$name', '$years', '$roi', now());";
$h_success = "Billing Plan: " . $desc . " Added Successfully";
$h_success = "<script type='text/javascript'>alert('$h_success');</script>";
$h_fail = "Billing Plan: " . $bill_plan . " Not Added";

database($sql, $h_success, $h_fail);
}

switch ($_POST[add])
{
case "tower" : unset($msg); add_tower($_POST['tw_id'], $_POST['desc']); break; //add tower
case "type"  : unset($msg); add_type($_POST[type_id],$_POST[desc],$_POST[tw_id],$_POST[price]); break; //add type
case "unit"  : unset($msg); add_unit($_POST[ut_id], $_POST[type], $_POST[tw_id], $_POST[floor], $_POST[area]); break; //add unit
case "plan"  : unset($msg); add_plan($_POST[bill_plan], $_POST[name], $_POST[years], $_POST[roi]); break; //add billing plan

}
?>

<div class="container">
  <h2>Customer View</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Sales Order</a></li>
    <li><a data-toggle="tab" href="#menu1">Payment</a></li>
    <li><a data-toggle="tab" href="#menu2">Owner</a></li>
    <li><a data-toggle="tab" href="#menu4">Construction Progress</a></li>
<ul class="nav navbar-nav navbar-right">
        <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span>Logout</a></li>
</ul>
   
  </ul>

  <div class="tab-content">
<!tab 1>
    <div id="home" class="tab-pane fade in active">
    <h3>Sales Order Details</h3>
    <div class="container">
    <form role="form" action = "sales_dash.php" method = "POST">

      <div class="form-group">
        <label>Sales Order Number :</label>
         <div id="so_no" class="well well-sm">Sales Order Number</div>
      </div>

      <div class="form-group">
        <label>Unit Number : </label>
         <div id="so_no" class="well well-sm">Sales Order Number</div>
      </div>

      <div class="form-group">
        <label>Customer Name : </label>
         <div id="so_no" class="well well-sm">Sales Order Number</div>
      </div>

      <div class="form-group">
        <label>Tower Number : </label>
         <div id="so_no" class="well well-sm">Sales Order Number</div>
      </div>

      <div class="form-group">
        <label>Type : </label>
         <div id="so_no" class="well well-sm">Sales Order Number</div>
      </div>    

      <div class="form-group">
        <label>Unit Price : </label>
         <div id="so_no" class="well well-sm">Sales Order Number</div>
      </div>

      <div class="form-group">
        <label>Bill Plan Chosen : </label>
         <div id="so_no" class="well well-sm">Sales Order Number</div>
      </div>

      <div class="form-group">
        <label>Created On : </label>
         <div id="so_no" class="well well-sm">Sales Order Number</div>
      </div>

      <div class="form-group">
        <label>Last Changed On : </label>
         <div id="so_no" class="well well-sm">Sales Order Number</div>
      </div> 

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
	
		echo "<option value=". $row['tw_id'] . ">" . $row['name'] . "</option>";
	    }	

	} 
	$conn->close();
	?>
<!-------------------------------------------------- End of Dropdown --------------------------------------------------------------------->
	</select>
	</div>

      <div class="form-group">
        <label>Price:(in USD)</label>
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
         <input type="text" class="form-control" name="ut_id" placeholder="Enter Unit Number " required>
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

	$sql = "SELECT type_id, name from type where type_id != ''";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
 	
	while($row = $result->fetch_assoc()) {
	
		echo "<option value=". $row['type_id'] . ">" . $row['name'] . "</option>";
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
	
		echo "<option value=". $row['tw_id'] . ">" . $row['name'] . "</option>";
	    }	

	} 
	$conn->close();
	?>
<!-------------------------------------------------- End of Dropdown --------------------------------------------------------------------->
	</select>
	</div>

          <div class="form-group">
        <label>Floor:</label>
         <input type="text" class="form-control" name="floor" placeholder="Enter Floor " required>
      </div>

      <div class="form-group">
        <label>Area in Sqft:</label>
         <input type="text" class="form-control" name="area" placeholder="Enter Area " required>
      </div>

   <button type="submit" class="btn pull-right" name="add" value="unit" >Add Unit</button>
    </form>
    </div>
    </div>


<!---Add Billing Plan -->
<div id="menu4" class="tab-pane fade">
      <h3>Add Billing Plan</h3>
    <div class="container">
    <form role="form" action = "sales_dash.php" method = "POST">

      <div class="form-group">
        <label>Billing Plan Number:</label>
         <input type="text" class="form-control" name="bill_plan" placeholder="Enter Billing Plan Number " required>
      </div>

      <div class="form-group">
        <label >Billing Plan Description</label>
         <input type="text" class="form-control" name="name" placeholder="Enter Billing Plan Description " required>
      </div>

     <div class="form-group">
        <label >Number of Installments</label>
         <input type="text" class="form-control" name="years" placeholder="Enter Number of Installments " required>
      </div>

      <div class="form-group">
        <label >Rate of Interest(in %)</label>
         <input type="text" class="form-control" name="roi" placeholder="Enter Rate of Interest " required>
      </div>

      <button type="submit" class="btn pull-right" name="add" value="plan" >Add Billing Plan</button>

      </form>
    </div>
    </div>



<!---End of Add Billing Plan -->


 </div>
  </div>

</div>

</body>
</html>
