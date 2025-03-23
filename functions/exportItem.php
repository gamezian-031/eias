<?php 
 
 // Load the database configuration file 
 include('config.php');
  
 $filename = "Inventory_Data_" . date('Y-m-d') . ".csv"; 
 $delimiter = ","; 
 // Create a file pointer 
 $f = fopen('php://memory', 'w'); 
  
 // Set column headers 
 $fields = array('ID', 'Item name', 'Item Category', 'Brand Name', 'Location', 'Quantity', 'Property no./Serial no.', 'Unit of Measurement', 'Timestamp'); 
 fputcsv($f, $fields, $delimiter); 
  
 // Get records from the database 
 $query = "SELECT *,tbl_items.timestamp FROM `tbl_items` INNER JOIN tbl_location ON tbl_items.location_id=tbl_location.location_id 
 INNER JOIN tbl_category ON tbl_items.category_id=tbl_category.category_id 
 INNER JOIN tbl_brands ON tbl_items.brand_id=tbl_brands.brand_id ";
 $result = $con->query($query);
 if($result->num_rows > 0){ 
  
     // Output each row of the data, format line as csv and write to file pointer 
     while($row = $result->fetch_assoc()){ 

         $lineData = array($row['item_id'], $row['item_name'], $row['category_name'],$row['brand_name'], $row['location_name'], $row['item_quantity'], $row['property_no'], $row['unit'], $row['timestamp']); 
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