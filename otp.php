<?php
// EMAIL SENDING
session_start();
 $otp_str=str_shuffle("0123456789");
  $otp_gen=substr($otp_str,0,6);
  $_SESSION['otp'] = $otp_gen;

require 'PHPMailerAutoload.php';
require 'PHPMailer/credential.php';

$mail = new PHPMailer;

// $mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = EMAILID;                 // SMTP username
$mail->Password = PASSW;                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom(EMAILID, 'AIDA-CHATBOT');
$mail->addAddress($email);     // Add a recipient
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Your OTP verification code to login AIDA-Chatbot';
$mail->Body    = "<p>Dear student, </p><h3>Your OTP verification code is: $otp_gen <br></h3>
<br/>
<p>Only after verification you will be able to access our chatbot - AIDA </p>
<br/><br/>
<p >This is a system generated mail. So, please do not reply to this mail!</p>
<p>With regards,</p>
<p><b>AIDA-Chatbot</b></p>";
if(!$mail->send()){
    ?>
    <script>
      alert("<?php echo "Login details are incorrect. Please try again!"?>");
      $valid=false;
    </script>
    <?php
    }else{
    ?>
    <script>
      alert("<?php echo "OTP sent to " . $email ?>");
      window.location.replace("otp_verification.php");
      </script>
    <?php

  }  

?>

