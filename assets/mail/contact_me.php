<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
   $mail->SMTPDebug = 3;  
   $mail->Debugoutput = 'html';
   $mail->setLanguage('pt');                    // Enable verbose debug output
   $mail->isSMTP();                                            // Send using SMTP
   $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
   $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
   $mail->Username   = 'atendimentoagendaagil@gmail.com';                     // SMTP username
   $mail->Password   = 'agendaagil060420';                               // SMTP password
   $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
   $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
   $mail->setFrom('atendimentoagendaagil@gmail.com');
   //$mail->addReplyTo('no-reply@email.com.br');
   $mail->addAddress('matheusmatmac@hotmail.com.br', "Matheus Santos");
   /*$mail->addAddress('email@email.com.br', 'Contato'’);
   $mail->addCC('email@email.com.br', 'Cópia');
   $mail->addBCC('email@email.com.br', 'Cópia Oculta');*/

   $mail->isHTML(true);
   $mail->Subject = "Formulário de contato do site DevWave:  $name";
   $mail->Body    = nl2br("Você recebeu uma nova mensagem do formulário de contato do seu site DevWave.\n\n"."Aqui estão os detalhes:\n\nNome: $name\n\nE-mail: $email_address\n\nTelefone: $phone\n\nMensagem:\n$message");
   $mail->AltBody = nl2br(strip_tags("Você recebeu uma nova mensagem do formulário de contato do seu site DevWave.\n\n"."Aqui estão os detalhes:\n\nNome: $name\n\nE-mail: $email_address\n\nTelefone: $phone\n\nMensagem:\n$message"));
   //$mail->addAttachment('/tmp/image.jpg', 'nome.jpg');

   $mail->send();
   return true;
   //echo 'Message has been sent';
} catch (Exception $e) {
   echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
/*
$name = strip_tags(htmlspecialchars($_POST['name']));
$email_address = strip_tags(htmlspecialchars($_POST['email']));
$phone = strip_tags(htmlspecialchars($_POST['phone']));
$message = strip_tags(htmlspecialchars($_POST['message']));
   
// Create the email and send the message
$to = 'atendimentoagendaagil@gmail.com'; // Add your email address in between the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Formulário de contato do site DevWave:  $name";
$email_body = "Você recebeu uma nova mensagem do formulário de contato do seu site DevWave.\n\n"."Aqui estão os detalhes:\n\nNome: $name\n\nE-mail: $email_address\n\nTelefone: $phone\n\nMensagem:\n$message";
$headers = "From: matheusmatmac@hotmail.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";   
mail($to,$email_subject,$email_body,$headers);
return true;   */      
?>