<?php
require_once("PHPMailer/PHPMailerAutoload.php"); // this will include smtp and pop files.

if(isset($_POST['email'])) {

   $email_to = "ekundayo.ab@i-cubeworldwide.net";

  /* function died($error) {// your error code can go here
        echo "We're sorry, but there's errors found with the form you submitted.<br /><br />";
        echo $error."<br /><br />";
        echo "Please go back and fix these errors.<br /><br />";
        die();
   }

   // validation expected data exists
   if(!isset($_POST['first_name']) ||!isset($_POST['last_name']) ||!isset($_POST['email']) ||!isset($_POST['telephone']) ||!isset($_POST['subject']) || !isset($_POST['comments'])) {
       died('We are sorry, but there appears to be a problem with the form you submitted.');
   } */

   $first_name = $_POST['name']; // required
   $email_from = $_POST['email']; // required
   $telephone = $_POST['phone']; // not required
   $subject = $_POST['message']; // required

   $error_message = "";
   $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
   if(!preg_match($email_exp,$email_from)) {
       $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
   }

   $string_exp = "/^[A-Za-z .'-]+$/";
   if(!preg_match($string_exp,$first_name)) {
      $error_message .= 'The First Name you entered does not appear to be valid.<br />';
   }

   if(!preg_match($string_exp,$subject)) {
      $error_message .= 'The Last Name you entered does not appear to be valid.<br />';
   }

  // if(strlen($error_message) > 0) {
//       died($error_message);
//   }
   $email_message = "\n\n";
/*
   $email_message .= "First Name: ".clean_string($first_name)."\n";
   $email_message .= "Last Name: ".clean_string($last_name)."\n";
   $email_message .= "Email: ".clean_string($email_from)."\n";
   $email_message .= "Telephone: ".clean_string($telephone)."\n";
   $email_message .= "Subject: ".clean_string($subject)."\n";
   $email_message .= "Comments: ".clean_string($comments)."\n";
*/
   $mail = new PHPMailer();
   $mail->isSendmail();
   $mail->setFrom($email_from, $first_name, $telephone);
   $mail->addAddress($email_to, 'Ekundayo Abiona');
   $mail->Subject = $subject;

   if (!$mail->send()) { //send the message, check for errors
      echo "Mailer Error: "; /*. died($error);*/
   } else {
       header('Location: contact.php?result=success');
   }
?>

<!-- place your own success html below -->

<?php
}
die();
?>
