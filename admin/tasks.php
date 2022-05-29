<?php 
	error_reporting(0);
	session_start();
	require "includes/db.php";
	require "includes/functions.php";

    if(!isset($_SESSION['adminid'])) {
        header("location: logout.php");
    }
	
	
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	
	<!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
	
	<link href="assets/css/style.css" rel="stylesheet" />
	
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="#000" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<?php require "includes/side_wrapper.php"; ?>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed" style="background: #FF5722;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar" style="background: #fff;"></span>
                        <span class="icon-bar" style="background: #fff;"></span>
                        <span class="icon-bar" style="background: #fff;"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="color: #fff;">TASKS</a>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php" style="color: #fff;">
                                Log out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card" style="width: 90rem;">
                           
                            <div class="content">
                                <form method="post"  enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
											
											
										
                                            
                                        </div>
                                    </div>
									
									<div class="row">
                                       

                                       
                                <form method="post" name="view">
                                <br>&nbsp&nbsp&nbsp<u><b>TASK DETAILS</b></u><br><br>
                                <!-- <div class="col-md-12"> -->
                                            <!-- <div class="search">
                                                <label style="color: #333">Search</label>
                                                <input type="search" autofocus name="Search"  placeholder="Search Here" required />
                                                <input type="submit" name="search" style="background: #FF5722; border: 1px solid #FF5722" value="Search"  />

                                            </div> -->
                                            <div class="form-group">
                                             <div class="search"> 
                                                
                                                <!-- <label style="color: #333">Search</label> -->
                                                &nbsp&nbsp &nbsp<select name="partstatus" class="mdb-select md-form" required />
                                               <option value="">Select Status</option> 
                                                    <option value="Pending" >Pending</option>
                                                    <option value="Finished" >Finished</option>
                                                   
                                                       
												</select>
                                               <input type = "submit" name="search" value="Search" class="btn btn-primary"/> 

                                            </div>
                                            
<br><br>
                                
                                <?php
                                    if(isset($_POST["partstatus"]))
                                    {
                                         
                                
                                $sql1="select * from staff_tb,part_tb,work_tb,operation_tb,cust_tb where part_tb.work_id=work_tb.work_id and part_tb.partoperation_id=operation_tb.operation_id and staff_tb.staff_id=part_tb.staff_id and cust_tb.cust_id=work_tb.cust_id and part_status='".$_POST["partstatus"]."'";
						$result1=$db->query($sql1);
						if($result1->num_rows >0)
						{?> <table class="table table-bordered thead-warning">
                    <tr>
                    <td><b>Work ID</b></td>
                    <td><b>Customer</b></td>
                      <td><b>Work</b></td>
                      <td><b>Part ID</b></td>
                      <td><b>Operation</b></td>
                      <td><b>Staff</b></td>
                      <!-- <td><b>Status</b></td> -->
                      <td><b>Start time</b></td>
                      <td><b>End time</b></td>
                      <td><b>Deadline time</b></td>
                      <td><b>Amount</b></td>
                      <td><b>Assigned</b></td>
                      
                      
                    </tr> <?php 
						while($row =$result1->fetch_assoc())
						{
			  ?>
              <tr>
              <td><?php echo $row["work_id"]; ?></td>
              <td><?php echo $row["cust_name"]; ?></td>
                <td><?php echo $row["work_desc"]; ?></td>
                <td><?php echo $row["part_id"]; ?></td>
                <td><?php echo $row["operation_name"]; ?></td>
                <td><?php echo $row["staff_name"]; ?></td>
                <!-- <td><?php echo $row["part_status"]; ?></td> -->
                <td><?php echo $row["part_starttime"]; ?></td>
                <td><?php echo $row["part_endtime"]; ?></td>
                <td><?php echo $row["part_deadlinetime"]; ?></td>
                <td><?php echo $row["part_rate"]; ?></td>
                <td><?php echo $row["part_assign"]; ?></td>
                
               

             </tr>
              <?php
						}
						}
						else {  echo "NO TASK ADDED YET!";}
                    }
						?>
            </table><?php ?>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container-fluid">
                
                <p class="copyright pull-right">
                    &copy; <?php echo strftime("%Y", time())?> <a href="index.php">Workshop</a>
                </p>
            </div>
        </footer>

    </div>
</div>


</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>
