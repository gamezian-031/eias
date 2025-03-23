<?php 
	include('config.php');

	$messsage = "";
	$error = 0;
	$categoryName = $_POST['cname'];
	$categoryDescription = $_POST['cdescription'];

	$query = "INSERT INTO `tbl_category` (`category_name`, `category_description`) VALUES ('$categoryName','$categoryDescription')";

	$result = $con->query($query);

	if($result){
		$messsage = "Data successfully added!";
		$error = 1;
		header("location:../category.php?messsage=$messsage&&error=$error");
	}else{
		$messsage = "All fields required";
		$error = 0;
		header("location:../category.php?messsage=$messsage&&error=$error");
	}
?>