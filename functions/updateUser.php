<?php 
	include('config.php');
	$messsage = "";
	$error = 0;
	$userid = $_POST['uid'];
	$email = $_POST['email'];
	$contactNo = $_POST['contactNo'];
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$age = $_POST['age'];
	$role = $_POST['role'];

	$query = "UPDATE `tbl_users` SET email='$email', contactNo='$contactNo', firstname='$firstname', lastname='$lastname', age='$age', role_id=$role WHERE user_id=$userid";

	$result = $con->query($query);

	if($result){
		$messsage = "Data successfully updated!";
		$error = 1;
		header("location:../users.php?messsage=$messsage&&error=$error");
	}else{
		$messsage = "Error Problems";
		$error = 0;
		header("location:../users.php?messsage=$messsage&&error=$error");
	}
?>