<?php
session_start();
?>
<?php
	extract($_POST);
    include("database.php");
    $id = $_SESSION["query_id"];
	$sql="DELETE FROM `expert` WHERE query_id = '$id'";
	$rs = $cn->query($sql);
    header("Location: expert.php");
?>