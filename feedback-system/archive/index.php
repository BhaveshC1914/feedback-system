<?php
	session_start();
	error_reporting(0);
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Soil-data</title>
    
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="js/gen_validatorv4.js"></script>
	
	</script>
  </head>
  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
  	<!--banner-->
	<section id="banner" class="banner">
		<div class="bg-color">
			<nav class="navbar navbar-default navbar-fixed-top">
			  <div class="container">
			  	<div class="col-md-12">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				      <a class="navbar-brand" href="#"><div style="font-size:30px;color:white;font-family:Square721 Cn BT;">Soil-Data</div></a>
					</div>
				    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
				      <ul class="nav navbar-nav">
				        <li ><a href="index.php">Home</a></li>
				        <li ><a href="#service">Services</a></li>
				       	<li ><a href="#about">About</a></li>
				        <li ><a href="#contact">Contact</a></li>
				       	<li ><a href="admin/index.php">Admin / Observer</a></li>
				        <li ><a href="register.php">Sign Up</a></li>
				       <div class="popup" id="lst" onclick="popupShow()"><a style="text-decoration:none;color:white;display:flex;margin-top:14px;font-size:14px;margin-left:14px;">LOGIN</a>
				      		<div class="popuptext" id="myPopup" value="pops" onclick="popupStay()">
								  <br>
								<?php
								  if($_SESSION['uname']==''){
									echo '<form action="login_php.php" method="post" role="form" class="contactForm">
									<div class="form-group">
										<input type="text" class="form-control br-radius-zero" name="usr" id="Userid" placeholder="Username" data-rule="minlen:4" data-msg="User ID Incorrect" />
										<div class="validation"></div>
									</div>
									<div class="form-group">
										<input type="password" name="pass" class="form-control br-radius-zero" id="password" placeholder="Password" data-rule="minlen:4" data-msg="Password Incorrect" />
										<div class="validation"></div>
									</div>
									<div class="form-action">
										<input type="submit" value="submit" class="btn btn-form" name="submit">
									</div>
									
									</form>';
								  }else{
									echo '<h3 style="color:white">login as <a style="color:red" href="user_home.php">'.$_SESSION['uname'].'</a></h3>';
								  }
								?>
							</div>
				        </div>
				      </ul>
				    </div>
				</div>
			  </div>
			  
			</nav>

			<div class="container">
				<div class="row">
					<div class="banner-info">
						<div class="banner-logo text-center">
							<div id="bup" style="font-size:45px;color:white;font-family:Square721 Cn BT;">Soil-Data</div><br>
						</div>
						<div id="bdown" class="banner-text text-center">
							<h1  class="white">Soil data at your desk!!</h1>
						</div>
						<div class="overlay-detail text-center">
			               <a href="#service"><i class="fa fa-angle-down"></i></a>
			             </div>		
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ banner-->
	<!--service-->
	<section id="service" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-sm-4">
					<h2 class="ser-title">Our Services</h2>
					<hr class="botm-line">
					
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="service-info">
						<div class="icon">
							<i class="fa fa-stethoscope"></i>
						</div>
						<div class="icon-info">
							<h4>24 Hour Support</h4>
							<p>Access to your soil data anywhere and anytime.</p>
						</div>
					</div>
					<div class="service-info">
						<div class="icon">
							<i class="fa fa-ambulance"></i>
						</div>
						<div class="icon-info">
							<h4>Emergency Services</h4>
							<p>Delivery of sample reports in case of emergency.</p>
						</div>
					</div>
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="service-info">
						<div class="icon">
							<i class="fa fa-user-md"></i>
						</div>
						<div class="icon-info">
							<h4>Sample Testing</h4>
							<p>Submit your soil sample today.</p>
						</div>
					</div>
					<div class="service-info">
						<div class="icon">
							<i class="fa fa-medkit"></i>
						</div>
						<div class="icon-info">
							<h4>Secure soil records</h4>
							<p>Your soil records are safe with us.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	
	
	<!--/ doctor team-->
	<!--testimonial-->
	<section id="testimonial" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="ser-title">see what people are saying?</h2>
					<hr class="botm-line">
				</div>
				<div class="col-md-4 col-sm-4">
					<div class="testi-details">
						<!-- Paragraph -->
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<div class="testi-info">
						<!-- User Image -->
						<a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
						<!-- User Name -->
						<h3>Alex<span>Texas</span></h3>
					</div>
				</div>
			    <div class="col-md-4 col-sm-4">
					<div class="testi-details">
						<!-- Paragraph -->
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<div class="testi-info">
						<!-- User Image -->
						<a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
						<!-- User Name -->
						<h3>Alex<span>Texas</span></h3>
					</div>
				</div>
			    <div class="col-md-4 col-sm-4">
					<div class="testi-details">
						<!-- Paragraph -->
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					</div>
					<div class="testi-info">
						<!-- User Image -->
						<a href="#"><img src="img/thumb.png" alt="" class="img-responsive"></a>
						<!-- User Name -->
						<h3>Alex<span>Texas</span></h3>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="about" class="section-padding" style="background-color:black;">
		<div class="container"> 
			<div class=" row">
				<div class="col-md-2"></div>
	            <div class="text-right-md col-md-4 col-sm-4">
	              <h2 class="section-title white lg-line">« A few words<br> about us »</h2>
	            </div>
	            <div class="col-md-4 col-sm-5">
					Group of IT students who want to serve society by creating systems helpful for human betterment.
	              <p class="text-right text-primary"><i>—Group</i></p>
	            </div>
	            <div class="col-md-2"></div>
	        </div>
		</div>
	</section>
	<section id="contact" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="ser-title">Contact us</h2>
					<hr class="botm-line">
				</div>
				<div class="col-md-4 col-sm-4">
			      <h3>Contact Info</h3>
			      <div class="space"></div>
			      <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>Nagpur M.H India<br>
			       </p>
			      <div class="space"></div>
			      <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>info@soildata.com</p>
			      <div class="space"></div>
			      <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+91-9090909092</p>
			    </div>
				<div class="col-md-8 col-sm-8 marb20">
					<div class="contact-info">
							<h3 class="cnt-ttl">Having Any Query! Contact us...</h3>
							<div class="space"></div>
                            <div id="sendmessage">Your message has been sent. Thank you!</div>
                            <div id="errormessage"></div>

							<!--feedback-->

							<form action="contact.php" method="post" role="form" class="contactForm" name="contact">
							    <div class="form-group">
                                    <input type="text" name="name" class="form-control br-radius-zero" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control br-radius-zero" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control br-radius-zero" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                    <div class="validation"></div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control br-radius-zero" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                    <div class="validation"></div>
                                </div>
                                <script>
									var fv = new Validator("contact");
									fv.addValidation("name","req");
									fv.addValidation("email","email");
									fv.addValidation("subject", "req");
									fv.addValidation("message","req");
								</script>
								<div class="form-action">
									<button type="submit" class="btn btn-form">Send Message</button>
								</div>
							</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--/ contact-->
	<!--footer-->
	<footer id="footer">
		<div class="top-footer">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-sm-4 marb20">
							<div class="ftr-tle">
								<h4 class="white no-padding">About Us</h4>
							</div>
							<div class="info-sec">
								<p>We are IT students who wants to create systems for human betterment.</p>
							</div>
					</div>
					<div class="col-md-4 col-sm-4 marb20">
						<div class="ftr-tle">
							<h4 class="white no-padding">Quick Links</h4>
						</div>
						<div class="info-sec">
							<ul class="quick-info">
								<li><a href="index.php"><i class="fa fa-circle"></i>Home</a></li>
								<li><a href="#service"><i class="fa fa-circle"></i>Service</a></li>
								<li><a href="#contact"><i class="fa fa-circle"></i>Contact</a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 col-sm-4 marb20">
						<div class="ftr-tle">
							<h4 class="white no-padding">Follow us</h4>
						</div>
						<div class="info-sec">
							<ul class="social-icon">
								<li class="bglight-blue"><i class="fa fa-facebook"></i></li>
								<li class="bgred"><i class="fa fa-google-plus"></i></li>
								<li class="bgdark-blue"><i class="fa fa-linkedin"></i></li>
								<li class="bglight-blue"><i class="fa fa-twitter"></i></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-line">
			<div class="container">
				<div class="row">
					<div class="col-md-12 text-center">
						© Copyright Soil-data. All Rights Reserved 2017
                        <div class="credits">
                            
                           
                        </div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!--/ footer -->
    
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>