<?php
include('config.php');
if(isset($_POST["import"])){
    
    $filename=$_FILES["file"]["tmp_name"];
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
        
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
             $sql = "INSERT into tbl_suppliers(supplier_name,supplier_address,supplier_contactnum, supplier_email) 
                   values ('".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."')";
                   $result = mysqli_query($con, $sql);
        if(!isset($result))
        {
            $messsageCSV = "CSV File is not imported. Try again.";
            $error = 0;
            header("location:../supplier.php?messsage=$messsageCSV&&error=$error");
        }
        else {
            $messsageCSV = "CSV File has been successfully Imported.";
            $error = 1;
            header("location:../supplier.php?messsage=$messsageCSV&&error=$error");
       

        }
           }
      
           fclose($file);  
     }
  }   
?>