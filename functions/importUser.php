<?php
include('config.php');
if(isset($_POST["import"])){
    
    $filename=$_FILES["file"]["tmp_name"];
     if($_FILES["file"]["size"] > 0)
     {
        $file = fopen($filename, "r");
        $role_id = 2;
          while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
           {
            $pass=password_hash($getData[5], PASSWORD_DEFAULT);
             $sql = "INSERT into tbl_users(firstname,lastname,age,email,username,password,role_id) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."','".$getData[4]."','".$pass."','".$role_id."')";
                   $result = mysqli_query($con, $sql);
        if(!isset($result))
        {
            $messsageCSV = "CSV File is not imported. Try again.";
            $error = 0;
            header("location:../users.php?messsage=$messsageCSV&&error=$error");
        }
        else {
            $messsageCSV = "CSV File has been successfully Imported.";
            $error = 1;
            header("location:../users.php?messsage=$messsageCSV&&error=$error");
       

        }
           }
      
           fclose($file);  
     }
  }   
?>