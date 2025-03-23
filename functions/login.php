<?php 
	session_start();
	$error = "";
	include('config.php');

	$username = $_POST['username'];
	$password = $_POST['password'];

	$query = "SELECT * FROM tbl_users INNER JOIN tbl_role ON tbl_users.role_id=tbl_role.role_id WHERE username='$username' AND password=md5('$password')";

	$result = $con->query($query);

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$_SESSION['user_id'] = $row['user_id'];
			$_SESSION['firstname'] = $row['firstname'];
			$_SESSION['lastname'] = $row['lastname'];
			$_SESSION['role_name'] = $row['role_name'];
			$_SESSION['role_id'] = $row['role_id'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];
			header("Location:../dashboard.php");
		}
	}else{
		$error = "Invalid Username and Password!";
		header("Location:../index.php?message=$error");
	}
?>