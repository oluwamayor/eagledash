<?php
// include database connection file
include_once("config.php");
$success_message = "";
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
	$id = $_POST['id'];

    $fname = $con -> real_escape_string($_POST['fname']);
    $lname = $con -> real_escape_string($_POST['lname']);
    $email = $con -> real_escape_string($_POST['email']);
    $phone = $con -> real_escape_string($_POST['phone']);
    $branch= $con -> real_escape_string($_POST['branch']);
    $msg =   $con -> real_escape_string($_POST['msg']);

	// update user data
	$result = mysqli_query($con, "UPDATE appointment SET fname='$fname',lname='$lname',email='$email',phone='$phone',branch='$branch',msg='$msg' WHERE id=$id");

	// Redirect to homepage to display updated user in list
    if($result)
    {
        $success_message = "Appointment updated ";
        // header( "refresh:2;url=doctor-dashboard.php" );
    }
	
}
?>
<?php
// Display selected user data based on id
// Getting id from url

$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($con, "SELECT * FROM appointment WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
	$fname = $user_data['fname'];
	$lname = $user_data['lname'];
	$email = $user_data['email'];
    $phone = $user_data['phone'];
	$branch = $user_data['branch'];
	$msg = $user_data['msg'];
}
?>
<!DOCTYPE html> 
<html lang="en">

<head>
		<meta charset="utf-8">
		<title>Doccure</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
		
		<!-- Favicons -->
		<link href="assets/img/favicon.png" rel="icon">
		
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
		<link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
		
		<!-- Main CSS -->
		<link rel="stylesheet" href="assets/css/style.css">
		
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
			<script src="assets/js/html5shiv.min.js"></script>
			<script src="assets/js/respond.min.js"></script>
		<![endif]-->
	
	</head>
	<body class="account-page">

		<!-- Main Wrapper -->
		<div class="main-wrapper">
		
			<!-- Header -->
			<header class="header">
				<nav class="navbar navbar-expand-lg header-nav">
					<div class="navbar-header">
						<a id="mobile_btn" href="javascript:void(0);">
							<span class="bar-icon">
								<span></span>
								<span></span>
								<span></span>
							</span>
						</a>
						<a href="index.html" class="navbar-brand logo">
							<img src="assets/img/logo.png" class="img-fluid" alt="Logo">
						</a>
					</div>
			
				</nav>
			</header>
			<!-- /Header -->
			
			<!-- Page Content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-8 offset-md-2">
						
							<!-- Account Content -->
							<div class="account-content">
								<div class="row align-items-center justify-content-center">
									<div class="col-md-7 col-lg-6 login-left">
										<img src="assets/img/login-banner.png" class="img-fluid" alt="Login Banner">	
									</div>
									<div class="col-md-12 col-lg-6 login-right">
										<div class="login-header">
											<h3>Add Patient Appointment </h3>
										</div>
										
										<!-- Register Form -->
										<form name="update_user" method="post" action="edit.php">
                                        <?php 
					// Display Success message
					if(!empty($success_message)){
					?>
						<div class="alert alert-success">
						  	<strong>Success!</strong> <?= $success_message ?>
						</div>

					<?php
					}
					?>
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" name="fname" value=<?php echo $fname;?>>
												<label class="focus-label">First Name</label>
											</div>
											<div class="form-group form-focus">
												<input type="text" class="form-control floating" name="lname" value=<?php echo $lname;?>>
												<label class="focus-label">Last Name</label>
											</div>
											<div class="form-group form-focus">
												<input type="email" class="form-control floating" name="email" value=<?php echo $email;?>>
												<label class="focus-label">Email</label>
											</div>

                                            <div class="form-group form-focus">
												<input type="number" class="form-control floating" name="phone" value=<?php echo $phone;?>>
												<label class="focus-label">Phone</label>
											</div>

                                            <div class="form-group form-focus">
                                            <select name="branch" class="form-control floating" name="branch">
					    	<option selected="" value=<?php echo $branch;?>></option>
					    	<option value="Ikeja"> Ikeja Office</option>
					    	<option value="VI"> Victoria Island Office</option>
					    	<option value="Gbagada"> Gbagada Office</option>
					    </select>
                        <label class="focus-label">Branch</label>
											</div>

                                            <div class="form-group form-focus">
                                            <textarea  class="form-control floating" style="overflow:hidden;height:100px" name="msg">
                                            <?php echo $msg;?>
                                            </textarea>
												<label class="focus-label">Drop Your Message</label>
											</div>
											<br><br>
                                            <div>
                                            <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
                                            <button class="btn btn-primary btn-block btn-lg login-btn" type="submit" name="update">Update Appointment Changes</button>
                                            </div>
										
											
										</form>
										<!-- /Register Form -->
										
									</div>
								</div>
							</div>
							<!-- /Account Content -->
								
						</div>
					</div>

				</div>

			</div>		
			<!-- /Page Content -->
   
			<!-- Footer -->
			<footer class="footer">
				
				<!-- Footer Top -->
				<div class="footer-top">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-about">
									<div class="footer-logo">
										<img src="assets/img/footer-logo.png" alt="logo">
									</div>
									<div class="footer-about-content">
										<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
										<div class="social-icon">
											<ul>
												<li>
													<a href="#" target="_blank"><i class="fab fa-facebook-f"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-twitter"></i> </a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-linkedin-in"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-instagram"></i></a>
												</li>
												<li>
													<a href="#" target="_blank"><i class="fab fa-dribbble"></i> </a>
												</li>
											</ul>
										</div>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Patients</h2>
									<ul>
										<li><a href="search.html">Search for Doctors</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="register.html">Register</a></li>
										<li><a href="booking.html">Booking</a></li>
										<li><a href="patient-dashboard.html">Patient Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-menu">
									<h2 class="footer-title">For Doctors</h2>
									<ul>
										<li><a href="appointments.html">Appointments</a></li>
										<li><a href="chat.html">Chat</a></li>
										<li><a href="login.html">Login</a></li>
										<li><a href="doctor-register.html">Register</a></li>
										<li><a href="doctor-dashboard.html">Doctor Dashboard</a></li>
									</ul>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
							<div class="col-lg-3 col-md-6">
							
								<!-- Footer Widget -->
								<div class="footer-widget footer-contact">
									<h2 class="footer-title">Contact Us</h2>
									<div class="footer-contact-info">
										<div class="footer-address">
											<span><i class="fas fa-map-marker-alt"></i></span>
											<p> 3556  Beech Street, San Francisco,<br> California, CA 94108 </p>
										</div>
										<p>
											<i class="fas fa-phone-alt"></i>
											+1 315 369 5943
										</p>
										<p class="mb-0">
											<i class="fas fa-envelope"></i>
											doccure@example.com
										</p>
									</div>
								</div>
								<!-- /Footer Widget -->
								
							</div>
							
						</div>
					</div>
				</div>
				<!-- /Footer Top -->
				
				<!-- Footer Bottom -->
                <div class="footer-bottom">
					<div class="container-fluid">
					
						<!-- Copyright -->
						<div class="copyright">
							<div class="row">
								<div class="col-md-6 col-lg-6">
									<div class="copyright-text">
										<p class="mb-0">&copy; 2020 Doccure. All rights reserved.</p>
									</div>
								</div>
								<div class="col-md-6 col-lg-6">
								
									<!-- Copyright Menu -->
									<div class="copyright-menu">
										<ul class="policy-menu">
											<li><a href="term-condition.html">Terms and Conditions</a></li>
											<li><a href="privacy-policy.html">Policy</a></li>
										</ul>
									</div>
									<!-- /Copyright Menu -->
									
								</div>
							</div>
						</div>
						<!-- /Copyright -->
						
					</div>
				</div>
				<!-- /Footer Bottom -->
				
			</footer>
			<!-- /Footer -->
		   
		</div>
		<!-- /Main Wrapper -->
	  
		<!-- jQuery -->
		<script src="assets/js/jquery.min.js"></script>
		
		<!-- Bootstrap Core JS -->
		<script src="assets/js/popper.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="assets/js/script.js"></script>
		
	</body>

<!-- Mirrored from doccure-html.dreamguystech.com/template/doctor-register.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 09 Feb 2021 22:49:14 GMT -->
</html>