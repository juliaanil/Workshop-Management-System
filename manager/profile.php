<?php 
	
	session_start();
	require "includes/db.php";
	require "includes/functions.php";

    if(!isset($_SESSION['managerid'])) {
        header("location: logout.php");
    }
	
	 /*if (  isset ( $_POST["submit"]))
	  {
		  if($_POST["submit"]=="Submit")
		  { 
		     if($_POST["name"]!=" ")
		  { 
			
			$sql = "INSERT INTO staff_tb (staff_email,staff_password,staff_name,staff_phone,staff_address,staff_doj,staff_salary,mgr_id) VALUES ('".$_POST["email"]."','".$_POST["password"]."','".$_POST["name"]."','".$_POST["phone"]."','".$_POST["address"]."','".$_POST["doj"]."','".$_POST["salary"]."','".$_POST["manager"]."')";
			if($db->query($sql) == TRUE)
			{ ?> <script> alert("Staff Added Successfully!!"); </script><?php
			}
			else
			{ ?> <script> alert("Error!!"); </script><?php
				echo " ".$db->error; }}else { ?> <script> alert("Staff name is empty!! "); </script><?php } }}*/
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
        <nav class="navbar navbar-default navbar-fixed" style="background: #FF0000;">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar" style="background: #fff;"></span>
                        <span class="icon-bar" style="background: #fff;"></span>
                        <span class="icon-bar" style="background: #fff;"></span>
                    </button>
                    <a class="navbar-brand" href="#" style="color: #fff;">MY PROFILE</a>
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
                                <!-- <h4 class="title">Add Staff</h4> -->
                            </div>
                            <div class="content">
                                <form method="post"  enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
											
											
										
                                            
                                        </div>
                                    </div>
									
									
<!-- 									
									<div class="row"></div>
									
                                  <input type="submit" name="submit" style="background: #FF5722; border: 1px solid #FF5722" value="Submit" class="btn btn-info btn-fill pull-left" />
                                    <div class="clearfix"></div> -->
                                </form>
                                <form method="post" name="view">
                                <br><u><b>MY DETAILS</b></u><br><br>
                                <!-- <div class="col-md-12"> -->
                                            <div class="search">
                                                <!-- <label style="color: #333">Search</label> -->
                                                <!-- <input type="search" autofocus name="Search"  placeholder="Search Here" required /> -->
                                                <!-- <input type="submit" name="submit" style="background: #FF5722; border: 1px solid #FF5722" value="Submit"  /> -->

                                            </div>
                                            
<br><br>
                                
                                <?php
                                $sql1="select * from manager_tb where manager_id='".$_SESSION["managerid"]."'";
						$result1=$db->query($sql1);
						if($result1->num_rows >0)
						{?> <table class="table table-bordered thead-warning">
                    <tr>
                      
                     
                      <td><b>Name</b></td>
                      <td><b>Email</b></td>
                      <td><b>Addres</td>
                      <td><b>Phone</b></td>
                      <td><b>Date of joining</b></td>
                      <!-- <td><b>Date of leaving</b></td> -->
                      <td><b>Salary</b></td>
                      

                      <td><b>Action</b></td>
                    </tr> <?php 
						while($row =$result1->fetch_assoc())
						{
			  ?>
              <tr>
               
                <td><?php echo $row["manager_name"]; ?></td>
                <td><?php echo $row["manager_email"]; ?></td>
                <td><?php echo $row["manager_address"]; ?></td>
                <td><?php echo $row["manager_phone"]; ?></td>
                <td><?php echo $row["manager_doj"]; ?></td>
                <!-- <td><?php echo $row["manager_dol"]; ?></td> -->
                <td><?php echo $row["manager_salary"]; ?></td>
                <td> <?php if($row["manager_dol"]==NULL ){?>  <a class="btn btn-info btn-fill" href="updateprofile.php?requestid=<?php echo $row["manager_id"];?>" onclick="return confirm('Are you sure you want to update your profile?');">Update </a><?php } else {echo " - ";}?></td>
              
             </tr>
              <?php
						}
						}
						else {  echo "NO STAFF ADDED YET!";}
						?>
            </table>
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
