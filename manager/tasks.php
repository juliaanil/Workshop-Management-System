<?php 
	error_reporting(0);
	session_start();
	require "includes/db.php";
	require "includes/functions.php";

    if(!isset($_SESSION['managerid'])) {
        header("location: logout.php");
    }
	
	 if (  isset ( $_POST["submit"]))
	  {
		  if($_POST["submit"]=="Submit")
		  { 
		     if($_POST["name"]!=" ")
		  { 
			
			$sql = "INSERT INTO part_tb (part_id,work_id,partoperation_id,staff_id,part_starttime,part_deadlinetime,part_assign) VALUES ('".$_POST["partid"]."','".$_POST["workid"]."','".$_POST["partoperationid"]."','".$_POST["staffid"]."','".$_POST["partstarttime"]."','".$_POST["partdeadlinetime"]."','".$_POST["partassign"]."')";
			if($db->query($sql) == TRUE)
			{ ?> <script> alert("Task Added Successfully!!"); </script><?php
			}
			else
			{ ?> <script> alert("Error!!"); </script><?php
				echo " ".$db->error; }}else { ?> <script> alert("Operation is empty!! "); </script><?php } }}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>MANAGER</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"> -->
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
                        <div class="card" style="width: 100rem;">
                            <div class="header">
                                <h4 class="title">Add Task</h4>
                            </div>
                            <div class="content">
                                <form method="post"  enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
											
											
										
                                            
                                        </div>
                                    </div>
									
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Part ID</label>
                                                <input type="number" autofocus name="partid" class="form-control" placeholder="Enter Part ID" required />
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                        <div class="form-group">
                                                <label style="color: #333">Work</label>
                                                <select name="workid" class="form-control" required />
													<option value="">Select Work</option>
                                                    <?php 
													$sql="select * from work_tb,cust_tb where cust_tb.cust_id=work_tb.cust_id and work_status='Pending'";
                                                                    $result=$db->query($sql);
                                                                    if($result->num_rows >0)
                                                                    { while($row =$result->fetch_assoc())
                                                                    {
                                                        ?>
                                                        <option value="<?php  echo $row["work_id"] ;?>" > 
                                                        <?php 
                                                        echo $row["cust_name"]; echo "-<b>".$row["work_desc"]."</b>" ;
                                                        ?>
                                                        </option>
                                                        <?php
                                                        }
                                                        }
                                                    ?>  
												</select>
                                            </div>
                                    </div>
                                    <div class="col-md-12">
                                    <div class="form-group">
                                                <label style="color: #333">Operation</label>
                                                <select name="partoperationid" class="form-control" required />
													<option value="">Select Operation</option>
                                                    <?php 
													$sql="select * from operation_tb";
                                                                    $result=$db->query($sql);
                                                                    if($result->num_rows >0)
                                                                    { while($row =$result->fetch_assoc())
                                                                    {
                                                        ?>
                                                        <option value="<?php  echo $row["operation_id"] ;?>" > 
                                                        <?php 
                                                        echo $row["operation_name"] ;
                                                        ?>
                                                        </option>
                                                        <?php
                                                        }
                                                        }
                                                    ?>  
												</select>
                                            </div>
                                    </div>

                                    <div class="col-md-12">
                                    <div class="form-group">
                                                <label style="color: #333">Staff</label>
                                                <select name="staffid" class="form-control" required />
													<option value="">Select Staff</option>
                                                    <?php 
													$sql="select * from staff_tb";
                                                                    $result=$db->query($sql);
                                                                    if($result->num_rows >0)
                                                                    { while($row =$result->fetch_assoc())
                                                                    {
                                                        ?>
                                                        <option value="<?php  echo $row["staff_id"] ;?>" > 
                                                        <?php 
                                                        echo $row["staff_name"] ;
                                                        ?>
                                                        </option>
                                                        <?php
                                                        }
                                                        }
                                                    ?>  
												</select>
                                            </div>
                                     </div> 

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Start time</label>
                                                <input type="time" autofocus name="partstarttime" class="form-control" placeholder="Enter start time" required />
                                            </div>
                                        </div> 

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Deadline time</label>
                                                <input type="time" autofocus name="partdeadlinetime" class="form-control" required />
                                            </div>
                                        </div> 
                                         
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Assign task</label>
                                                <select name="partassign" class="form-control" required />
													<option value="">Assignment Status</option>
                                                    
                                                        <option value="No">No</option>
                                                        <option value="Yes">Yes</option>
                                                    
                                                      
												</select>                                                   </div>
                                        </div>
                                       
                                        
                                       
									
									<div class="row"></div>
								
                                    &nbsp;
                                    &nbsp;
                                  <input type="submit" name="submit" style="background: #FF5722; border: 1px solid #FF5722" value="Submit" class="btn btn-info btn-fill pull-center" />
                                    <div class="clearfix"></div>
                                </form>
                                <form method="post" name="view">
                                <!-- <br><u><b><h3 align="center">TASK DETAILS</h3></b></u> -->
                                <br>&nbsp&nbsp &nbsp<u><b>TASK DETAILS</b></u><br><br>
                                <!-- <div class="col-md-12"> -->
                                            <!-- <div class="search">
                                                <label style="color: #333">Search</label>
                                                <input type="search" autofocus name="Search"  placeholder="Search Here" required />
                                                <input type="submit" name="search" style="background: #FF5722; border: 1px solid #FF5722" value="Search"  />

                                            </div> -->
                                            
                                            <div class="form-group">
                                             <div class="search"> 
                                                
                                                <!-- <label style="color: #333">Search</label> -->
                                                &nbsp&nbsp &nbsp <select name="partstatus" class="mdb-select md-form" required />
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
                                            

                                
                                $sql1="select * from staff_tb,part_tb,work_tb,operation_tb,cust_tb where part_tb.work_id=work_tb.work_id and part_tb.partoperation_id=operation_tb.operation_id and staff_tb.staff_id=part_tb.staff_id and part_status='".$_POST["partstatus"]."'and cust_tb.cust_id=work_tb.cust_id";
                                // $sql1="select * from staff_tb,part_tb,work_tb,operation_tb,customer_tb where part_tb.work_id=work_tb.work_id and part_tb.partoperation_id=operation_tb.operation_id and staff_tb.staff_id=part_tb.staff_id and cust_tb.cust_id=work_tb.cust_id and part_status='".$_POST["partstatus"]."'";
                               
						$result1=$db->query($sql1);
						if($result1->num_rows >0)
						{?> <table class="table table-bordered thead-warning">
                    <tr><thead>
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
                     
                      <td><b>Assigned</b></td>
                      <td><b>Amount</b></td>
                      
                      <td colspan="2"><b>Action</b></td>
                      </thead>
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
                <!-- <td <?php if( $row["part_status"]=="Pending") { ?>class="bg-danger text-white"<?php } else { ?>class="bg-success text-white"<?php } ?>><?php echo $row["part_status"]; ?></td> -->
                <td><?php echo $row["part_starttime"]; ?></td>
                <td><?php echo $row["part_endtime"]; ?></td>
                <td><?php echo $row["part_deadlinetime"]; ?></td>
               
                <td><?php echo $row["part_assign"]; ?></td>
                <td><?php echo $row["part_rate"]; ?></td>
                
                <td><a class="btn btn-info btn-fill" href="updatetask.php?requestid=<?php echo $row["work_id"];?>&&part_id=<?php echo $row["part_id"];?>" onclick="return confirm('Are you sure you want to update this task?');">Update </a></td>
                <td><a class="btn btn-danger btn-fill" href="deletetask.php?requestid=<?php echo $row["work_id"];?>&&part_id=<?php echo $row["part_id"];?>" onclick="return confirm('Are you sure you want to delete this task?');">Delete </a></td>

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
