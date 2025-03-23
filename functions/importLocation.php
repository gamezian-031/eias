<?php
include('config.php');
if(isset($_POST["import"])){
    
    $filename=$_FILES["file"]["tmp_name"];
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
        
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
             $sql = "INSERT into tbl_location(location_name,location_description,location_incharge) 
                   values ('".$getData[1]."','".$getData[2]."','".$getData[3]."')";
                   $result = mysqli_query($con, $sql);
        if(!isset($result))
        {
            $messsageCSV = "CSV File is not imported. Try again.";
            $error = 0;
            header("location:../locations.php?messsage=$messsageCSV&&error=$error");
        }
        else {
            $messsageCSV = "CSV File has been successfully Imported.";
            $error = 1;
            header("location:../locations.php?messsage=$messsageCSV&&error=$error");
       

        }
           }
      
           fclose($file);  
     }
  }   
?>