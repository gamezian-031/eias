<?php 
	include('config.php');

	$messsage = "";
	$error = 0;
	$email = $_POST['email'];
	$contactNo = $_POST['contactNo'];
	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$age = $_POST['age'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$role = $_POST['role'];

	$query = "INSERT INTO `tbl_users` ( `email`, `contactNo`, `firstname`, `lastname`, `age`, `username`, `password`, `role_id`) VALUES ('$email','$contactNo','$firstname','$lastname','$age','$username',md5('$password'),$role)";

	$result = $con->query($query);

	if($result){
		$messsage = "Data successfully added!";
		$error = 1;
		header("location:../users.php?messsage=$messsage&&error=$error");
	}else{
		$messsage = "All fields required";
		$error = 0;
		header("location:../users.php?messsage=$messsage&&error=$error");
	}
?>