<?php
session_start();
extract($_POST);
include("database.php");

//$_SESSION["id"] = $loginid;
//$_SESSION["uid"]=$_SESSION["id"];
//$_SESSION["password"] =$pass;
//if(isset($submit)){
	$sql="select * from hod_details where h_username='$usr' and h_password='$pwd'";
	$rs = $cn->query($sql);
	if($rs->num_rows < 1 ){
		echo "<script type='text/javascript'> alert('Wrong Username Or Password'); 
		history.back();
		</script>";
	}else{
		$row = $rs->fetch_assoc();
		$_SESSION["h_name"]=$row["h_name"];
		header("Location: hod.php");
	}
//}
 /*if(!isset($_SESSION["alogin"]))
{

	
	header("Location: index.php");
		
}*/
?>