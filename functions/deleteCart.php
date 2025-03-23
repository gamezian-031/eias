<?php 
	include('config.php');

	$id = $_GET['id'];
	$item_id = $_GET['itemid'];
	$item_quantity = $_GET['item_quantity'];

	$query = "DELETE FROM tbl_add_item WHERE item_add_id=$id;";
	$query .= " UPDATE tbl_items SET item_quantity=$item_quantity WHERE item_id=$item_id";

	$result = $con->multi_query($query);

	if($result){
		$messsage = "Delete cart successfully!";
		$error = 1;
		header("location:../viewBorrow.php?messsage=$messsage&&error=$error");
	}else{
		$messsage = "All fields required";
		$error = 0;
		header("location:../viewBorrow.php?messsage=$messsage&&error=$error");
	}

?>