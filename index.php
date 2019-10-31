<?php

try {
    require("vendor/autoload.php");

    ini_set('display_errors', true);
    error_reporting(E_ALL ^E_NOTICE);

    $message = new Swift_Message();
    $message->setSubject(getenv('V_ASSUNTO'))
        ->setFrom(getenv('V_REMETENTE'))
        ->setTo(getenv('V_DESTINATARIO'))
        ->setBody(getenv('V_CORPOEMAIL'));
    $mailer = new Swift_Mailer($transport);
    $transport = new Swift_SmtpTransport(getenv('V_SMTPHOST'), getenv('V_SMTPPORT'));
    $transport->setUsername(getenv('V_USUARIO'))
        ->setPassword(getenv('V_SENHA'))
        ->setEncryption(getenv('V_CRIPTOGRAFIA'))
        ->setAuthMode(getenv('V_MODOAUTENTICACAO'));
    $emailsEnviados = $mailer->send($message);

    xd("E-mails enviados : {$emailsEnviados}");
} catch (Exception $exception) {
    xd($exception->getMessage(), $exception->getTrace());
}
