<?php 
	include('config.php');

	$messsage = "";
	$error = 0;
	$supplierName = $_POST['sname'];
	$supplierAddress = $_POST['saname'];
	$supplierContactnum = $_POST['sContactnum'];
	$supplierEmail = $_POST['sEmail'];

	$query = "INSERT INTO `tbl_suppliers` (`supplier_name`, `supplier_address`, `supplier_contactnum`, `supplier_email`) VALUES ('$supplierName','$supplierAddress' , '$supplierContactnum', '$supplierEmail')";

	$result = $con->query($query);

	if($result){
		$messsage = "Data successfully added!";
		$error = 1;
		header("location:../supplier.php?messsage=$messsage&&error=$error");
	}else{
		$messsage = "All fields required";
		$error = 0;
		header("location:../supplier.php?messsage=$messsage&&error=$error");
	}
?>