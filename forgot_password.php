<?php
require "connect.php";
require "mailer.php";

$msg = "";

if (isset($_POST['send'])) {

    $email = trim($_POST['email']);

    $stmt = $pdo->prepare("SELECT id FROM users WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {

        $token  = bin2hex(random_bytes(32));
        $hash   = password_hash($token, PASSWORD_DEFAULT);
        $expire = date("Y-m-d H:i:s", time() + 900); // 15 phút

        
        
        $stmt = $pdo->prepare("
            UPDATE users 
            SET reset_token=?, reset_expire=? 
            WHERE id=?
        ");
        $stmt->execute([$hash, $expire, $user['id']]);

        $appUrl = rtrim($_ENV['APP_URL'], '/');
        $link = $appUrl . "/reset_password.php?token=" . urlencode($token);
        

        sendResetPassword($email, $link);
    }

    // Không tiết lộ email có tồn tại hay không
    $msg = "Nếu email tồn tại, link đặt lại mật khẩu đã được gửi.";
}



?>
