<?php
	session_start();	
?>
<html>
	<head>
		<title>Soil-data</title>
		<style>
			.card1 {
			    /* Add shadows to create the "card" effect */
			    width:400px;
			    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			    transition: 0.3s;
			    padding: 20px;
			    margin: 30px 30px 30px 30px;
			}

			/* On mouse-over, add a deeper shadow */
			.card1:hover {
			    box-shadow: 0 8px 20px 0 rgba(0,0,0,0.2);
			}

			/* Add some padding inside the card container */
			.container1 {
			    padding: 2px 16px;
			}
		</style>
		<style type="text/css" media="all">
		@import "style_ext.css";
		</style>
	 	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    	<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
		<script type="text/javascript" src="engine1/jquery.js"></script>
		<script src="jquery-2.2.0.js"></script>
		<script src="jquery.js"></script>
		<script src="js/jquery.min.js"></script>
	</head>
	<body>
		<div class="container">
		
			<center>
			<div style="height:50px;font-size:30px;color:white;font-family:Square721 Cn BT;background-color:#438599;display:flex;align-items: center;justify-content: center;" >Soil-data</div>
				
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
								<li class="active"><a href="expert.php">Ask Expert</a></li>
				        <li class="active"><a href="logout.php">Logout</a></li>
				       </ul>
					</div>
				</div>	
				</div>
			</center>
			</div>
			<div>
				<section id="search" class="section-padding">
						<div class="container">
							<div class="row">
								<div class="col-md-4 col-sm-4">
									<h2 class="ser-title">Welcome<br><br>
									<?php
										echo " ".$_SESSION['name'];
									?></h2>
									<hr class="botm-line">
									<h4 class="ser-title">Your Samples</h4>
								</div>
								<div class="col-md-4 col-sm-4">
									<div class="search-info">
											<br>
											<?php
									//	isset(submit){
											extract($_GET);
											include("database.php");
											$user_uname = $_SESSION['uname'];
											$sql2 = "SELECT * FROM soil_sample where user_uname='$user_uname'";
											$rs2 = $cn->query($sql2);
											echo '<h3>Soil Sample Cards</h3><br>';
											if ($rs2->num_rows > 0) {
											while($row = $rs2->fetch_assoc()) {
												$uname=$row["user_uname"];
												$sno=$row["sample_no"];
												$f1=$row["magnesium"];
												$f2=$row["nitrogen"];
												$f3=$row["potassium"];
												$f4=$row["phosphorus"];
												//$email=$row["email"];
												echo '<div class="card1">
											  <div class="container1">
											    <h4><b>Sample Number : '.$sno.'</b></h4> 
											    <p><strong>Magnesium extent : '.$f1.'</strong> <br>
												<strong>Nitrogen extent : '.$f2.'</strong><br>
												<strong>Potassium extent : '.$f3.' </strong><br>
												<strong>Phosphorus extent : '.$f4.'</strong></p> 
											  </div>
											  <a href="recom.php?sno='.$sno.'"> <strong>Recommendations for your Sample</strong></a>
											</div>';
											}
											}else{
												echo '<div class="card">
											  <div class="container">
											    <p>No Samples Submitted</p>
											  </div>
											  
											</div>';
											}
										?>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
	</body>
</html>