<?php 
 
 // Load the database configuration file 
 include('config.php');
  
 $filename = "Category_Data_" . date('Y-m-d') . ".csv"; 
 $delimiter = ","; 
 // Create a file pointer 
 $f = fopen('php://memory', 'w'); 
  
 // Set column headers 
 $fields = array('ID', 'Category', 'Description'); 
 fputcsv($f, $fields, $delimiter); 
  
 // Get records from the database 
 $query = "SELECT * FROM `tbl_category`";
 $result = $con->query($query);
 if($result->num_rows > 0){ 
  
     // Output each row of the data, format line as csv and write to file pointer 
     while($row = $result->fetch_assoc()){ 

         $lineData = array($row['category_id'], $row['category_name'], $row['category_description']); 
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