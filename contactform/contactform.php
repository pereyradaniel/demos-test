<!-- <!-- <!-- <?php -->

$nombre = $_POST['name'];
$mail = $_POST['email'];
$telefono = $_POST['subject'];
$empresa = $_POST['message'];

// $header = 'from: '.$mail."\r\n";
// $header .= "X-Mailer:PHP/".phpversion()."\r\n";
// $header .= "Mime-Version:1.0 \r\n";
// $header .= "content-Type:text/plain";

// $message = "este message fue enviado por: ".$name."\r\n";
// $message .= "Su e-mail es: ".$mail."\r\n";
// $message .= "Telefono: ".$subject."\r\n";
// $message .= "message: ".$_POST['message']."\r\n";
// $message .= "enviado el: ".date('d/m/Y',time());


// $para = 'pereyradaniell@gmail.com';
// $asunto = 'message de mi web'; -->

// if(mail($para,$asunto,utf8_decode($message),$header))
// echo "<script type='text/javascript'>alert('Tu message ha sido enviado exitosamente');</script>";
// echo "<script type='text/javascript'>window.location.href='http://servitecflhuaraz.com';</script>";

//  ?> -->

<?php
$email_address = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['subjet']) 		||
   empty($_POST['message'])	||
   !$email_address)
   {
	echo "No arguments Provided!";
	return false;
   }
$name = $_POST['name'];
if ($email_address === FALSE) {
    echo 'Invalid email';
    exit(1);
}
$phone = $_POST['phone'];
$message = $_POST['message'];
// Create the email and send the message
$to = 'pereyradaniell@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";
mail($to,$email_subject,$email_body,$headers);
return true;
?>