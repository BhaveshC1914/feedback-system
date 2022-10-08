<?php
session_start();
error_reporting(0);
include("database.php");
if($_SESSION['p_name']==''){
	echo "<script type='text/javascript'>  alert('Please login again!');	
			window.location='index.php'
			</script>";
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
			<div style="height:50px;font-size:30px;color:white;font-family:Square721 Cn BT;background-color:#438599;display:flex;align-items: center;justify-content: center;" >feedback-hub</div>
				<div class="collapse navbar-collapse navbar-left" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <h3 class="ser-title" style="margin-top:10px;color:#438599">Welcome, <?php echo $_SESSION['p_name'] ?></h3>
                    </ul>
				</div>
				<div class="collapse navbar-collapse navbar-right" id="myNavbar">
					<ul class="nav navbar-nav">
				        <li><a href="principal.php">Back</a></li>
				    </ul>
				    <ul class="nav navbar-nav">
				       <li><a href="logout.php">Logout</a></li>
				    </ul>
				</div>
        </div>
        <div class="search-category">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <form action="#" method="post">
                                <div class="form-container">
                                <form id="contact-form" action="" method="post" enctype="multipart/form-data">
                                        <select name="search_branch" class="custom-select-lg" style="height:40px;">
                                            <option value="all" selected disabled hidden>SELECT A BRANCH</option>
                                            <option value="all">Show All</option>
                                            <option value="CO">CO</option>
                                            <option value="CE">CE</option>
                                            <option value="ME 1ST SHIFT">ME 1ST SHIFT</option>
                                            <option value="ME 2ND SHIFT">ME 2ND SHIFT</option>
                                            <option value="EE 1ST SHIFT">EE 1ST SHIFT</option>
                                            <option value="EE 2ND SHIFT">EE 2ND SHIFT</option>  
                                        </select>
                                        <select name="search_sem" class="custom-select-lg" style="height:40px;">
                                            <option value="all" selected disabled hidden>SELECT THE SEMESTER</option>
                                            <option value="all">Show All</option>
                                            <option value="1st SEM">1st SEM</option>
                                            <option value="2nd SEM">2nd SEM</option>
                                            <option value="3rd SEM">3rd SEM</option>
                                            <option value="4th SEM">4th SEM</option>
                                            <option value="5th SEM">5th SEM</option>
                                            <option value="6th SEM">6th SEM</option>  
                                        </select>
                                        <button type="submit" style="height:40px;" name="ext" class="btn btn-form">APPLY FILTER</button>
                                    </form>
                                </div>
                            </form>  
                        </div>
                    </div>
                </div>
            </div>  
		<div>
            <section id="search" class="section-padding" >
						<div class="container">
							<div class="row">
                                <?php
                                    extract($_POST);
                                    include("database.php");
                                    $table_name="feedback_details";
                                    $table_name1="faculty_details";
                                    $sql2="";
									$loc="";
                                    if(($_POST['search_branch'] == 'all' and $_POST['search_sem'] == 'all') or ($_POST['search_branch']=='' and $_POST['search_sem']=='') or ($_POST['search_branch'] == 'all' and $_POST['search_sem']=='') or ($_POST['search_branch'] == '' and $_POST['search_sem']=='all')){
										$sql1 = "SELECT * FROM `$table_name`";
										$sql2 = "SELECT * FROM `$table_name1` where f_total_students>0";
										$loc = "overall";
                                    }else{
                                        if(($_POST['search_branch']!='' and $_POST['search_branch'] != 'all') and ($_POST['search_sem']!='' and $_POST['search_sem'] != 'all')){
                                            $branch=$_POST['search_branch'];
                                            $sem=$_POST['search_sem'];
											$sql1 = "SELECT * FROM `$table_name` WHERE s_id in (select s_id from student_details where s_Sem='".$sem."' and s_branch='".$branch."')";
											$sql2 = "SELECT * FROM `$table_name1` WHERE f_Sem='".$sem."' and f_branch='".$branch."' and f_total_students>0";
											$loc = "in ".$branch.", ".$sem;
                                        }else{
                                            if(($_POST['search_branch']=='' or $_POST['search_branch'] == 'all') and $_POST['search_sem'] != 'all'){
                                                $sem=$_POST['search_sem'];
												$sql1 = "SELECT * FROM `$table_name` WHERE s_id in (select s_id from student_details where s_Sem='".$sem."')";
												$sql2 = "SELECT * FROM `$table_name1` WHERE f_Sem='".$sem."' and f_total_students>0";
												$loc = "in ".$sem;
                                            }else{
                                                $branch=$_POST['search_branch'];
												$sql1 = "SELECT * FROM `$table_name` WHERE s_id in (select s_id from student_details where s_branch='".$branch."')";
												$sql2 = "SELECT * FROM `$table_name1` WHERE f_branch='".$branch."' and f_total_students>0";
												$loc = "in ".$branch." branch";
                                            }
                                        }
                                    }
                                    $rs1 = $cn->query($sql1);
                                    $rs2 = $cn->query($sql2);
									echo "<p style='color:black'><strong>Number of students filled the feedbacks ".$loc."</strong> : ".$rs1->num_rows."</p>";
									//echo "<p style='color:black'><strong>Number of students filled the feedbacks ".$loc."</strong> : ".$rs2->num_rows."</p>";
									echo '<table class="table table-striped">
											<thead>
											<tr style="color:#313131;">
												<th>Name & Subject</th>
												<th>Punctuality & discipline</th>
												<th>Domain Knowledge</th>
												<th>Presentation Skills</th>
												<th>Resolving difficulties</th>
												<th>Use of teaching aids</th>
												<th>Syllabus Completion</th>
												<th>Assistance & Counselling</th>
												<th>Problem Solving Ability</th>
												<th>Discipline & Control</th>
												<th>Knowledge of Faculty</th>
											</tr>
											</thead>
											<tbody>';
                                    if ($rs2->num_rows > 0) {
                                        while($row = $rs2->fetch_assoc()) {
											$f_name=$row["f_name"];
											$f_subject=$row["f_subject"];
											$f_feedback=$row["f_feedback"];
											$f_total_students=$row["f_total_students"];
											$tags = explode("|", $f_feedback);
											echo "<tr>
													<td style='color:#313131;'><strong>$f_name</strong> - $f_subject</td>";
											for($i=0;$i<count($tags)-1;$i++){
												//echo $tags[$i];
												$rating = explode(":",$tags[$i]);
												echo "<td>".(((int)$rating[1]/((int)$f_total_students*5))*100)." %</td>";
												//echo "<td>".(int)$rating[1]+(int)$f_total_students."</td>";
											}
											echo "</tr>";
										}
										echo "</tbody>
										</table>";
									}
                                ?>
							</div>
						</div>
			</section>
            <section id="search" class="section-padding" >
						<div class="container">
							<div class="row">
                                <?php
                                    extract($_POST);
                                    include("database.php");
                                    $table_name="feedback_details";
									$sql1 = "SELECT * FROM `$table_name`";
									$rs1 = $cn->query($sql1);
									$total_students = $rs1->num_rows;
									echo "<p style='color:black'><strong>Number of students filled the feedbacks </strong> : ".$total_students."</p>";
									echo '<table class="table table-striped table-bordered">
											<thead>
											<tr style="color:#313131;">
												<th>Domain</th>
												<th>Punctuality & discipline</th>
												<th>Domain Knowledge</th>
												<th>Presentation Skills</th>
												<th>Resolving difficulties</th>
												<th>Use of teaching aids</th>
												<th>Syllabus Completion</th>
												<th>Assistance & Counselling</th>
												<th>Problem Solving Ability</th>
												<th>Discipline & Control</th>
												<th>Knowledge of Faculty</th>
											</tr>
											</thead>
											<tbody>';
                                    if ($rs1->num_rows > 0) {
										$repsonse_array=array();
										
                                        while($row = $rs1->fetch_assoc()) {
											$response=$row["response"];
											$tags = explode("|", $response);
											
											for($i=0;$i<count($tags)-1;$i++){
												$rating = explode(":",$tags[$i]);
												$repsonse_array[$i] = $repsonse_array[$i] + (int)$rating[1];
											}
											
										}
										$header_array=array('college facilities 1',' college facilities 2');
										for($k=1;$k<=count($repsonse_array)/10;$k++){
											echo "<tr><td style='color:#313131;'><strong>".$header_array[$k-1]."</strong></td>";
											for($j=(($k*10)-10);$j<($k*10);$j++){
												echo "<td>".$repsonse_array[$j]." %</td>";
											}
											echo "</tr>";
										}
										echo "</tbody>
										</table>";
									}
                                ?>
							</div>
						</div>
			</section>
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