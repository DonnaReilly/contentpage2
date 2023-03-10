<?php

// Replace this with your own email address
$to = "donnareillycopy601@gmail.com";

function url(){
  return sprintf(
    "%s://%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME']
  );
}

if($_POST) {

   $name = trim(stripslashes($_POST['name']));
   $email = trim(stripslashes($_POST['email']));
   $subject = trim(stripslashes($_POST['subject']));
   $contact_message = trim(stripslashes($_POST['message']));

   $organization = trim(stripslashes($_POST['organization']));
   $budget = trim(stripslashes($_POST['budget']));
   $date = trim(stripslashes($_POST['date']));


	if ($subject == '') { $subject = "Contact Form Submission"; }

   // Set Message
   $message .= "Email from: " . $name . "<br />";
	 $message .= "Email address: " . $email . "<br />";

   $message .= "Organization: " . $organization . "<br />";
   $message .= "Budget: " . $budget . "<br />";
   $message .= "Lunch Date: " . $date . "<br />";

   $message .= "Message: <br />";
   $message .= nl2br($contact_message);
   $message .= "<br /> ----- <br /> This email was sent from your site " . url() . " contact form. <br />";

   // Set From: header
   $from =  $name . " <" . $email . ">";

   // Email Headers
	$headers = "From: " . $from . "\r\n";
	$headers .= "Reply-To: ". $email . "\r\n";
 	$headers .= "MIME-Version: 1.0\r\n";
	$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";


    mail($to, $subject, $message, $headers);

	if ($mail) { echo "OK"; }
   else { echo "Something went wrong. Please try again."; }

}

?>
