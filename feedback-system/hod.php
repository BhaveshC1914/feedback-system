<?php
session_start();
error_reporting(0);
include("database.php");
if($_SESSION['h_name']==''){
	echo "<script type='text/javascript'>  alert('Please login again!');	
			window.location='index.php'
			</script>";
}
if(isset($_POST['faculty'])){
	$f_name=addslashes($_POST['f_name']);
	$f_branch=addslashes($_POST['f_branch']);
	$f_sem=addslashes($_POST['f_sem']);
	$f_subject=addslashes($_POST['f_subject']);
	if($f_name != '' and $f_branch != '' and $f_sem != '' and $f_subject != ''){
		$sql = "INSERT INTO `faculty_details`
		VALUES (NULL, '$f_name','$f_branch','$f_sem','$f_subject','', 0, NULL)";
		if($cn->query($sql) === TRUE) {
			echo "<script type='text/javascript'>  alert('Faculty record Inserted!');	
			window.location='hod.php'
			</script>";
		}else {
			echo "Error: " . $sql . "<br>" . $cn->error;
		}
	}else{
		echo "<script type='text/javascript'>  alert('Please fill all the fields'); 
		window.location='hod.php'
		</script>";
	}
}
if(isset($_POST['get_student'])){
	$filess = glob('student_csv/*');
	$target_dir = "student_csv/";
	
	$s_branch=addslashes($_POST['s_branch']);
	$s_sem=addslashes($_POST['s_sem']);
	if (!empty($_FILES["s_excel"]["name"]) and $s_branch != '' and $s_sem != '') {
		$target_file1 = $s_branch.' '.$s_sem.'.csv';
		move_uploaded_file($_FILES["s_excel"]["tmp_name"], $target_dir.$target_file1);
		$result = array('str_getcsv', file($target_dir.$target_file1));
		foreach($result as $key1 => $val1);
		foreach($val1 as $key => $val){
			$username = strtolower(trim(explode(' ',$val)[0]).'.'.trim(explode(' ',$val)[1])).$key;
			$password = strtolower(substr($val,0,1).trim(explode(' ',$val)[1])).$key;
			//print($username.' '.$password.' | ');
			$sql = "INSERT INTO `student_details`
			VALUES (NULL, '$val','$username','$password','$s_branch', '$s_sem', NULL)";
			if($cn->query($sql) === FALSE) {
				echo "Error: " . $sql . "<br>" . $cn->error;
			}
		}
		echo "<script type='text/javascript'>  alert('Student records Inserted!');	
			window.location='hod.php'
			</script>";
	} else {
		echo "<script type='text/javascript'>  alert('Please enter all the fields.'); 
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
									<h2 class="ser-title" style="line-height:30px;">Welcome, <br> <?php echo $_SESSION['h_name']?></h2>
									<hr class="botm-line">
									<ul class="nav navbar-nav">
										<li style="align:left"><a href="feedback-reports.php">SEE FEEDBACK REPORTS</a></li>
									</ul>
								</div>
								<div class="col-md-8 col-sm-8">
								<button class="collapsible">Add/Delete Faculties</button>
                                <div class="content search-info">
								<form id="contact-form" action="hod.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
										<div class="col-md-12 form-group">
                                            <input type="text" style="margin-top:15px;" name="f_name" placeholder="Full name of Faculty" class="form-control br-radius-zero">
										</div>
										<div class="col-md-12 form-group">
											<select name="f_branch" style="height:30px;" class="custom-select-lg">
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
											<select name="f_sem" style="height:30px;" class="custom-select-lg">
												<option selected disabled hidden>SELECT THE SEMESTER</option>
												<option value="1st SEM">1st SEM</option>
												<option value="2nd SEM">2nd SEM</option>
												<option value="3rd SEM">3rd SEM</option>
												<option value="4th SEM">4th SEM</option>
												<option value="5th SEM">5th SEM</option>
												<option value="6th SEM">6th SEM</option>
											</select>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="text" name="f_subject" placeholder="Subject he teaches" class="form-control br-radius-zero">
										</div>
                                        <div class="col-md-12 form-action">
                                            <button type="submit" name="faculty" class="btn btn-form">ADD FACULTY</button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="row">
                                    <?php
                                        $table_name="faculty_details";
                                        $sql2 = "SELECT * FROM `$table_name`";
                                        $rs2 = $cn->query($sql2);
                                        echo '<h3>Current Faculties with the subjects they teach</h3><br>';
                                        if ($rs2->num_rows > 0) {
                                        while($row = $rs2->fetch_assoc()) {
                                            $f_id=$row["f_id"];
                                            $f_name=$row["f_name"];
                                            $f_sem=$row["f_sem"];
                                            $f_branch=$row["f_branch"];
                                            $f_subject=$row["f_subject"];
                                            echo '<form method="post" action="remove.php">
                                                <div class="card1">
												<div class="container1">
													<input style="display:none" type="text" name="table" value="'.$table_name.'" readonly>
                                                    <strong>Name : </strong>'.$f_name.' <br>
                                                    <strong>Branch : </strong>'.$f_branch.' <br>
                                                    <strong>Semester : </strong>'.$f_sem.'<br>
													<strong>Subject : </strong>'.$f_subject.'<br>
													<input style="display:none" type="text" name="id" value="'.$f_id.'" readonly>
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
                                                    No Faculties Entered!
                                            </div>
                                            </div>' ;
                                        }
                                    ?>
                                    
                                </div>	
                                </div>
								<button class="collapsible">Add/Delete Students</button>
                                <div class="content search-info">
								<form id="contact-form" action="hod.php" method="post" enctype="multipart/form-data">
                                    <div class="row">
										<div class="col-md-12 form-group">
											<select name="s_branch" style="height:30px; margin-top:15px;" class="custom-select-lg">
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
											<select name="s_sem" style="height:30px;" class="custom-select-lg">
												<option selected disabled hidden>SELECT THE SEMESTER</option>
												<option value="1st SEM">1st SEM</option>
												<option value="2nd SEM">2nd SEM</option>
												<option value="3rd SEM">3rd SEM</option>
												<option value="4th SEM">4th SEM</option>
												<option value="5th SEM">5th SEM</option>
												<option value="6th SEM">6th SEM</option>
											</select>
                                        </div>
                                        <div class="col-md-12 form-group">
                                            <input type="file" name="s_excel" accept=".csv,.txt" class="form-control br-radius-zero">
                                        </div>
                                        <div class="col-md-12 form-action">
                                            <button type="submit" name="get_student" class="btn btn-form">GENERATE STUDENT CREDENTIALS</button>
                                        </div>
                                    </div>
                                </form>
                                <hr>
                                <div class="row">
                                    <?php
                                        $table_name="student_details";
                                        $sql2 = "SELECT s_branch, s_sem, count(*) FROM `$table_name` group by s_branch, s_sem";
                                        $rs2 = $cn->query($sql2);
                                        echo '<h3> Current Count Of Students in Branch and Sem </h3><br>';
                                        if ($rs2->num_rows > 0) {
                                        while($row = $rs2->fetch_assoc()) {
                                            $s_branch=$row["s_branch"];
                                            $s_sem=$row["s_sem"];
                                            $count=$row["count(*)"];
                                            echo '<form method="post" action="remove.php">
                                                <div class="card1">
												<div class="container1">
													<input style="display:none" type="text" name="table" value="'.$table_name.'" readonly>
                                                    <strong>Branch : </strong>'.$s_branch.' <br>
                                                    <strong>Semester : </strong>'.$s_sem.'<br>
                                                    <strong>Count of Students : </strong>'.$count.'<br>
                                                    <input style="display:none" type="text" name="s_branch" value="'.$s_branch.'" readonly>
                                                    <input style="display:none" type="text" name="s_sem" value="'.$s_sem.'" readonly>
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