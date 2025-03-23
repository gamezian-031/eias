<?php 
	include('config.php');

	$messsage = "";
	$error = 0;
	$userid = $_POST['userid'];

	if(isset($_POST['accept'])){

		$query = "UPDATE `tbl_add_item` SET status=1 WHERE user_id=$userid AND status=0";

		$result = $con->query($query);

		if($result){
			$messsage = "Borrow successfully submitted. Please wait for approval!";
			$error = 1;
			header("location:../myborrow.php?messsage=$messsage&&error=$error");
		}else{
			$messsage = "Error";
			$error = 0;
			header("location:../myborrow.php?messsage=$messsage&&error=$error");
		}
	}
	if(isset($_POST['cancel'])){
		$query = "DELETE `tbl_add_item` WHERE status=0 AND user_id=$userid AND status=0";

		$result = $con->query($query);

		if($result){
			$messsage = "Borrow successfully cancelled.";
			$error = 2;
			header("location:../viewBorrow.php?messsage=$messsage&&error=$error");
		}else{
			$messsage = "Error";
			$error = 0;
			header("location:../viewBorrow.php?messsage=$messsage&&error=$error");
		}
	}

	/*
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
//Server settings
$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
$mail->isSMTP();                                            //Send using SMTP
$mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
$mail->SMTPAuth   = true;                                   //Enable SMTP authentication
$mail->Username   = 'eiassystem2021@gmail.com';                     //SMTP username
$mail->Password   = 'eias2021';                               //SMTP password
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
$mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

//Recipients
$mail->setFrom('adminemail@gmail.com', 'Admin');
$mail->addAddress('adminemail@gmail.com', 'Admin');     //Add a recipient
$mail->addReplyTo('no-reply@gmail.com', 'Information');
/*$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');*/

//Attachments
/*$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = 'System Notification';
$mail->Body    = 'You have pending request. Please check your pending list.';
//$mail->AltBody = 'Your borrowed item has been approved!';

$mail->send();
echo 'Message has been sent';
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

*/
?>