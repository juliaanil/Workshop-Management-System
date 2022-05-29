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
            //   echo $_POST["workstartdate"];
		     if($_POST["name"]!="' ")
		  { 
			
            // $sql = "INSERT INTO work_tb (cust_id,work_desc,mgr_id,work_startdate,work_deadlinedate) VALUES ('".$_POST["customer"]."','".$_POST["workdesc"]."','".$_POST["manager"]."','".$_POST["workstartdate"]."','".$_POST["workdeadlinedate"]."')";	
              $sql = "INSERT INTO work_tb (cust_id,work_desc,work_startdate,work_deadlinedate) VALUES ('".$_POST["customer"]."','".$_POST["workdesc"]."','".$_POST["workstartdate"]."','".$_POST["workdeadlinedate"]."')";		
            	if($db->query($sql) == TRUE)
			{ ?> <script> alert("Work Added Successfully!!"); </script><?php
			}
            
			else
			{ ?> <script> alert("Error!!"); </script><?php
				echo " ".$db->error; }}else { ?> <script> alert("Work description is empty!! "); </script><?php } }}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Manager</title>

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
                    <a class="navbar-brand" href="#" style="color: #fff;">WORKS</a>
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
                            <div class="header">
                                <h4 class="title">Add Work</h4>
                            </div>
                            <div class="content">
                                <form method="post"  enctype="multipart/form-data">
                                
                                   
                                    <div class="row">
									
                                    <div class="form-group">
                                                <label style="color: #333">Customer</label>
                                                <select name="customer" class="form-control" required />
													<option value="">Select Customer</option>
                                                    <?php 
													$sql="select * from cust_tb";
                                                                    $result=$db->query($sql);
                                                                    if($result->num_rows >0)
                                                                    { while($row =$result->fetch_assoc())
                                                                    {
                                                        ?>
                                                        <option value="<?php  echo $row["cust_id"] ;?>" > 
                                                        <?php 
                                                        echo $row["cust_name"] ;
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
                                                <label style="color: #333">Description</label>
                                                <input type="text" autofocus name="workdesc" class="form-control" placeholder="Enter work description" required />
                                            </div>
                                        </div>
                                       
                                      
                                        <!-- <div class="col-md-12">

                                        <div class="form-group">
                                                <label style="color: #333">Manager</label>
                                                <select name="manager" class="form-control" required />
													<option value="">Select Manager</option>
                                                  /* <?php 
													/*$sql="select * from manager_tb";
                                                                    $result=$db->query($sql);
                                                                    if($result->num_rows >0)
                                                                    { while($row =$result->fetch_assoc())
                                                                    {
                                                        ?>
                                                        <option value="<?php  echo $row["manager_id"] ;?>" > 
                                                        <?php 
                                                        echo $row["manager_name"] ;
                                                        ?>
                                                        </option>
                                                        <?php
                                                        }
                                                        }*/
                                                    ?>*/ 
												</select>
                                                </div>
                                            </div> -->
                                    </div>
									
		
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Start Date</label>
                                                <input type="date" autofocus name="workstartdate" class="form-control" placeholder="Enter start date"  />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Deadline Date</label>
                                                <input type="date" autofocus name="workdeadlinedate" class="form-control" placeholder="Enter deadline date" />
                                            </div>
                                        </div>
                                        
                                      
									
									
									<div class="row"></div>
									
                                  <input type="submit" name="submit" style="background: #FF5722; border: 1px solid #FF5722" value="Submit" class="btn btn-info btn-fill pull-left" />
                                    <div class="clearfix"></div>
                                </form>
                                <form method="post" name="view">
                                <br>&nbsp&nbsp &nbsp<u><b>WORK DETAILS</b></u><br><br>
                               

                                
                                            <div class="form-group">
                                             <div class="search"> 
                                                
                                             &nbsp&nbsp &nbsp<!-- <label style="color: #333">Search</label> -->
                                                <select name="workstatus" class="mdb-select md-form" required />
													<option value="">Select Status</option> 
                                                    <option value="Pending" >Pending</option>
                                                    <option value="Finished" >Finished</option>
                                                   
                                                       
												</select>
                                               <input type = "submit" name="search" value="Search" class="btn btn-primary"/> 

                                            </div>
                                            
                                            
<br><br>

                                
                                <?php
                                if(isset($_POST["workstatus"]))
                                {

                                    $sql1="select * from work_tb,cust_tb,manager_tb where manager_tb.manager_id=work_tb.mgr_id and cust_tb.cust_id=work_tb.cust_id and work_status='".$_POST["workstatus"]."'";
                                    
                              
						$result1=$db->query($sql1);
						if($result1->num_rows >0)
						{?><table class="table table-bordered thead-warning">
                    <tr>
                      <td><b>ID</b></td>
                      <td><b>Customer</b></td>
                      <td><b>Description</b></td>
                      <!-- <td><b>Work status</b></td> -->
                     
                      <!-- <td><b>Manager</b></td> -->
                      <td><b>Start Date</b></td>
                      <td><b>Deadline Date</b></td>
                      <td><b>End Date</b></td>
                      <td><b>Amount</b></td>
                      <td><b>Payment status</b></td>
                      

                      <td colspan="2"><b>Action</b></td>
                    </tr> <?php 
						while($row =$result1->fetch_assoc())
						{
			  ?>
              <tr>
              <td><?php echo $row["work_id"]; ?></td>
                            <td><?php echo $row["cust_name"]; ?></td>
                            <td><?php echo $row["work_desc"]; ?></td>
                            <!-- <td><?php echo $row["work_status"]; ?></td> -->
                            
                            <!-- <td><?php //echo $row["manager_name"]; ?></td> -->
                            <td><?php echo $row["work_startdate"]; ?></td>
                            <td><?php echo $row["work_deadlinedate"]; ?></td>
                            <td><?php echo $row["work_enddate"]; ?></td>
                            <td><?php echo $row["work_rate"]; ?></td>
                            <td><?php echo $row["work_payment"]; ?></td>
                            
                            
                            
                            <td> <?php if($row["work_payment"]=="Pending" ){?>  <a class="btn btn-info btn-fill" href="updatework.php?requestid=<?php echo $row["work_id"];?>&&phone=<?php echo $row["cust_phone"];?>&&name=<?php echo $row["cust_name"];?>" onclick="return confirm('Are you sure you want to update this work?');">Update </a><?php } else {echo " - ";}?></td>
                            <td><a class="btn btn-danger btn-fill" href="deletework.php?requestid=<?php echo $row["work_id"];?>" onclick="return confirm('Are you sure you want to delete this work?');">Delete </a></td>

             </tr>
              <?php
						}
						}
						else {  echo "NO WORK ADDED YET!";}
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
