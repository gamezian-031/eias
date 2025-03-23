<?php 
	include('config.php');

	$messsage = "";
	$error = 0;
	$bid = $_POST['bid'];
	$brand = $_POST['bname'];
	$brand_description = $_POST['bdescription'];

	$query = "UPDATE `tbl_brands` SET brand_name='$brand', brand_description='$brand_description' WHERE brand_id=$bid";
	$result = $con->query($query);

	if($result){
		$messsage = "Data successfully updated!";
		$error = 1;
		header("location:../brands.php?messsage=$messsage&&error=$error");
	}else{
		$messsage = "Error Problems";
		$error = 0;
		header("location:../brands.php?messsage=$messsage&&error=$error");
	}
?>