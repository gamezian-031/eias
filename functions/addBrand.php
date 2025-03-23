<?php 
	include('config.php');

	$messsage = "";
	$error = "";
	$brandName = $_POST['bname'];
	$brandDescription = $_POST['bdescription'];

	$query = "INSERT INTO `tbl_brands` (`brand_name`, `brand_description`) VALUES ('$brandName','$brandDescription')";

	$result = $con->query($query);

	if($result){
		$messsage = "Data successfully added!";
		$error = 1;
		header("location:../brands.php?messsage=$messsage&&error=$error");
	}else{
		$messsage = "All fields required";
		$error = "";
		header("location:../brands.php?messsage=$messsage&&error=$error");
	}
?>