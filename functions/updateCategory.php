<?php 
	include('config.php');

	$messsage = "";
	$error = 0;
	$userid = $_POST['uid'];
	$category = $_POST['cname'];
	$category_description = $_POST['cdescription'];

	$query = "UPDATE `tbl_category` SET category_name='$category', category_description='$category_description' WHERE category_id=$userid";
	$result = $con->query($query);

	if($result){
		$messsage = "Data successfully updated!";
		$error = 1;
		header("location:../category.php?messsage=$messsage&&error=$error");
	}else{
		$messsage = "Error Problems";
		$error = 0;
		header("location:../category.php?messsage=$messsage&&error=$error");
	}
?>