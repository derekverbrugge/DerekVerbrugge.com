<?php $name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
$formcontent="From: $name \n Message: $message";
<<<<<<< HEAD
$recipient = "derekverbrugge@gmail.com";
=======
$recipient = "emailaddress@here.com";
>>>>>>> cf62a20c3e90a0f47f2ee25348953a12a6cce727
$subject = "Contact Form";
$mailheader = "From: $email \r\n";
mail($recipient, $subject, $formcontent, $mailheader) or die("Error!");
echo "Thank You!";
<<<<<<< HEAD
?> 
=======
?>
>>>>>>> cf62a20c3e90a0f47f2ee25348953a12a6cce727
