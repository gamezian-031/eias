<?php 
	include('config.php');

	$itemid = $_GET['itemid'];
	$userid = $_GET['userid'];


	$query = "SELECT * FROM tbl_add_item WHERE item_add_id=$itemid AND user_id=$userid";

	$result = $con->query($query);

	$data = $result->fetch_assoc();

	$item_id = $data['item_id'];
	$item_quantity = $data['borrow_quantity'];
	$queryItem = "UPDATE tbl_items SET item_quantity=item_quantity+$item_quantity WHERE item_id=$item_id";
	echo $queryItem;
	$result_item = $con->query($queryItem);

	if($result_item){
		$deleteQuery = "DELETE FROM `tbl_add_item` WHERE item_add_id=$itemid";
		$result_delete = $con->query($deleteQuery);
		if($result_delete){
			header("Location:../viewBorrow.php");
		}
	}

?>