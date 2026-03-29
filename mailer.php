<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'config.php';

function sendOTP($email, $otp){
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $_ENV['SMTP_EMAIL'];
    $mail->Password   = $_ENV['SMTP_PASS'];
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;
    $mail->CharSet    = 'UTF-8';

    $mail->setFrom($_ENV['SMTP_EMAIL'], 'He thong dang nhap');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Ma OTP dang nhap';
    $mail->Body = "
        <h3>Mã OTP của bạn</h3>
        <p><b>$otp</b></p>
        <p>Hiệu lực 5 phút</p>
    ";
    return $mail->send();
}

function sendResetPassword($email, $link) {
    $mail = new PHPMailer(true);

    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = $_ENV['SMTP_EMAIL'];
    $mail->Password = $_ENV['SMTP_PASS'];
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->setFrom($_ENV['SMTP_EMAIL'], 'He thong');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Đặt lại mật khẩu';
    $mail->Body = "
        <p>Nhấn vào link bên dưới để đặt lại mật khẩu:</p>
        <p><a href='$link'>$link</a></p>
        <p>Link có hiệu lực 15 phút</p>
    ";

    $mail->send();
}
?>