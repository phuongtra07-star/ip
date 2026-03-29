<?php
session_start();
require "connect.php";
require "mailer.php";

$mode = $_GET['mode'] ?? 'login';
$error = "";
$success = "";

/* ================= AUTO LOGIN BY REMEMBER TOKEN ================= */
if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_token'])) {

    $stmt = $pdo->query("SELECT id, remember_token, username,level FROM users WHERE remember_token IS NOT NULL");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        if (password_verify($_COOKIE['remember_token'], $row['remember_token'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['username'];
            $_SESSION['level'] = $row['level'];
            header("Location: index.php");
            exit;
        }
    }
}

/* ================= LOGIN EMAIL + PASSWORD ================= */
if (isset($_POST['login'])) {

    $email    = trim($_POST['email']);
    $password = $_POST['password'];
    $remember = isset($_POST['remember']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($password, $user['password'])) {
        $error = "Email hoặc mật khẩu không đúng";
    } else {
        $otp = random_int(100000, 999999);

        $_SESSION['otp']          = $otp;
        $_SESSION['otp_expire']   = time() + 300;
        $_SESSION['user_id_temp'] = $user['id'];
        $_SESSION['user_name_temp'] = $user['username'];
        $_SESSION['remember']     = $remember;
        $_SESSION['level_temp']        = $user['level'];

        sendOTP($user['email'], $otp);
        $mode = 'otp';
        $success = "Mã OTP đã được gửi về email";
    }
}

/* ================= VERIFY OTP ================= */
if (isset($_POST['verify_otp']) && isset($_SESSION['otp'])) {

    if (time() > $_SESSION['otp_expire']) {
        $error = "OTP đã hết hạn";
        $mode = 'login';
    } elseif ($_POST['otp'] != $_SESSION['otp']) {
        $error = "OTP không đúng";
        $mode = 'otp';
    } else {

        $userId = $_SESSION['user_id_temp'];
        $_SESSION['user_id'] = $userId;
        $_SESSION['user_name'] = $_SESSION['user_name_temp'];
        $_SESSION['level'] = $_SESSION['level_temp'];
        if (!empty($_SESSION['remember'])) {
            $token = bin2hex(random_bytes(32));
            $hash  = password_hash($token, PASSWORD_DEFAULT);

            $stmt = $pdo->prepare("UPDATE users SET remember_token=? WHERE id=?");
            $stmt->execute([$hash, $userId]);

            setcookie("remember_token", $token, time() + 2592000, "/", "", false, true);
        }
        unset($_SESSION['otp'], $_SESSION['otp_expire'], $_SESSION['user_id_temp'],$_SESSION['user_name_temp'], $_SESSION['level_temp'], $_SESSION['remember']);
        header("Location: index.php");
        exit;
    }
}

/* ================= FORGOT PASSWORD ================= */
if (isset($_POST['forgot'])) {

    $email = trim($_POST['email']);

    $stmt = $pdo->prepare("SELECT id FROM users WHERE email=?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        $token  = bin2hex(random_bytes(32));
        $hash   = password_hash($token, PASSWORD_DEFAULT);
        $expire = date("Y-m-d H:i:s", time() + 900);

        $stmt = $pdo->prepare("UPDATE users SET reset_token=?, reset_expire=? WHERE id=?");
        $stmt->execute([$hash, $expire, $user['id']]);

        $appUrl = rtrim($_ENV['APP_URL'], '/');
        $link = $appUrl . "/reset_password.php?token=" . urlencode($token);
        //$link ="reset_password.php?token=" . urlencode($token);
        sendResetPassword($email, $link);
    }

    $success = "Nếu email tồn tại, link đặt lại mật khẩu đã được gửi";
    $mode = 'login';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Đăng nhập</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5" style="max-width:420px">

<h3 class="text-center mb-4">ĐĂNG NHẬP</h3>

<?php if ($error): ?><div class="alert alert-danger"><?= $error ?></div><?php endif; ?>
<?php if ($success): ?><div class="alert alert-success"><?= $success ?></div><?php endif; ?>

<?php if ($mode === 'login'): ?>

<form method="post">
    <input class="form-control mb-2" type="email" name="email" placeholder="Email" required>
    <input class="form-control mb-2" type="password" name="password" placeholder="Mật khẩu" required>

    <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" name="remember">
        <label class="form-check-label">Ghi nhớ đăng nhập</label>
    </div>

    <button class="btn btn-primary w-100" name="login">Đăng nhập</button>

    <div class="text-center mt-3">
        <a href="?mode=forgot">Quên mật khẩu?</a>
    </div>
</form>

<?php elseif ($mode === 'otp'): ?>

<form method="post">
    <input class="form-control mb-2" name="otp" placeholder="Nhập mã OTP" required>
    <button class="btn btn-success w-100" name="verify_otp">Xác nhận OTP</button>
</form>

<?php elseif ($mode === 'forgot'): ?>

<form method="post">
    <input class="form-control mb-2" type="email" name="email" placeholder="Email của bạn" required>
    <button class="btn btn-warning w-100" name="forgot">Gửi link đặt lại mật khẩu</button>

    <div class="text-center mt-3">
        <a href="login.php">Quay lại đăng nhập</a>
    </div>
</form>

<?php endif; ?>

</body>
</html>
