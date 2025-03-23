<?php

	require_once "../config/config.php";


	/**
	* 
	*/
	class display
	{

        public function chart_inventory()
		{
			global $conn;

			$sql = $conn->prepare('SELECT * FROM tbl_items GROUP BY category_id');
			$sql->execute();
			$get = $sql->fetchAll();
			$count = $sql->rowCount();

			if($count > 0){

				foreach ($get as $key => $value) {
					$val[] = array('country'=>$value['category_id'],'litres'=>$value['item_quantity']);
				}
				echo json_encode($val);

			}else{
				$val[] = array();
				echo json_encode($val);
			}
		}
        
    }

    $display = new display();

	$key = trim($_POST['key']);

	switch ($key) {

        case 'chart_inventory';
		$display->chart_inventory();
		break;
    }

?>