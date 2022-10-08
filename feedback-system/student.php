<?php
session_start();
//error_reporting(0);
include("database.php");
if($_SESSION['s_name']==''){
	echo "<script type='text/javascript'>  alert('Please login again!');	
			window.location='index.php'
			</script>";
}

if(isset($_POST['submit_feedback'])){
    $sql_check = "select * from `feedback_details` where s_id = ".$_SESSION["s_id"];
    $rs = $cn->query($sql_check);
    if($rs->num_rows > 0 ){
        echo "<script type='text/javascript'> alert('You have already gone through the feedback. Logging you out.'); 
                window.location='index.php'
                </script>";
    }else{
        $response='';
        $flag=1;
        for($i=1;$i<=1;$i++){
            $int_res='';
            for($j=1;$j<=10;$j++){
                //print(addslashes($_POST["c".$i."q".$j]));
                if(addslashes($_POST["c".$i."q".$j]) != ''){
                    $int_res=$int_res."c".$i."q".$j.':'.addslashes($_POST["c".$i."q".$j]).'|';
                }else{
                    $flag=0;
                }
            }
            $response=$response.$int_res;
        }
        $sql2 = "SELECT f_id,f_feedback,f_total_students FROM faculty_details where f_sem='".$_SESSION['s_sem']."' and f_branch='".$_SESSION['s_branch']."'";
        $rs2 = $cn->query($sql2);
        if ($rs2->num_rows > 0) {
            while($row = $rs2->fetch_assoc()) {
                $f_id=$row["f_id"];
                $f_feedback=$row["f_feedback"];
                $f_total_students=$row["f_total_students"];
                $faculty_res='';
                for($j=1;$j<=10;$j++){
                    //print(addslashes($_POST["c".$i."q".$j]));
                    if(addslashes($_POST["f".$f_id."q".$j]) != ''){
                        $faculty_res=$faculty_res."q".$j.':'.addslashes($_POST["f".$f_id."q".$j]).'|';
                    }else{
                        $flag=0;
                    }
                }
                
                if($flag==1){
                    if(trim($f_feedback)=='' or trim($f_total_students)==''){
                        $sql = "UPDATE `faculty_details` SET `f_feedback`='$faculty_res',`f_total_students`= 1 WHERE f_id = $f_id";
                        if($cn->query($sql) === FALSE) {
                            echo "Error: " . $sql . "<br>" . $cn->error;
                        }
                    }else{
                        $sql3 = "SELECT f_feedback, f_total_students FROM faculty_details where f_id = $f_id";
                        $rs3 = $cn->query($sql3);
                        $row3=$rs3->fetch_assoc();
                        $f_feedback=$row3['f_feedback'];
                        $f_total_students=$row3['f_total_students'];
                        $tags1 = explode("|", $f_feedback);
                        $tags2 = explode("|", $faculty_res);
                        $new_response='';
                        for($i=0;$i<count($tags1)-1;$i++){
                            $old=explode(':',$tags1[$i])[1];
                            $new=explode(':',$tags2[$i])[1];
                            $new_response=$new_response.'q'.($i+1).':'.((int)$old+(int)$new).'|';
                        }
                        $sql4 = "UPDATE `faculty_details` SET `f_feedback`='$new_response', `f_total_students`= ".(((int)$f_total_students)+1)." WHERE f_id = $f_id";
                        echo $sql4;
                        $cn->query($sql4);
                        
                    }
                }else{
                    echo "<script type='text/javascript'>  alert('Please answer all the feedback question'); 
                    window.location='student.php'	
                    </script>";
                }
            }
        }
        
        print($response);
        
        
        if($flag==1){
            $sql = "INSERT INTO `feedback_details` VALUES (".$_SESSION["s_id"].", '$response', NULL)";
            if($cn->query($sql) === TRUE) {
                    echo "<script type='text/javascript'>  alert('Feedback inserted!');	
                    window.location='student.php'   
                    </script>";
            }else {
                    echo "Error: " . $sql . "<br>" . $cn->error;
            }
        }else{
            echo "<script type='text/javascript'>  alert('Please answer all the feedback question'); 
            window.location='student.php'	
            </script>";
        }
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
									<h2 class="ser-title" style="line-height:35px;">Welcome, <br> <?php echo $_SESSION['s_name']?> <br><hr class="botm-line"> <p style="color:blue"> <?php echo $_SESSION['s_branch']?> - <?php echo $_SESSION['s_sem']?> </p></h2>
								</div>
								<div class="col-md-8 col-sm-8">
                                <?php 
                                $sql_check = "select * from `feedback_details` where s_id = ".$_SESSION["s_id"];
                                $rs = $cn->query($sql_check);
                                if($rs->num_rows > 0 ){
                                    echo '<h2 class="ser-title" style="color:red;margin-bottom:20px;line-height:30px;">You have already filled the feedback. Please logout.';
                                }else{
                                    echo '<h2 class="ser-title" style="margin-bottom:20px;line-height:30px;">Fill the feedback for below sections';
                                }?></h2>
                                <form id="contact-form" action="student.php" method="post" enctype="multipart/form-data">
                                <button type="button" class="collapsible">Faculty</button>
                                <div class="content search-info">
                                    <?php
                                    $table_name="faculty_details";
                                    $sql2 = "SELECT * FROM `$table_name` where f_sem='".$_SESSION['s_sem']."' and f_branch='".$_SESSION['s_branch']."'";
                                    $rs2 = $cn->query($sql2);
                                    if ($rs2->num_rows > 0) {
                                    while($row = $rs2->fetch_assoc()) {
                                        $f_id=$row["f_id"];
                                        $f_name=$row["f_name"];
                                        $f_subject=$row["f_subject"];
                                        echo '<br><div style="color:red;"><strong><p>Faculty : '.$f_name.' <br> Subject : '.$f_subject.'</p></strong></div>
                                    <div>
                                        <p>Q1. Punctuality and discipline</p>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q1" value="5"> Excellent</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q1" value="4"> Very Good</label><br>
                                        <label>
                                        <input type="radio"  name="f'.$f_id.'q1" value="3"> Good</label><br>
                                        <label>
                                        <input type="radio"  name="f'.$f_id.'q1" value="2"> Poor</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q1" value="1"> very poor</label>
                                    
                                    </div><br>
                                    <div>
                                        <p>Q2. Domain Knowledge</p>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q2" value="5"> Excellent</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q2" value="4"> Very Good</label><br>
                                        <label>
                                        <input type="radio"  name="f'.$f_id.'q2" value="3"> Good</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q2" value="2"> Poor </label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q2" value="1" > Very poor </label>
                                    </div><br>
                                    <div>
                                        <p>Q3. Presentation skills and interaction with the students</p>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q3" value="5"> Excellent</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q3" value="4"> Very Good</label><br>
                                        <label>
                                        <input type="radio"  name="f'.$f_id.'q3" value="3"> Good</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q3" value="2"> Poor</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q3" value="1"> Very poor</label>
                                    </div><br>
                                    <div>
                                        <p>Q4. Able to resolve difficulties</p>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q4" value="5"> Excellent</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q4" value="4"> Very Good</label><br>
                                        <label>
                                        <input type="radio"  name="f'.$f_id.'q4" value="3"> Good</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q4" value="2"> Poor</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q4" value="1"> Very poor</label>
                                    </div><br>
                                    <div>
                                        <p>Q5. Effective use of teaching aids</p>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q5" value="5"> Excellent</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q5" value="4"> Very Good</label><br>
                                        <label>
                                        <input type="radio"  name="f'.$f_id.'q5" value="3"> Good</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q5" value="2"> Poor</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q5" value="1"> Very poor</label>
                                    </div><br>
                                    <div>
                                        <p>Q6. Faculty member completes the syllabus in time?</p>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q6" value="5"> Excellent</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q6" value="4"> Very Good</label><br>
                                        <label>
                                        <input type="radio"  name="f'.$f_id.'q6" value="3"> Good</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q6" value="2"> Poor</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q6" value="1"> Very poor</label>
                                    </div><br>
                                    <div>
                                        <p>Q7. Teacher offer assistance on counselling to needy students</p>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q7" value="5"> Excellent</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q7" value="4"> Very Good</label><br>
                                        <label>
                                        <input type="radio"  name="f'.$f_id.'q7" value="3"> Good</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q7" value="2"> Poor</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q7" value="1"> Very poor</label>
                                    </div><br>
                                    <div>
                                        <p>Q8. Teacher ensures learners activity and problem solving ability in class?</p>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q8" value="5"> Excellent</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q8" value="4"> Very Good</label><br>
                                        <label>
                                        <input type="radio"  name="f'.$f_id.'q8" value="3"> Good</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q8" value="2"> Poor</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q8" value="1"> Very poor</label>
                                    </div><br>
                                    <div>
                                        <p>Q9. Teacher is capable of keeping class under discipline and control</p>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q9" value="5"> Excellent</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q9" value="4"> Very Good</label><br>
                                        <label>
                                        <input type="radio"  name="f'.$f_id.'q9" value="3"> Good</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q9" value="2"> Poor</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q9" value="1"> Very poor</label>
                                    </div><br>
                                    <div>
                                        <p>Q10. Knowledge of faculty beyond the syllabus </p>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q10" value="5"> Excellent</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q10" value="4"> Very Good</label><br>
                                        <label>
                                        <input type="radio"  name="f'.$f_id.'q10" value="3"> Good</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q10" value="2"> Poor</label><br>
                                        <label>
                                        <input type="radio" name="f'.$f_id.'q10" value="1"> Very poor</label>
                                    </div><br>';
                                    
                                    }
                                    }else{
                                        echo '<div style="color:red;"><strong><p>No Faulties are there to put feedback for.</p></strong></div>' ;
                                    }
                                    ?>
                                </div>
                                <button type="button" class="collapsible">Collge facilities</button>
                                <div class="content search-info"><br>
                                    <div><p>Q1. The condition of sport facilities provided at our college</p>
                                     <label>
                                     <input type="radio" name="c1q1" value="5"> Excellent</label><br>
                                     <label>
                                     <input type="radio" name="c1q1" value="4"> Very good </label><br>
                                     <label>
                                     <input type="radio" name="c1q1" value="3"> Good </label><br>
                                     <label>
                                     <input type="radio" name="c1q1" value="2"> Poor </label><br>
                                     <label>
                                     <input type="radio" name="c1q1" value="1"> Very poor</label> 
                                     </div><br>
                                     <div><p>Q2. The condition of the exterior and interior lighting facilities at our college</p>
                                     <label>
                                     <input type="radio" name="c1q2" value="5"> Excellent</label><br>
                                     <label>
                                     <input type="radio" name="c1q2" value="4"> Very good </label><br>
                                     <label>
                                     <input type="radio" name="c1q2" value="3"> Good </label><br>
                                     <label>
                                     <input type="radio" name="c1q2" value="2"> Poor </label><br>
                                     <label>
                                     <input type="radio" name="c1q2" value="1"> Very poor</label> 
                                     </div><br>
                                     <div><p>Q3. The condition of rest room facilities available at our college</p>
                                     <label>
                                     <input type="radio" name="c1q3" value="5"> Excellent</label><br>
                                     <label>
                                     <input type="radio" name="c1q3" value="4"> Very good </label><br>
                                     <label>
                                     <input type="radio" name="c1q3" value="3"> Good </label><br>
                                     <label>
                                     <input type="radio" name="c1q3" value="2"> Poor </label><br>
                                     <label>
                                     <input type="radio" name="c1q3" value="1"> Very poor</label>
                                     </div><br>
                                     <div><p>Q4. The condition of class room facilities provided at our college</p>
                                     <label>
                                     <input type="radio" name="c1q4" value="5"> Excellent</label><br>
                                     <label>
                                     <input type="radio" name="c1q4" value="4"> Very good </label><br>
                                     <label>
                                     <input type="radio" name="c1q4" value="3"> Good </label><br>
                                     <label>
                                     <input type="radio" name="c1q4" value="2"> Poor </label><br>
                                     <label>
                                     <input type="radio" name="c1q4" value="1"> Very poor</label> 
                                     </div><br>
                                     <div><p>Q5. The availablity  of parking spaces  provided at our college</p>
                                     <label>
                                     <input type="radio" name="c1q5" value="5"> Excellent</label><br>
                                     <label>
                                     <input type="radio" name="c1q5" value="4"> Very good </label><br>
                                     <label>
                                     <input type="radio" name="c1q5" value="3"> Good </label><br>
                                     <label>
                                     <input type="radio" name="c1q5" value="2"> Poor </label><br>
                                     <label>
                                     <input type="radio" name="c1q5" value="1"> Very poor</label> 
                                     </div><br>
                                     <div><p>Q6. The condition of lab  facilities provided at our college</p>
                                     <label>
                                     <input type="radio" name="c1q6" value="5"> Excellent</label><br>
                                     <label>
                                     <input type="radio" name="c1q6" value="4"> Very good </label><br>
                                     <label>
                                     <input type="radio" name="c1q6" value="3"> Good </label><br>
                                     <label>
                                     <input type="radio" name="c1q6" value="2"> Poor </label><br>
                                     <label>
                                     <input type="radio" name="c1q6" value="1"> Very poor</label> 
                                     </div><br>
                                     <div><p>Q7. The condition of hostel facilities provided at our college</p>
                                     <label>
                                     <input type="radio" name="c1q7" value="5"> Excellent</label><br>
                                     <label>
                                     <input type="radio" name="c1q7" value="4"> Very good </label><br>
                                     <label>
                                     <input type="radio" name="c1q7" value="3"> Good </label><br>
                                     <label>
                                     <input type="radio" name="c1q7" value="2"> Poor </label><br>
                                     <label>
                                     <input type="radio" name="c1q7" value="1"> Very poor</label> 
                                     </div><br>
                                     <div><p>Q8. The condition of xerox/photostat facilities provided at our college</p>
                                     <label>
                                     <input type="radio" name="c1q8" value="5"> Excellent</label><br>
                                     <label>
                                     <input type="radio" name="c1q8" value="4"> Very good </label><br>
                                     <label>
                                     <input type="radio" name="c1q8" value="3"> Good </label><br>
                                     <label>
                                     <input type="radio" name="c1q8" value="2"> Poor </label><br>
                                     <label>
                                     <input type="radio" name="c1q8" value="1"> Very poor</label> 
                                     </div><br>
                                     <div><p>Q9. The condition of library  facilities provided at our college</p>
                                     <label>
                                     <input type="radio" name="c1q9" value="5"> Excellent</label><br>
                                     <label>
                                     <input type="radio" name="c1q9" value="4"> Very good </label><br>
                                     <label>
                                     <input type="radio" name="c1q9" value="3"> Good </label><br>
                                     <label>
                                     <input type="radio" name="c1q9" value="2"> Poor </label><br>
                                     <label>
                                     <input type="radio" name="c1q9" value="1"> Very poor</label> 
                                     </div><br>
                                     <div><p>Q10. The condition of Drinking water  facilities provided at our college</p>
                                     <label>
                                     <input type="radio" name="c1q10" value="5"> Excellent</label><br>
                                     <label>
                                     <input type="radio" name="c1q10" value="4"> Very good </label><br>
                                     <label>
                                     <input type="radio" name="c1q10" value="3"> Good </label><br>
                                     <label>
                                     <input type="radio" name="c1q10" value="2"> Poor </label><br>
                                     <label>
                                     <input type="radio" name="c1q10" value="1"> Very poor</label>
                                     </div><br>
                                </div>
                                <div class="col-md-12 form-action" style="margin-top:15px">
                                    <button type="submit" name="submit_feedback" class="btn btn-form">SUBMIT FORM</button>
                                </div>
                                </form>
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