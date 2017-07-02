<?php
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
	
// Create the email and send the message
$to = 'pidanic.j@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Domapupek.cz - zpráva od:  $name";
$email_body = "Obdržel jsi novou zprávu.\n\n"."Zde jsou detaily zprávy:\n\nJméno: $name\n\nE-mail: $email_address\n\nTelefon: $phone\n\nZpráva:\n$message";
$headers = "Odesílatel: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "odpovědět na: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>
