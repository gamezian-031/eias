<?php 
	include('config.php');

	$id = $_POST['id'];
	$statunumber = $_POST['statunumber'];

	$query = "UPDATE tbl_items SET item_status=$statunumber WHERE item_id=$id";

	$result = $con->query($query);

	if($result){
		header("Location:../items.php");
	}

?>