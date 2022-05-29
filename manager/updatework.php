<?php 
	
	session_start();
	require "includes/db.php";
	require "includes/functions.php";
    $phone=$_GET["phone"];
    $name=$_GET["name"];
    if(!isset($_SESSION['managerid'])) {
        header("location: logout.php");
    }
	$sql1="select * from work_tb where work_id='".$_GET['requestid']."'";
     $result1=$db->query($sql1);
    if($result1->num_rows >0)
    { while($row1 =$result1->fetch_assoc())
    {
    
        $status=$row1['work_status'];
        $rate=$row1['work_rate'];
        $payment=$row1['work_payment'];
        $startdate=$row1['work_startdate'];
        $deadlinedate=$row1['work_deadlinedate'];
        $enddate=$row1['work_enddate'];
       
    }
}
$sum=0;
	 if (  isset ( $_POST["update"]))
	  {
        
		  if($_POST["update"]=="Update")
		  { 
             if ((($_POST["rate"])=="") && (($_POST["enddate"])==""))
            {
                $sql = "UPDATE work_tb SET work_status='".$_POST["status"]."',work_payment='".$_POST["payment"]."',work_startdate='".$_POST["startdate"]."',work_deadlinedate='".$_POST["deadlinedate"]."'where work_id='".$_GET["requestid"]."'";
                if($db->query($sql) == TRUE)
                {
                    if($_POST["status"]=="Finished")
                    {
                        
    
                        $sql11="SELECT part_rate from `part_tb` where work_id = '".$_GET['requestid']."'";
                        $result11=$db->query($sql11);
                        if($result11->num_rows >0)
                        { 
                            while($row11 =$result11->fetch_assoc())
                         {
                            $sum=$sum+$row11['part_rate'];
    
                         }
                        }
    
                        
                $sql12 = "UPDATE work_tb SET work_rate ='".$sum."' where work_id = '".$_GET['requestid']."'";
                if($db->query($sql12) == TRUE)
                {  
                    
                    $fields = array(
                        "message" => "Hi ".$name.", Your order has been completed. Total amount is Rs .".$sum,
                        "language" => "english",
                        "route" => "q",
                        "numbers" => $phone,
                    );
                    
                    $curl = curl_init();
                    
                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 30,
                      CURLOPT_SSL_VERIFYHOST => 0,
                      CURLOPT_SSL_VERIFYPEER => 0,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "POST",
                      CURLOPT_POSTFIELDS => json_encode($fields),
                      CURLOPT_HTTPHEADER => array(
                        "authorization: FTlEVBeoJ4L83nsSC6XfwzOxtQMkIvPR70rKWUHDgd9c2GhYqyi48lg27bRLPcuwKmBh9qa0pMXn5vzZ",
                        "accept: */*",
                        "cache-control: no-cache",
                        "content-type: application/json"
                      ),
                    ));
                    
                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    
                    curl_close($curl);
                    
                    if ($err) {
                      echo "cURL Error #:" . $err;
                    } else {
                      echo $response;
                    }
                      
                           }
                        }
                    ?> <script> alert("Work is updated successfully!!"); 
               // window.location.href="work.php";
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
                { 
                    if($_POST["status"]=="Finished")
                    {
                        
    
                        $sql11="SELECT part_rate from `part_tb` where work_id = '".$_GET['requestid']."'";
                        $result11=$db->query($sql11);
                        if($result11->num_rows >0)
                        { 
                            while($row11 =$result11->fetch_assoc())
                         {
                            $sum=$sum+$row11['part_rate'];
    
                         }
                        }
    
                        
                $sql12 = "UPDATE work_tb SET work_rate ='".$sum."' where work_id = '".$_GET['requestid']."'";
                if($db->query($sql12) == TRUE)
                {  
                
                    $fields = array(
                        "message" => "Hi ".$name.", Your order has been completed. Total amount is Rs .".$sum,
                        "language" => "english",
                        "route" => "q",
                        "numbers" => $phone,
                    );
                    
                    $curl = curl_init();
                    
                    curl_setopt_array($curl, array(
                      CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
                      CURLOPT_RETURNTRANSFER => true,
                      CURLOPT_ENCODING => "",
                      CURLOPT_MAXREDIRS => 10,
                      CURLOPT_TIMEOUT => 30,
                      CURLOPT_SSL_VERIFYHOST => 0,
                      CURLOPT_SSL_VERIFYPEER => 0,
                      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                      CURLOPT_CUSTOMREQUEST => "POST",
                      CURLOPT_POSTFIELDS => json_encode($fields),
                      CURLOPT_HTTPHEADER => array(
                        "authorization: FTlEVBeoJ4L83nsSC6XfwzOxtQMkIvPR70rKWUHDgd9c2GhYqyi48lg27bRLPcuwKmBh9qa0pMXn5vzZ",
                        "accept: */*",
                        "cache-control: no-cache",
                        "content-type: application/json"
                      ),
                    ));
                    
                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    
                    curl_close($curl);
                    
                    if ($err) {
                      echo "cURL Error #:" . $err;
                    } else {
                      echo $response;
                    }
                       
                                           
                           }
                        }?> <script> alert("Work is updated successfully!!"); 
               // window.location.href="work.php";
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

			{
                if($_POST["status"]=="Finished")
                {
                    

                    $sql11="SELECT part_rate from `part_tb` where work_id = '".$_GET['requestid']."'";
                    $result11=$db->query($sql11);
                    if($result11->num_rows >0)
                    { 
                        while($row11 =$result11->fetch_assoc())
                     {
                        $sum=$sum+$row11['part_rate'];

                     }
                    }

                    
			$sql12 = "UPDATE work_tb SET work_rate ='".$sum."' where work_id = '".$_GET['requestid']."'";
			if($db->query($sql12) == TRUE)
			{  
                $fields = array(
                    "message" => "Hi ".$name.", Your order has been completed. Total amount is Rs .".$sum,
                    "language" => "english",
                    "route" => "q",
                    "numbers" => $phone,
                );
                
                $curl = curl_init();
                
                curl_setopt_array($curl, array(
                  CURLOPT_URL => "https://www.fast2sms.com/dev/bulkV2",
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_ENCODING => "",
                  CURLOPT_MAXREDIRS => 10,
                  CURLOPT_TIMEOUT => 30,
                  CURLOPT_SSL_VERIFYHOST => 0,
                  CURLOPT_SSL_VERIFYPEER => 0,
                  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                  CURLOPT_CUSTOMREQUEST => "POST",
                  CURLOPT_POSTFIELDS => json_encode($fields),
                  CURLOPT_HTTPHEADER => array(
                    "authorization: FTlEVBeoJ4L83nsSC6XfwzOxtQMkIvPR70rKWUHDgd9c2GhYqyi48lg27bRLPcuwKmBh9qa0pMXn5vzZ",
                    "accept: */*",
                    "cache-control: no-cache",
                    "content-type: application/json"
                  ),
                ));
                
                $response = curl_exec($curl);
                $err = curl_error($curl);
                
                curl_close($curl);
                
                if ($err) {
                  echo "cURL Error #:" . $err;
                } else {
                  echo $response;
                }
                       }
                    }
                
                ?> <script> alert("Work is updated successfully!!"); 
            window.location.href="work.php";
            </script><?php
			}
			else
			{ ?> <script> alert("Error!!"); </script><?php
				echo " ".$db->error; } }}}
                

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
                    <a class="navbar-brand" href="#" style="color: #fff;">UPDATE WORK</a>
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
				

                                    <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Work Status</label>
                                                <select name="status" class="form-control" required />
													<option value="">Work Status</option>
                                                    
                                                        <option value="Pending"<?php if($status=="Pending") echo 'selected="selected"'; ?>>Pending</option>
                                                        <option value="Finished"<?php if($status=="Finished") echo 'selected="selected"'; ?>>Finished</option>
                                                    
                                                      
												</select>                                            </div>
                                        </div>


									<div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Rate</label>
                                                <input type="text" autofocus name="rate" class="form-control" value="<?php echo $rate; ?>"/>
                                            </div>
                                        </div>
                                       
                                        
                                    
                                     
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Payment Status</label>
                                                <select name="payment" class="form-control" required />
													<option value="">Payment Status</option>
                                                    
                                                        <option value="Pending"<?php if($payment=="Pending") echo 'selected="selected"'; ?>>Pending</option>
                                                        <option value="Finished"<?php if($payment=="Finished") echo 'selected="selected"'; ?>>Finished</option>
                                                    
                                                      
												</select>                                                   
                                                <!-- </div> -->
                                        </div>
                                       
                                    </div>
									
		
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Start Date</label>
                                                <input type="date" autofocus name="startdate" class="form-control" value="<?php echo $startdate; ?>"  />
                                            </div>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">Deadline Date</label>
                                                <input type="date" autofocus name="deadlinedate" class="form-control" value="<?php echo $deadlinedate; ?>"   />
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label style="color: #333">End Date</label>
                                                <input type="date" autofocus name="enddate" class="form-control" value="<?php echo $enddate; ?>"  />
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
