<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">TM BUILDERS</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="image">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>Preeti</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Hello , lets get started</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="image">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>Sayori Patil</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Hey pavani hie </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>Tanya Sanjay</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Hello tanya!!</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Pavani Vellal <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> View Sales Order</a>
                    </li>
                    <li>
                        <a href="blank2.html"><i class="fa fa-fw fa-dashboard"></i>Owners</a>
                    </li>
                    <li>
                        <a href="blank4.html"><i class="fa fa-fw fa-table"></i> Payment</a>
                    </li>
                    <li>
                        <a href="blank3.html"><i class="fa fa-fw fa-edit"></i> Construction Progress</a>
                    </li>
                   
        </nav>

        <div id="page-wrapper" style="position:absolute; top:50px; bottom:20px;">

            <div class="container-fluid">
			<div><br/>
			<br/>
			<br/>
			<br/>
			<br/>
			</div>

                

<?php



echo "<form class='form-horizontal'>
  			<div class='form-group'>
    				<label for='sales order' class='col-sm-2 control-label'>Sales Order No:</label>
    				<div class='col-sm-1'>
				<label class='col-md-3 control-label'>10101</label>
    				</div>  				
  				</div>";

?>

					
				<div class="form-group">
    				<label for="create on" class="col-sm-2 control-label">Create On:</label>
    				<div class="col-sm-6">
      				<input type="text" class="resizedTextbox" id="create on" placeholder="create on">
    				</div>
  					</div> 
					<div class="form-group">
    				<label for="Billing Plan" class="col-sm-2 control-label">Create On:</label>
    				<div class="col-sm-6">
      				<input type="text" class="resizedTextbox" id="create on" placeholder="Billing On">
    				</div>
  					</div> 
					<form role="form">
					<div class="form-group">
                     <label for="comment" class="col-sm-2 control-label">Comment:</label>
					 <div class="col-sm-6">
                    <textarea name="comments" cols="45" rows="5" id="comments">
                    </textarea>
                     </div>
					 </div>
					 </form/>
					
					
				
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

</body>

</html>
