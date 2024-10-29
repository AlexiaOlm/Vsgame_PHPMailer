<?php
include_once "../lib/PHPMailer/Exception.php";
include_once "../lib/PHPMailer/PHPMailer.php";
include_once "../lib/PHPMailer/SMTP.php";

use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;

$mail = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro del juego</title>
</head>
<body>
    <h1>Hola, bienvenido al juego</h1>
    <p>Gracias por registrarte. ¡Esperamos que disfrutes del juego!</p>
</body>
</html>';

try {
    $phpmailer = new PHPMailer();
    $phpmailer->isSMTP();
    $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
    $phpmailer->SMTPAuth = true;
    $phpmailer->Port = 2525;
    $phpmailer->Username = '71fc3b641f70d2';
    $phpmailer->Password = 'ed40a2187decc7';

    $phpmailer->setFrom('vsgame@mailtrap.io', 'Vsgame');
    $phpmailer->addAddress('prueba@email.com');
    $phpmailer->isHTML(true);
    $phpmailer->Subject = "Bienvenido a Vsgame";
    $phpmailer->Body = $mail;
    $phpmailer->send();
    echo "Correo enviado con éxito";
} catch (Exception $e) {
    echo "No se pudo enviar el correo: $e";
}

?>

