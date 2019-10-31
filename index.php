<?php

try {

    require("vendor/autoload.php");

    ini_set('display_errors', true);
    error_reporting(E_ALL ^E_NOTICE);

    $message = new Swift_Message();
    $message->setSubject($assunto)
        ->setFrom($remetente)
        ->setTo($destinatario)
        ->setBody($corpoEmail);
    $mailer = new Swift_Mailer($transport);
    $transport = new Swift_SmtpTransport($smtpHost, $smtpPort);
    $transport->setUsername($usuario)
        ->setPassword($senha)
        ->setEncryption($criptografia)
        ->setAuthMode($modoAutenticacao);
    $result = $mailer->send($message);

    xd("E-mails enviados : {$result}");
} catch (Exception $exception) {
    xd($exception);
}
