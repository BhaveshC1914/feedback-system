<body>
	<?php
		extract($_POST);
		include("database.php");
		
		$sql="SELECT * FROM `user` WHERE `user`='$username' ";
		$rs = $cn->query($sql);
		if($rs->num_rows > 0 )
			{
			echo "<script type='text/javascript'>  alert('Username Already Exists'); 
			window.location='index.php';	
			</script>";
		exit;
		}
		
		//$ins="INSERT INTO `doctor` (`did`, `user`, `password`, `name`, `hospital`, `special`, `contactno`, `email`, `regno`, `Address`, `adhar`) 
		//VALUES ('1', 'ruchika', 'pass', 'ruchika choudhary', 'hoap', 'mmnnnx', 'jahaxs', 'axghahg', 'amjgha', 'ajgsjh', 'ahsafsfs')";
		$ins="INSERT INTO `user` (`user_id`, `user_name`, `user_uname`, `user_email`, `user_contact`, `user_pass`)
		VALUES (NULL, '$name', '$user', '$email', '$cno', '$pass')";
		if ($cn->query($ins) === TRUE) {
			echo "<script>alert('New record created successfully')
			window.location='index.php';	</script>";
		} 		else {
			echo "Error: " . $ins . "<br>" . $cn->error;
			}
		//$cn->query($ins) or die("hhhh!");
		//echo "<script type='text/javascript'>  alert('Thank You! You are registered sucessfully'); 
		//	window.location='index.html';	
		//</script>";
?>
</body>