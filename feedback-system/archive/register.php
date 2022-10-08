<html>
	<head>
		  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    
		<title>Soil-data</title>
		<style type="text/css" media="all">
		@import "signup.css";
	</style>
	  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		 <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<script type="text/javascript" src="engine1/jquery.js"></script>
		<script src="jquery-2.2.0.js"></script>
		<script src="jquery.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src="js/gen_validatorv4.js"></script>
	</head>
	<body>
		<div class="container">
		
			<center>
			<div style="font-size:30px;color:white;font-family:Square721 Cn BT;background-color:#438599;" >Soil-data</a></div>
				<section id="banner" class="banner">
				<div style="background-color:#438599;">
			
			  
			  	<div class="col-md-12">
				    <div class="navbar-header">
				      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				        <span class="icon-bar"></span>
				      </button>
				     
				    </div>

				    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
				      <ul class="nav navbar-nav">
				        <li class="active"><a href="index.php">Home</a></li>
				       
					</div>
				</div>	
			
		</div>	
				<h2 style="font-size:30px;color:black;font-family:Square721 Cn BT;">Sign Up!</h2>
				<div>
					<form id="user"  name="userform" method="post" action="user_reg.php" class="x">
					
						<span style=" color:#0e0c51; font-size:25px;font-weight: bold; ">User Signup</span><br><br>
						<div class="col-md-4">
						</div>
						<div class="input-group margin-bottom-sm" id="cntr">
							<span class="input-group-addon"><i class="fa fa-id-badge" id="icon"></i></span>
							<input type="text" name="name" placeholder="Name" class="form-control" style="width:400px;" ><br>
							</div>
							<br>
						<div class="col-md-4">
						</div>
						
						<div class="input-group margin-bottom-sm" id="cntr">
							<span class="input-group-addon"><i class="fa fa-user-circle" id="icon"></i></span>
							<input type="text" name="user" placeholder="Username" class="form-control" style="width:400px;" req><br>
						</div>
							<br>
						<div class="col-md-4">
						</div>
						<div class="input-group margin-bottom-sm" id="cntr">
							<span class="input-group-addon"><i class="fa fa-envelope" id="icon"></i></span>
							<input type="text" name="email" placeholder="Email Address" class="form-control" style="width:400px;" ><br>
							</div>
							<br>
							<div class="col-md-4">
						</div>
						
							<div class="input-group margin-bottom-sm" id="cntr">
							<span class="input-group-addon"><i class="fa fa-phone" id="icon"></i></span>
							<input type="text" name="cno" placeholder="Contact Number" class="form-control" style="width:400px;" ><br>
							</div>
							<br>
							<div class="col-md-4">
						</div>
						<div class="input-group margin-bottom-sm" id="cntr">
							<span class="input-group-addon"><i class="fa fa-briefcase" id="icon"></i></span>
							<input type="password" name="pass" placeholder="Password" class="form-control" id="pass1" style="width:400px;"><br>
						</div>
							<br>
						<div class="col-md-4">
						</div>
						<div class="input-group margin-bottom-sm" id="cntr">
							<span class="input-group-addon"><i class="fa fa-briefcase" id="icon"></i></span>
							<input type="password" name="cpass" placeholder="Confirm Password" class="form-control" id="cpass1" style="width:400px;"><br>
						</div>
						<br>
						<br>
						<br>
						<script>
							var fv = new Validator("userform");
							fv.addValidation("user","req");
							fv.addValidation("pass","minlen=8", "Password too short");
							fv.addValidation("cpass","minlen=8", "Confirm your password");
							fv.addValidation("name","req");
							fv.addValidation("cno","minlen=10","Invalid contact number");
							fv.addValidation("email","email");
						</script>
						<br>
						<input type="submit" name="submit" value="submit" class="button">
						<input type="reset" name="reset" value="reset" class="button">
					</div>	
					</form>
					
				</div>
		</div>
	
	</body>
</html>