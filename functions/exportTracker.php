<?php 
 
 // Load the database configuration file 
 include('config.php');
  
 $filename = "Inventory_Data_Tracker" . date('Y-m-d') . ".csv"; 
 $delimiter = ","; 
 // Create a file pointer 
 $f = fopen('php://memory', 'w'); 
  
 // Set column headers 
 $fields = array('ID', 'Item Name', 'New Location', 'Status'); 
 fputcsv($f, $fields, $delimiter); 
  
 // Get records from the database 
 $query = "SELECT * FROM `tbl_item_tracker` INNER JOIN tbl_location ON tbl_item_tracker.new_location_id=tbl_location.location_id INNER JOIN tbl_items ON tbl_item_tracker.item_id = tbl_items.item_id ";
 $result = $con->query($query);
 if($result->num_rows > 0){ 
  
     // Output each row of the data, format line as csv and write to file pointer 
     while($row = $result->fetch_assoc()){ 

         $lineData = array($row['tracker_id'], $row['item_name'], $row['location_name'], $row['item_status']); 
         fputcsv($f, $lineData, $delimiter); 
     } 
 }else{
     die('error');
 }
  
 // Move back to beginning of file 
 fseek($f, 0); 
  
 // Set headers to download file rather than displayed 
 header('Content-Type: text/csv'); 
 header('Content-Disposition: attachment; filename="' . $filename . '";'); 
  
 // Output all remaining data on a file pointer 
 fpassthru($f); 
  
 // Exit from file 
 exit();