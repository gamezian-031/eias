<?php 
	include('config.php');

	$messsage = "";
	$error = 0;
	$brand = $_POST['brand'];
	$iname = $_POST['iname'];
	$category = $_POST['category'];
	$prevLocation = $_POST['prevLocation'];
	$newLocation = $_POST['newLocation'];
	$inCharge = $_POST['inCharge'];
	$reason = $_POST['reason'];
	$status = $_POST['status'];
	

	$query = "INSERT INTO `tbl_item_tracker` (`brand_id`, `item_id`,`category_id`, `prev_location_id`, `new_location_id`, `admin_incharge`,`reason`, `item_status`) VALUES ($brand,'$iname','$category','$prevLocation','$newLocation','$inCharge','$reason', $status)";

	$result = $con->query($query);

	if($result){
		$messsage = "Data successfully added!";
		$error = 1;
		header("location:../track.php?messsage=$messsage&&error=$error");
	}else{
		$messsage = "All fields required";
		$error = 0;
		header("location:../track.php?messsage=$messsage&&error=$error");
	}
?>