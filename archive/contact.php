 <?php
 
	extract($_POST);
		include("database.php");
		$ins="INSERT INTO `contat` (`id`, `name`, `email`, `subject`, `message`)
		VALUES (NULL, '$name', '$email', '$subject', '$message')";
		if ($cn->query($ins) === TRUE) {
			echo "<script type='text/javascript'>  alert('Thank You!'); 
			window.location='index.php'	
		</script>";
		} 		else {
			echo "Error: " . $ins . "<br>" . $cn->error;
			}
		//$cn->query($ins) or die("hhhh!");
		
?>
</body>