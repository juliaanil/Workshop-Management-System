<?php 
	
	session_start();
    error_reporting(0);
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
                    <a class="navbar-brand" href="#" style="color: #fff;">REPORTS</a>
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
									
									

                                </form>
                                <form method="post" name="view">
                                <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label style="color: #333">From Date</label>
                                                <input type="date" autofocus name="fromdate" class="form-control" required />
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                        <div class="form-group">
                                                <label style="color: #333">To Date</label>
                                                <input type="date" autofocus name="todate" class="form-control" required />
                                            </div>
                                            </div>
                                            <div class="col-md-4">
                                        <div class="form-group">
                                        <br>
                                                <input type="submit" autofocus name="submit" class="btn btn-success btn-block btn-fill form-control" value='submit' required />
                                            </div>
                                            </div>
                                            </div>

                                            
                               
                                            
<br><br>
<?php
 if(isset($_POST["submit"]))
 {
    $serial=1;
     $total=0;
     $count=0;
     $paymentpending=0;
     $paymentfinished=0;
    $prev_date = date('Y-m-d', strtotime($_POST['fromdate'] .' -1 day'));
    $next_date = date('Y-m-d', strtotime($_POST['todate'] .' +1 day'));

     $sql1="select * from work_tb,cust_tb,manager_tb where manager_tb.manager_id=work_tb.mgr_id and cust_tb.cust_id=work_tb.cust_id and work_enddate between '$prev_date' and '$next_date'";
     $result1=$db->query($sql1);
     if($result1->num_rows >0)
     {?> 
     <table class="table table-bordered thead-warning js-serial">
     <!-- <table class="js-serial" > -->

 <tr>
 <td><b>S.No</b></td>
   <td><b>Work ID</b></td>
   <td><b>Description</b></td>
   <td><b>Cutomer</b></td>
   <td><b>Start Date</b></td>
   <td><b>Deadline Date</b></td>
   <td><b>End Date</b></td>
   <!-- <td><b>Work status</b></td> -->
   <td><b>Amount</b></td>
   <td><b>Payment status</b></td>
   
 </tr> <?php 
     while($row =$result1->fetch_assoc())
     {
?>
<tr>
<td><?php echo $serial; ?></td>
<td><?php echo $row["work_id"]; $count=$count+1;?></td>
<td><?php echo $row["work_desc"]; $serial=$serial+1;?></td>
<td><?php echo $row["cust_name"]; ?></td>
<td><?php echo $row["work_startdate"]; ?></td>
<td><?php echo $row["work_deadlinedate"]; ?></td>
<td><?php echo $row["work_enddate"]; ?></td>
<!-- <td><?php echo $row["work_status"]; ?></td> -->
<td><?php echo $row["work_rate"];$total=$total+$row["work_rate"]; ?></td>
<td><?php echo $row["work_payment"]; if($row["work_payment"]=="Pending"){$paymentpending=$paymentpending+1;}else{$paymentfinished=$paymentfinished+1;}?></td>

<!-- <td class="right" colspan="3">Total:</td><td class="right">200</td> -->
<!-- <td class="right" rowspan="8">Total:</td><td class="right">$total</td> -->
</tr>
<?php
     }
     ?>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <td></td>
     <!-- <td></td> -->
     <td></td>
     <td><?php echo "Total :"; ?></td>
     <td><?php echo $total; ?></td>
     <td></td>
     
     <?php
     
    

     }
     else {  echo "NO WORK ADDED YET!";}
     ?>
</table><?php 
/*echo "Total works -".$count; 
echo "<br>";
echo "Total amount received -".$total."Rs";
echo "<br>";
echo "Total works  (payment due)-".$paymentpending;
echo "<br>";
echo "Total works  (payment finished) -".$paymentfinished;*/

 }
 


 ?>          
                               
            <!-- </table> -->
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
