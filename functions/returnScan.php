<?php 
	include('config.php');

	$itemid = $_POST['itemid'];
	$itemQuantity = $_POST['itemQuantity'];
	$status = $_POST['status'];
	$receivername = $_POST['receivername'];
	$userid = $_POST['userid'];
	$remarks = $_POST['remarks'];

	$query = "UPDATE tbl_add_item SET status=4 WHERE item_id=$itemid AND user_id=$userid";

	$result = $con->query($query);

	if($result){
		$queryInsert = "INSERT INTO tbl_returned_item (`item_id`, `return_quantity`, `status`, `received_name`, `borrower_id`, `remarks`) VALUES ($itemid, $itemQuantity, $status,'$receivername', $userid, '$remarks')";

		$results = $con->query($queryInsert);
		if($results){
			$queryInsertIn = "INSERT INTO tbl_add_item (`borrow_quantity`, `user_id`, `item_id`, `status`) VALUES ($itemQuantity,$userid,$itemid,5)";

			$resultss = $con->query($queryInsertIn);

			if($resultss){
				$messsage = "Returned successfully submitted";
				$error = 1;
				header("location:../scanview.php?messsage=$messsage&&error=$error");
			}else{
				$messsage = "Error";
				$error = 0;
				header("location:../scanview.php?messsage=$messsage&&error=$error");
			}
		}
	}
?>