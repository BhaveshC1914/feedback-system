<?php
    session_start();
?>
<html>
	<head>
		<title>Soil-data</title>
		<style type="text/css" media="all">
		.card1 {
			    /* Add shadows to create the "card" effect */
			    width:400px;
			    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
			    transition: 0.3s;
			    padding: 20px;
			    margin: 30px 30px 30px 0px;
			}

			/* On mouse-over, add a deeper shadow */
			.card1:hover {
			    box-shadow: 0 8px 20px 0 rgba(0,0,0,0.2);
			}

			/* Add some padding inside the card container */
			.container1 {
				width:auto;
			    color:black;
			}
			.pos{
				float:right;
				margin-right: -15px;
			}
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
				        <li class="active"><a href="logout.php">Logout</a></li>
				        <li class="active"><a href="javascript:history.back()">Back</a></li>
				       </ul>
					</div>
				</div>	
				</div>
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
									<h4 class="ser-title">Ask Expert</h4>
								</div>
								<div class="col-md-4 col-sm-4">
									<div class="search-info">
											<h3 class="cnt-ttl">Pass on the Queries to the Expert</h3>
											<br>
											<form accept-charset="UTF-8" role="form" class="form-signin" method="post" action="query.php">
											    <div class="form-group">
				                                    <textarea placeholder="Query" id="qry" type="text" name="qry" rows="5" class="form-control br-radius-zero" required></textarea>
				                                   
				                                </div>
												<div class="form-action">
													<button type="submit" name="submit" id="submit" class="btn btn-form">ASK</button>
												</div>
											</form>
											<br><br><br>
											<br><br><br>
											<div>
											<?php
											//		isset(submit){
													extract($_GET);
													include("database.php");
													$unm = $_SESSION['uname'];
													$sql2 = "SELECT * FROM `expert` where user_uname = '$unm'";
													$rs2 = $cn->query($sql2);
													echo '<h3> Recent Queries</h3><br>';
													if ($rs2->num_rows > 0) {
													while($row = $rs2->fetch_assoc()) {
														$query=$row["query"];
														$ans=$row["answer"];
														
														if($ans ==''){
															echo '<div class="card1">
															<div class="container1">
																<div class="pos">

																
																<br>
																</div>
																<strong>Query : </strong>'.$query.' <br>
																<strong>Answer : </strong> <span style="color:red">Not Answered Yet</span><br>
																
															
															</div>
															</div>';
														}else{
															$_SESSION["query_id"]=$row["query_id"];
															echo '<div class="card1">
															<div class="container1">
																<div class="pos">

																<ul class="nav navbar-nav">
																	<li class="active"><a style="color:red" href="/soil-data/remove.php">x</a></li>
																</ul>
																<br>
																</div>
																<strong>Query : </strong>'.$query.' <br>
																<strong>Answer : </strong>'.$ans.'<br>
																
															
															</div>
															</div>';
														}
														
													}
												}else{
													echo '<div class="card1">
													<div class="container1">
															No Recent Feedbacks
													</div>
													</div>	' ;
												}
												?>
													
											</div>
									</div>
								</div>
								<br>
								
							</div>
						</div>
					</section>
				</div>
			</center>
		</div>
	</body>
</html>