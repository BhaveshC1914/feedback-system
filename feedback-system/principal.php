<?php
session_start();
include("database.php");
if($_SESSION['p_name']==''){
	echo "<script type='text/javascript'>  alert('Please login again!');	
			window.location='index.php'
			</script>";
}
if(isset($_POST['hod'])){
	$hod_name=addslashes($_POST['hod_name']);
	$hod_branch=addslashes($_POST['hod_branch']);
	$hod_username=addslashes($_POST['hod_username']);
	$hod_pwd=addslashes($_POST['hod_pwd']);
	if($hod_name != '' and $hod_branch != '' and $hod_username != '' and $hod_pwd != ''){
		$sql = "INSERT INTO `hod_details`
		VALUES (NULL, '$hod_name','$hod_username','$hod_pwd','$hod_branch', NULL)";
		if($cn->query($sql) === TRUE) {
			echo "<script type='text/javascript'>  alert('HOD record Inserted!');	
			window.location='principal.php'
			</script>";
		}else {
			echo "Error: " . $sql . "<br>" . $cn->error;
		}
	}else{
		echo "<script type='text/javascript'>  alert('Please fill all the fields'); 
		window.location='principal.php'	
		</script>";
	}
}
?>
<html>
	<head>
		<title>feedback-hub</title>
		<style type="text/css" media="all">
		@import "style_ext.css";
			.collapsible {
			background-color: #777;
			color: white;
			cursor: pointer;
			padding: 18px;
			width: 100%;
			border: none;
			text-align: left;
			outline: none;
			font-size: 15px;
			}

			.active, .collapsible:hover {
			background-color: #555;
			}

			.collapsible:after {
			content: '\002B';
			color: white;
			font-weight: bold;
			float: right;
			margin-left: 5px;
			}

			.active:after {
			content: "\2212";
			}

			.content {
			padding: 0 18px;
			max-height: 0;
			overflow: hidden;
			transition: max-height 0.2s ease-out;
			background-color: #f1f1f1;
			}
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
				text-align:left;
				color:black;
			}
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
			<div style="height:50px;font-size:30px;color:white;font-family:Square721 Cn BT;background-color:#438599;display:flex;align-items: center;justify-content: center;" >feedback-hub</div>
				
				


				    <div class="collapse navbar-collapse navbar-right" id="myNavbar">
				      <ul class="nav navbar-nav">
				        <li><a href="logout.php">Logout</a></li>
				       </ul>
					</div>
				</div>
			</div>
			<div>


					<section id="search" class="section-padding">
						<div class="container">
							<div class="row">
								<div class="col-md-4 col-sm-4">
									<h2 class="ser-title" style="line-height:30px;">Welcome, <br> <?php echo $_SESSION['p_name']?></h2>
									<hr class="botm-line">
									<ul class="nav navbar-nav">
										<li style="align:left"><a href="feedback-reports2.php">SEE FEEDBACK REPORTS</a></li>
									</ul>
								</div>
								<div class="col-md-8 col-sm-8">
								<button class="collapsible">Add/Delete HODs per department</button>
                                <div class="content search-info">
								<form id="contact-form" action="principal.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12 form-group">
                                            <input type="text" style="margin-top:15px;" name="hod_name" placeholder="Full name of HOD" class="form-control br-radius-zero">
										</div>
										<div class="col-md-12 form-group">
											<select name="hod_branch" style="height:30px;" class="custom-select-lg">
												<option selected disabled hidden>SELECT A BRANCH</option>
												<option value="CO">CO</option>
												<option value="CE">CE</option>
												<option value="ME 1ST SHIFT">ME 1ST SHIFT</option>
												<option value="ME 2ND SHIFT">ME 2ND SHIFT</option>
												<option value="EE 1ST SHIFT">EE 1ST SHIFT</option>
												<option value="EE 2ND SHIFT">EE 2ND SHIFT</option>
											</select>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="text" name="hod_username" placeholder="Set username" class="form-control br-radius-zero">
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="text" name="hod_pwd" placeholder="Set password" class="form-control br-radius-zero">
                                        </div>
                                        <div class="col-md-12 form-action">
                                            <button type="submit" name="hod" class="btn btn-form">ADD HOD</button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="row">
                                    <?php
                                        $table_name="hod_details";
                                        $sql2 = "SELECT * FROM `$table_name`";
                                        $rs2 = $cn->query($sql2);
                                        echo '<h3> Current HODs </h3><br>';
                                        if ($rs2->num_rows > 0) {
                                        while($row = $rs2->fetch_assoc()) {
                                            $h_id=$row["h_id"];
                                            $h_name=$row["h_name"];
                                            $h_username=$row["h_username"];
                                            $h_password=$row["h_password"];
                                            $branch=$row["branch"];
                                            echo '<form method="post" action="remove.php">
                                                <div class="card1">
												<div class="container1">
													<input style="display:none" type="text" name="table" value="'.$table_name.'" readonly>
                                                    <strong>Name : </strong>'.$h_name.' <br>
                                                    <strong>Username : </strong>'.$h_username.'<br>
                                                    <strong>Password : </strong>'.$h_password.'<br>
                                                    <strong>Branch : </strong>'.$branch.'<br>
                                                    <input style="display:none" type="text" name="id" value="'.$h_id.'" readonly>
                                                    <div class="pos">
                                                        <input type="submit" name="submit" value="delete" style="color:red; font-weight:bold; float:right; background:none; border:none;"></input><br>
                                                    </div>
                                                </div>
                                                </div>
                                                </form>' ;
                                            
                                        }
                                        }else{
                                            echo '<div class="card1">
                                            <div class="container1">
                                                    No HODs Entered!
                                            </div>
                                            </div>' ;
                                        }
                                    ?>
                                    
                                    </div>	
								</div>
								</div>
							</div>
						</div>
					</section>
			</div>
		</div>

		<script>
            var coll = document.getElementsByClassName("collapsible");
            var i;

            for (i = 0; i < coll.length; i++) {
            coll[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var content = this.nextElementSibling;
                if (content.style.maxHeight){
                content.style.maxHeight = null;
                } else {
                content.style.maxHeight = content.scrollHeight + "px";
                } 
            });
            }
        </script>
</body>
</html>