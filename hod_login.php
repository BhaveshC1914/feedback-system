<?php
session_start();

include("database.php");
$usr=$_POST['username'];
$pwd=$_POST['password'];
	$sql="select * from hod_details where h_username='$usr' and h_password='$pwd'";
	$rs = $cn->query($sql);
	if($rs->num_rows < 1 ){
		echo "<script type='text/javascript'> alert('Wrong Username Or Password'); 
		history.back();
		</script>";
	}else{
		$row = $rs->fetch_assoc();
		$_SESSION["h_name"]=$row["h_name"];
		$_SESSION["h_password"]=$row["h_password"];
		$_SESSION["h_branch"]=$row["branch"];
		header("Location: hod.php");
	}

?>