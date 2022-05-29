<?php 
	
	session_start();
	require "includes/db.php";
	require "includes/functions.php";

    if(!isset($_SESSION['adminid'])) {
        header("location: logout.php");
    }
	$sql1="select * from manager_tb where manager_id='".$_GET['requestid']."'";
     $result1=$db->query($sql1);
    if($result1->num_rows >0)
    { while($row1 =$result1->fetch_assoc())
    {
       
        $dol=$row1['manager_dol'];
        $salary=$row1['manager_salary'];
       
    }
}
/******* if (  isset ( $_POST["update"]))
	  {
		  if($_POST["update"]=="Update")
		  { 
             if ((($_POST["rate"])=="") && (($_POST["enddate"])==""))
            {
                $sql = "UPDATE work_tb SET work_status='".$_POST["status"]."',work_payment='".$_POST["payment"]."',work_startdate='".$_POST["startdate"]."',work_deadlinedate='".$_POST["deadlinedate"]."'where work_id='".$_GET["requestid"]."'";
                if($db->query($sql) == TRUE)
                { ?> <script> alert("Work is updated successfully!!"); 
                window.location.href="work.php";
                </script><?php
                }
                else
                { ?> <script> alert("Error!!"); </script><?php
                    echo " ".$db->error; }
            }
		    else if(($_POST["rate"])=="")
            {
                $sql = "UPDATE work_tb SET work_status='".$_POST["status"]."',work_payment='".$_POST["payment"]."',work_startdate='".$_POST["startdate"]."',work_deadlinedate='".$_POST["deadlinedate"]."',work_enddate='".$_POST["enddate"]."'where work_id='".$_GET["requestid"]."'";
                if($db->query($sql) == TRUE)
                { ?> <script> alert("Work is updated successfully!!"); 
                window.location.href="work.php";
                </script><?php
                }
                else
                { ?> <script> alert("Error!!"); </script><?php
                    echo " ".$db->error; }
            }
           
            else if(($_POST["enddate"])=="") 
            {
                $sql = "UPDATE work_tb SET work_status='".$_POST["status"]."',work_rate='".$_POST["rate"]."',work_payment='".$_POST["payment"]."',work_startdate='".$_POST["startdate"]."',work_deadlinedate='".$_POST["deadlinedate"]."'where work_id='".$_GET["requestid"]."'";
                if($db->query($sql) == TRUE)
                { ?> <script> alert("Work is updated successfully!!"); 
                window.location.href="work.php";
                </script><?php
                }
                else
                { ?> <script> alert("Error!!"); </script><?php
                    echo " ".$db->error; } 
            }
          
            else
            {
			$sql = "UPDATE work_tb SET work_status='".$_POST["status"]."',work_rate='".$_POST["rate"]."',work_payment='".$_POST["payment"]."',work_startdate='".$_POST["startdate"]."',work_deadlinedate='".$_POST["deadlinedate"]."',work_enddate='".$_POST["enddate"]."'where work_id='".$_GET["requestid"]."'";
			if($db->query($sql) == TRUE)
			{ ?> <script> alert("Work is updated successfully!!"); 
            window.location.href="work.php";
            </script><?php
			}
			else
			{ ?> <script> alert("Error!!"); </script><?php
				echo " ".$db->error; } }}}
?>*******/
	 if (  isset ( $_POST["update"]))
	  {
		  if($_POST["update"]=="Update")
		  { 
		    if(($_POST["dol"])=="")
            {
			$sql = "UPDATE manager_tb SET manager_salary='".$_POST["salary"]."' where manager_id='".$_GET["requestid"]."'";
			if($db->query($sql) == TRUE)
			{ ?> <script> alert("Manager Updated Successfully!!"); 
            window.location.href="managers.php";
            </script><?php
			}
			else
			{ ?> <script> alert("Error!!"); </script><?php
            echo " ".$db->error; }}
        else
    {
      	$sql = "UPDATE manager_tb SET manager_dol='".$_POST["dol"]."',manager_salary='".$_POST["salary"]."' where manager_id='".$_GET["requestid"]."'";
			if($db->query($sql) == TRUE)
			{ ?> <script> alert("Manager Updated Successfully!!"); 
            window.location.href="managers.php";
            </script><?php
			}
			else
			{ ?> <script> alert("Error!!"); </script><?php
            echo " ".$db->error; }
    } }}
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
                    <a class="navbar-brand" href="#" style="color: #fff;">UPDATE MANAGER</a>
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
                                    </div>
									
									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Date of Leaving</label>
                                                <input type="date" autofocus name="dol" class="form-control"  />
                                            </div>
                                        </div>
                                       
                                        
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Salary</label>
                                                <input type="number" autofocus name="salary" class="form-control" placeholder="Enter Salary" required value="<?php echo $salary; ?>"/>
                                            </div>
                                        </div>
                                        
                                       
									<div class="row"></div>
                                   <input type="submit" name="update" style="background: #FF5722; border: 1px solid #FF5722" value="Update" class="btn btn-info btn-fill pull-left" />
                                    <div class="clearfix"></div>
                                </form>
                               


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
