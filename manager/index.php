<?php 
	
	session_start();
	require "includes/db.php";
	require "includes/functions.php";
    if(isset($_SESSION['managerid'])) {
        header("location: profile.php");
    }
	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		if(isset($_POST['submit'])) {
			
			$email = $_POST['email'];
			$pass = $_POST['password'];
			
			if($email != "" && $pass != "") {
				
				$verify = $db->query("SELECT * FROM manager_tb WHERE manager_email='$email' AND manager_password='$pass' LIMIT 1");
				
				if($verify->num_rows) {
					
					$row = $verify->fetch_assoc();
					$_SESSION['managerid']=$row["manager_id"];
					$_SESSION['managername']=$row["manager_name"];
					$_SESSION['manageremail']=$row['manager_email'];
					$_SESSION['password']= $row['manager_password'];
                    header("location:profile.php");
					
					//echo "LOGGED IN";
					
				}else{
					
					echo "<script>alert('Invalid login credentials. Please try again')</script>";
					
				}
				
			}else{
				
				echo "<script>alert('Some fields are empty. All fields required!')</script>";
				
			}
			
		}
		
	}
	
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

<div class="login_wrapper">
	
	<div class="login_holder">
			
		<form method="post" action="index.php">
			
			<div class="header">
				<h4 style="border-bottom: 1px solid #FFFFFF;" class="title">Manager Login</h4>
			</div>
			
			<div class="form-group" method="post" action="#">
			<p class="oblique"><label>Email</label></p>
			
  
		<!-- <p style = "font-family:georgia,garamond,serif;font-size:16px;font-style:italic;">
         This is demo text
      </p> -->
				<input type="text" name="email" class="form-control" placeholder="Enter your Email" autofocus>
			</div>
			
			<div class="form-group">
			<p class="oblique"><label>Password</label></p>
				<input type="password" name="password" class="form-control" placeholder="Enter your password">
			</div>
			
			<!--<p><a style="color: #FF5722;" href="register.php">No account yet! Click Here to register</a></p>-->
			
			<input type="submit" name="submit" value="Login" class="btn btn-info btn-fill pull-right" style="background: #00FF00; border-color: #000000;" />
			<div class="clearfix"></div>
			
		</form>
		
	</div>
	
</div>

</body>

</html>