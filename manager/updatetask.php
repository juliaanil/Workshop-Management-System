<?php 
	
	session_start();
	require "includes/db.php";
	require "includes/functions.php";

    if(!isset($_SESSION['managerid'])) {
        header("location: logout.php");
    }
	$sql1="select * from part_tb where work_id='".$_GET['requestid']."' and part_id='".$_GET['part_id']."'";
     $result1=$db->query($sql1);
    if($result1->num_rows >0)
    { while($row1 =$result1->fetch_assoc())
    {
       
        
       $staffid=$row1['staff_id'];
       $partstatus=$row1['part_status'];
       $partstarttime=$row1['part_starttime'];
       $partendtime=$row1['part_endtime'];
       $partdeadlinetime=$row1['part_deadlinetime'];
       $partassign=$row1['part_assign'];
       $partoperationid=$row1['partoperation_id'];
      
    }
}
	 if (  isset ( $_POST["update"]))
	  {
		  if($_POST["update"]=="Update")
		  { 
		    
			// $sql = "UPDATE part_tb SET staff_id='".$_POST["staffid"]."',part_status='".$_POST["partstatus"]."',part_starttime='".$_POST["partstarttime"]."',part_endtime='".$_POST["partendtime"]."',part_deadlinetime='".$_POST["partdeadlinetime"]."',part_assign='".$_POST["partassign"]."' where part_id='".$_GET["part_id"]."' and work_id = '".$_GET['requestid']."'";
            $sql = "UPDATE part_tb SET part_status='".$_POST["partstatus"]."',part_starttime='".$_POST["partstarttime"]."',part_endtime='".$_POST["partendtime"]."',part_deadlinetime='".$_POST["partdeadlinetime"]."',part_assign='".$_POST["partassign"]."' where part_id='".$_GET["part_id"]."' and work_id = '".$_GET['requestid']."'";
			if($db->query($sql) == TRUE)
			{ 
                if($_POST["partstatus"]=="Finished")
                {
                    $sql1="SELECT ((part_endtime-part_starttime)/10000) as time from `part_tb`where part_id =  '".$_GET['part_id']."' and work_id = '".$_GET['requestid']."'";
                    $result1=$db->query($sql1);
                    if($result1->num_rows >0)
                    { 
                        while($row1 =$result1->fetch_assoc())
                     {
                         $time=$row1["time"]; 

                     }
                    }

                    $sql2="select * from operation_tb where operation_id = '".$partoperationid."'";
                    $result2=$db->query($sql2);
                    //echo $sql2;
                    if($result2->num_rows >0)
                    { 
                        while($row2 =$result2->fetch_assoc())
                     {
                         $rate=$row2['operation_rate'];
                     }
                    }
                   

                $partamount=$rate*$time; 
//echo $time;
//echo $rate;
               echo $partamount; 
			$sql3 = "UPDATE part_tb SET part_rate='".$partamount."' where part_id='".$_GET["part_id"]."' and work_id = '".$_GET['requestid']."'";
			if($db->query($sql3) == TRUE)
			{  

                       }
                    }
                
                ?> <script> alert("Task is updated successfully!!"); 
            window.location.href="tasks.php";
            </script><?php
		}
			else
			{ ?> <script> alert("Error!!"); </script><?php
				echo " ".$db->error; } }}
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Workshop</title>

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
                    <a class="navbar-brand" href="#" style="color: #fff;">UPDATE TASK</a>
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
                                 <!-- <h4 class="title">Update Staff</h4> -->
                            </div>
                            <div class="content">
                                <form method="post"  enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
											
											
										
                                            
                                        </div>
             
      <!-- <div class="form-group">
                                                <label style="color: #333">Staff</label>
                                                <select name="staffid" class="form-control" required />
													<option value="">Select Staff</option>
                                                   /* <?php 
													/*$sql="select * from staff_tb";
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
                                                        }*/
                                                    ?>  
												</select>
                                            </div>
                                        -->
                                        
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Status</label>
                                                <select name="partstatus" class="form-control" required />
													<option value="">partstatus</option>
                                                    
                                                        <option value="Pending"<?php if($partstatus=="Pending") echo 'selected="selected"'; ?>>Pending</option>
                                                        <option value="Finished"<?php if($partstatus=="Finished") echo 'selected="selected"'; ?>>Finished</option>
                                                    
                                                      
												</select>                                                   </div>
                                        </div>
                                        
                                        </div>
			
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Start time</label>
                                                <input type="time" autofocus name="partstarttime" class="form-control"  value="<?php echo $partstarttime; ?>" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                        <div class="form-group">
                                                <label style="color: #333">End time</label>
                                                <input type="time" autofocus name="partendtime" class="form-control"  value="<?php echo $partendtime; ?>" />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                        <div class="form-group">
                                                <label style="color: #333">Deadline time</label>
                                                <input type="time" autofocus name="partdeadlinetime" class="form-control"  value="<?php echo $partdeadlinetime; ?>" />
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Assign</label>
                                                <select name="partassign" class="form-control" required />
													<option value="">Assign</option>
                                                    
                                                        <option value="Yes"<?php if($partassign=="Yes") echo 'selected="selected"'; ?>>Yes</option>
                                                        <option value="No"<?php if($partassign=="No") echo 'selected="selected"'; ?>>No</option>
                                                    
                                                      
												</select>                                                   </div>
                                        </div>
                                        
                                        </div>
									
									<div class="row"></div>
									
                                  <input type="submit" name="update" style="background: #FF5722; border: 1px solid #FF5722" value="Update" class="btn btn-info btn-fill pull-left" />
                                    <div class="clearfix"></div>
                                </form>
                                

        <footer class="footer">
            <div class="container-fluid">
                
                <p class="copyright pull-right">
                    &copy; <?php echo strftime("%Y", time())?> <a href="index.php">Work</a>
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
