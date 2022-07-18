<?php
session_start();
$otp=rand(11111,99999);
$con=mysqli_connect('localhost','root','','user');
$email=$_POST['email'];
$res=mysqli_query($con,"select * from user where email='$email'");
$count=mysqli_num_rows($res);
if($count>0){
	
	mysqli_query($con,"update user set otp='$otp' where email='$email'");
	$_SESSION['EMAIL']=$email;
	// smtp_mailer($email,'OTP Verification',$html);
	echo "yes";
}
else{
	echo "not_exist";
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require('phpMailer/Exception.php');
require('phpMailer/SMTP.php');
require('phpMailer/PHPMailer.php');

//Create an instance; passing `true` enables exceptions
if($count>0){
$mail = new PHPMailer(true);


try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'alankritsingh5@gmail.com';                     //SMTP username
    $mail->Password   = 'smlnbzqelobjykkj';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;            //Enable implicit TLS encryption
    $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('alankritsingh5@gmail.com', 'Alankrit');
    $mail->addAddress($email); 

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Please verify yourself :)';
    $mail->Body    = "Your otp verification code for emaild Id $email is $otp";

    $mail->send();
    // echo 'Message has been sent';
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>