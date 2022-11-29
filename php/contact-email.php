<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('phpmailer/vendor/phpmailer/phpmailer/src/Exception.php');
require('phpmailer/vendor/phpmailer/phpmailer/src/PHPMailer.php');
require('phpmailer/vendor/phpmailer/phpmailer/src/SMTP.php');

function errorEmail() {
    $messageStruct = [
        'id' => 2,
        'message' => 'Email rejeitado.'
    ];
    $message = json_encode($messageStruct);
    echo $message;
    die();
}


$input = file_get_contents('php://input');
$decode = json_decode($input, true);

if (
    !isset($decode['first_name']) || empty($decode['first_name']) ||
    !isset($decode['last_name']) || empty($decode['last_name']) ||
    !isset($decode['email']) || empty($decode['email']) ||
    !isset($decode['subject']) || empty($decode['subject'])
) { 
    errorEmail();
    die();
};

$first_name = $decode['first_name'];
$last_name = $decode['last_name'];
$email = $decode['email'];
$subject = $decode['subject'];
$message = $decode['message'];

$emailBody = "
Olá! $first_name $last_name te enviou um email.<br>
Endereço eletrônico: $email<br>
<br>
Mensagem:<br>
$message
";


try {
    // Send mail
    $mail = new PHPMailer(true);
    
    // SMTP server (needs configuration)
    $host = 'smtp.gmail.com';
    $username = 'rabiscoinbox@gmail.com';
    $password = 'yvlddbsufexxeshz';
    $port = 465;
    
    $mail->isSMTP();
    $mail->Host = $host;
    $mail->SMTPAuth = true;
    $mail->Username = $username;
    $mail->Password = $password;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = $port;
    
    $mail->setFrom($username);
    $mail->addAddress($username);
    $mail->isHTML(true);
    
    $mail->Subject = $subject;
    $mail->Body = $emailBody;
    
    $mail->send();
    
    // Callback
    $messageStruct = [
        'id' => 1,
        'message' => 'Email enviado!'
    ];
    $message = json_encode($messageStruct);
    echo $message;
} catch(Exception $e) {
    errorEmail();
}


?>