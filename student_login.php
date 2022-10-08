<?php
session_start();

include("database.php");

//$_SESSION["id"] = $loginid;
//$_SESSION["uid"]=$_SESSION["id"];
//$_SESSION["password"] =$pass;
//if(isset($submit)){
	$usr=$_POST['username'];
	$pwd=$_POST['password'];
	$sql="select * from student_details where s_username='$usr' and s_password='$pwd'";
	$rs = $cn->query($sql);
	if($rs->num_rows < 1 ){
		echo "<script type='text/javascript'> alert('Wrong Username Or Password'); 
		history.back();
		</script>";
	}else{
        $row = $rs->fetch_assoc();
        $_SESSION["s_id"]=$row["s_id"];
		$_SESSION["s_name"]=$row["s_name"];
		$_SESSION["s_sem"]=$row["s_sem"];
		$_SESSION["s_branch"]=$row["s_branch"];
		header("Location: student.php");
	}
//}
 /*if(!isset($_SESSION["alogin"]))
{

	
	header("Location: index.php");
		
}*/
?>