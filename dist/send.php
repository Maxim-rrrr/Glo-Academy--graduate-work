<?php

$modalName = $_POST['modalName'];
$modalPhone = $_POST['modalPhone'];

$costName = $_POST['costName'];
$costEmail = $_POST['costEmail'];
$costAddress = $_POST['costAddress'];
$costMessage = $_POST['costMessage'];

$contactsName = $_POST['contactsName'];
$contactsEmail = $_POST['contactsEmail'];
$contactsPhone = $_POST['contactsPhone'];
$contactsMessage = $_POST['contactsMessage'];


// Load Composer's autoloader
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer\PHPMailer\PHPMailer();


try {
  //Server settings
  $mail->SMTPDebug = 0;                                       // Enable verbose debug output
  $mail->isSMTP();                                            // Send using SMTP
  $mail->Host       = "smtp.mail.ru";                         // Set the SMTP server to send through
  $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
  $mail->Username   = 'sendingmessage@mail.ru';               // SMTP username
  $mail->Password   = 'Eo$P4KuuioP1';                         // SMTP password
  $mail->SMTPSecure = 'ssl';                                  // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
  $mail->Port       = 465;                                    // TCP port to connect to

  //Recipients
  $mail->setFrom('sendingmessage@mail.ru', 'SAYTSPB');
  $mail->addAddress('kewin.rrrr@gmail.com');                  // Add a recipient

  // Content
  $mail->CharSet = "UTF-8";
  $mail->isHTML(true);                                        // Set email format to HTML
  
  if (!empty($modalName)) {

    $mail->Subject = "Заказ звонка SAYTSPB";
    $mail->Body    = "<b>Имя пользователя:</b> ${modalName}<br>
                      <b>Телефон:</b>          ${modalPhone}";

  } elseif(!empty($costName)) {

    $mail->Subject = "Узнать стоимость";
    $mail->Body    = "<b>Имя пользователя:</b> ${costName}<br>
                      <b>E-mail:</b>           ${costEmail}<br>
                      <b>Адрес веб-сайта:</b>  ${costAddress}<br>
                      <b>Сообщение:</b>        ${costMessage}";
                      
  } elseif(!empty($contactsName)) {

    $mail->Subject = "Вопрос";
    $mail->Body    = "<b>Имя пользователя:</b> ${contactsName}<br>
                      <b>E-mail:</b>           ${contactsEmail}<br>
                      <b>Номер телефона:</b>  ${contactsPhone}<br>
                      <b>Сообщение:</b>        ${contactsMessage}";
                      
  }

  if ($mail->send()) {
    echo "Ok";
  } else {
    echo "Письмо не отправлено, есть ошибка. Код ошибки: {$mail->ErrorInfo}";
  }
} catch (Exception $e) {
  echo "Письмо не отправлено, есть ошибка. Код ошибки: {$mail->ErrorInfo}";
}

  