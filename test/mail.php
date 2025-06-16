<?php

require_once __DIR__. '/../config.php';

//noreply@marketingprogramm.luzern.com
//CmL{bKV6(YpM{$M


$smtp = new \Nemundo\App\Mail\Message\Smtp\SmtpMailMessage();
$smtp->connection->host = 'mail.cyon.ch';
$smtp->connection->port = 465;
$smtp->connection->user = 'noreply@marketingprogramm.luzern.com';
$smtp->connection->password = 'CmL{bKV6(YpM{$M';
$smtp->connection->mailFrom= 'noreply@marketingprogramm.luzern.com';
$smtp->connection->mailFromText= 'Marketingprogramm LTAG';
$smtp->subject='test mail';
$smtp->text ='test';
//$smtp->addTo('urs.lang@luzern.com');
$smtp->addTo('urs.lang@gmail.com');
$smtp->sendMail();







