<?php 
include('config.php');

$messsage = "";
$error = 0;
$uid = $_GET['userid'];

$rec_query = "INSERT INTO tbl_del_users SELECT * FROM tbl_users WHERE user_id=$uid";
$result = $con->query($rec_query);

$rec_items_query = "INSERT INTO tbl_del_item SELECT * FROM tbl_add_item WHERE user_id=$uid";
$con->query($rec_items_query);

$del_query = "DELETE FROM tbl_users WHERE user_id=$uid";
$con->query($del_query);

$del_items_query = "DELETE FROM tbl_add_item WHERE user_id=$uid";
$con->query($del_items_query);

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