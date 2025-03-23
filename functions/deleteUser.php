<?php 
	include('config.php');

	$messsage = "";
	$error = 0;
	$uid = $_GET['userid'];

	$del_query = "DELETE FROM tbl_del_users WHERE user_id=$uid";
	$result = $con->query($del_query);


	if($result){
		$messsage = "Data temporarily deleted!";
		$error = 1;
		header("location:../users.php?messsage=$messsage&&error=$error");
	}else{
		$messsage = "Error";
		$error = 0;
		header("location:../users.php?messsage=$messsage&&error=$error");
	}
?>