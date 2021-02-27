<?php 

$name = $_POST['name'];
$email = $_POST['email'];
$feedback = $_POST['feedback'];

$toaddress = "feedback@example.com" ;
$toaddress = "ramnik.dahiya@gmail.com";
$subject = "Feedback from web site";

$mailcontent = "Customer name: ".$name."\n".
  "Customer email: ".$email."\n". 
  "Customer comments: \n".$feedback."\n";

$fromaddress = "From: webserver@example.com";

//invoke mail() function to send mail.

mail($toaddress, $subject, $mailcontent, $fromaddress);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bob's Auto Parts - Feedback Submitted</title>
</head>
<body>
  <h1>Feedback submitted</h1>
  <p>Your feedback has been sent </p>
</body>
</html>