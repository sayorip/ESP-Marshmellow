<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<?php
if ($_POST[login]) 
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

$sql = "SELECT ur_id, password, f_nm, ur_type from user001 where ur_id = '$_POST[ur_id]';";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
	
        if ($_POST[password] === $row["password"])
	{
	//Start session and set variabe values
	session_start();
	$_SESSION["ur_id"] = $row["ur_id"];
	$_SESSION["log_stat"] = true;
	$_SESSION["f_nm"] = $row["f_nm"];
	//---------------------------------------
	if ($row["ur_type"] == "admin")
	{
	header("Location:admin_dash.php");
	//exit();
	}
	elseif($row["ur_type"] == "sales")
	{
	header("Location:sales_dash.php");
	//exit();
	}
	else
	{
	header("Location:customer_dash.php");
	//exit();	
	}


	}
	else
	{echo "<script type='text/javascript'>alert('User ID or password incorrect. Please Retry login');</script>";}

    }
} else {
    echo "<script type='text/javascript'>alert('User ID does not Exist');</script>";
    
}

$conn->close();

}


?>

<div class="container">    
        <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
            <div class="panel panel-info" >
                    <div class="panel-heading">
                        <div class="panel-title">Sign In</div>
                        <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="email.php">Forgot password?</a></div>
                    </div>     

                    <div style="padding-top:30px" class="panel-body" >

                        <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>
                            
                        <form id="loginform" class="form-horizontal" role="form" action = "login.php" method = "POST">
                                    
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input id="login-username" name = "ur_id" type="email" class="form-control" name="username" value="" placeholder="username or email" required>                                        
                                    </div>
                                
                            <div style="margin-bottom: 25px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input id="login-password" name = "password" type="password" class="form-control" name="password" placeholder="password" required>
                                    </div>
                                    


                            <div style="margin-bottom: 25px" class="input-group">
                            <button type="submit" id = "login" name = "login" value = "login" class="btn btn-primary" right >Login</button>

                            </div>
                            <!--  
                            <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="login-remember" type="checkbox" name="remember" value="1"> Remember me
                                        </label>
                                      </div>
                                    </div> 
			    -->
			

                                     <div class="form-group">
                                    <div class="col-md-12 control">
                                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                                            Don't have an account! 
                                        <a href="signup.html">
                                            Sign Up Here
                                        </a>
                                        </div>
                                    </div>
                                </div>    
                            </form>     

</form>
</body>
</html>
