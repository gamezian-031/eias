<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader

include('config.php');

require 'vendor/autoload.php';
    //$mail = new PHPMailer(true);

    $messsage = "";
    $error = 0;
    $email = $_GET['email'];
    $itemaddid = $_GET['itemaddid'];
    $uid = $_GET['uid'];

    $query = "UPDATE tbl_add_item SET status = 2 WHERE item_add_id=$itemaddid;";
    $query .= " INSERT INTO `tbl_logs`(`user_id`, `item_id`, `Activities`) VALUES ($uid,$itemaddid,'Approved Borrow Request')";

    $result = $con->multi_query($query);
    
    if($result){
        header("location:../request.php");
    } else {
        header("location:../request.php");
    }      
/*

try {
            
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            // $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'eiassystem2021@gmail.com';                     //SMTP username
            $mail->Password   = 'eias2021';                               //SMTP password
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            // $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            // $mail->SMTPSecure = 'tls'; 
            $mail->Port       = 587;   
            $mail->SMTPSecure = 'ssl';
            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('adminemail@example.com', 'Admin');
            $mail->addAddress($email, 'Users');     //Add a recipient
            $mail->addReplyTo('no-reply@gmail.com', 'Information');
            $mail->addCC('cc@example.com');
            $mail->addBCC('bcc@example.com');
        
            //Attachments
            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
        
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'System Notification';
            $mail->Body    = 'Your borrowed item has been approved!';
            //$mail->AltBody = 'Your borrowed item has been approved!';
        
            $mail->send();
            // echo 'Message has been sent';
            
            $messsage = "Borrow successfully approved.";
            $error = 1;
            header("location:../request.php?messsage=$messsage&&error=$error");
        
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
      
    }else{
        $messsage = "Error";
        $error = 0;
        header("location:../request.php?messsage=$messsage&&error=$error");
    }

*/


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

//Create an instance; passing `true` enables exceptions

?>