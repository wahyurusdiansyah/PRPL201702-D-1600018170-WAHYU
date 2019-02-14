<?php
session_start();
include 'cek.php';
include 'config.php';
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
date_default_timezone_set('Asia/Jakarta');
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
// use
// $mail->Host = gethostbyname('smtp.gmail.com');
// if your network does not support SMTP over IPv6
//Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
$mail->Port = 587;
//Set the encryption system to use - ssl (deprecated) or tls
$mail->SMTPSecure = 'tls';
//Whether to use SMTP authentication
$mail->SMTPAuth = true;
//Username to use for SMTP authentication - use full email address for gmail
$mail->Username = "yourmail@gmail.com";
//Password to use for SMTP authentication
$mail->Password = "yourpass";
//Set who the message is to be sent from
$mail->From = "HT@noreply.com";
$mail->FromName = "Hotel Transylvania Admin";
//$mail->setFrom('hotel_transylvania@admin.com', 'Hotel Transylvania');
//Set an alternative reply-to address
//$mail->addReplyTo('hotel_transylvania@admin.com', 'Hotel Transylvania');
//Set who the message is to be sent to
  $cek = $_SESSION['uname'];
  $id = abs(crc32(uniqid()));
  $result = $con->query("SELECT * FROM user where uname = '$cek'");
  while ($mem = mysqli_fetch_assoc($result)):
  $name = $mem['uname'];
  $email = $mem['email'];
  $mail->addAddress($email, $name);
//Set the subject line
$mail->Subject = 'Verify Account';
//Replace the plain text body with one created manually
$mail->IsHTML(true);
$mail->Body = 'this is a verification code for your account '.$id.'<br>click here for verification http://localhost/hotelv2/user/verify_form.php';
//$mail->AltBody = 'This is a plain-text message body';
//send the message, check for errors
if(!$mail->Send())
{
   echo "Message could not be sent. ";
   echo "Mailer Error: " . $mail->ErrorInfo;
   exit;
}
endwhile;
$result->close();
$sql = "INSERT INTO verify(uname, verify_code)
    VALUES ('$cek','$id')";
$query = mysqli_query($con, $sql);
if($query){
  header("location:account.php?pesan=successverif");
}
$con->close();
?>
