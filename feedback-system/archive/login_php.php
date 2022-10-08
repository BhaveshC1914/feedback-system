<?php
session_start();
?>
<?php
	extract($_POST);
	include("database.php");
	if(isset($submit)){
		$sql="select * from user where user_uname='$usr' and user_pass='$pass'";
		$rs = $cn->query($sql);
		if($rs->num_rows < 1 )
		{
		echo "<script type='text/javascript'> alert('Wrong Username Or Password'); 
	history.back();
	</script>";
	}else{
		$sql2 = "select user_name from user where user_uname='$usr'";
		$rs2 = $cn->query($sql2);
		$row = $rs2->fetch_assoc();
		$name=$row["user_name"];
		$_SESSION["uname"]="$usr";
		$_SESSION["name"]="$name";
		header("Location: user_home.php");
	}}
?>