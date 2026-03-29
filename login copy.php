<?php
session_start();
require "connect.php";
require "mailer.php";

/* ===================== AUTO LOGIN BY REMEMBER TOKEN ===================== */
if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_token'])) {
    $stmt = $pdo->prepare("SELECT id FROM users WHERE remember_token=?");
    $stmt->execute([$_COOKIE['remember_token']]);
    $uid = $stmt->fetchColumn();

    if ($uid) {
        $_SESSION['user_id'] = $uid;
        header("Location: dashboard.php");
        exit;
    }
}

$error = "";
$success = "";

/* ===================== STEP 1: EMAIL + PASSWORD ===================== */
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
        // Tạo OTP
        $otp = random_int(100000, 999999);

        $_SESSION['otp']          = $otp;
        $_SESSION['otp_expire']   = time() + 300;
        $_SESSION['user_id_temp'] = $user['id'];
        $_SESSION['remember']     = $remember;
        $_SESSION['resend_count'] = 0;

        sendOTP($user['email'], $otp);
        $success = "Mã OTP đã được gửi về email";
    }
}

/* ===================== STEP 2: VERIFY OTP ===================== */
if (isset($_POST['verify_otp']) && isset($_SESSION['otp'])) {

    if (time() > $_SESSION['otp_expire']) {
        $error = "Mã OTP đã hết hạn";
    } elseif ($_POST['otp'] != $_SESSION['otp']) {
        $error = "Mã OTP không đúng";
    } else {

        $userId = $_SESSION['user_id_temp'];
        $_SESSION['user_id'] = $userId;

        /* ===== REMEMBER ME ===== */
        if (!empty($_SESSION['remember'])) {
            $token = bin2hex(random_bytes(32));

            $stmt = $pdo->prepare("UPDATE users SET remember_token=? WHERE id=?");
            $stmt->execute([$token, $userId]);
            echo "đã ghi nhớ";
            setcookie(
                "remember_token",
                $token,
                time() + (30 * 24 * 3600),
                "/",
                "",
                false,
                true
            );
        }

        // Clear OTP data
        unset(
            $_SESSION['otp'],
            $_SESSION['otp_expire'],
            $_SESSION['user_id_temp'],
            $_SESSION['remember'],
            $_SESSION['resend_count']
        );

        header("Location: dashboard.php");
        exit;
    }
}

/* ===================== RESEND OTP ===================== */
if (isset($_POST['resend_otp']) && isset($_SESSION['user_id_temp'])) {

    $_SESSION['resend_count']++;

    if ($_SESSION['resend_count'] > 3) {
        $error = "Bạn đã gửi OTP quá nhiều lần";
    } else {
        $stmt = $pdo->prepare("SELECT email FROM users WHERE id=?");
        $stmt->execute([$_SESSION['user_id_temp']]);
        $email = $stmt->fetchColumn();

        $otp = random_int(100000, 999999);
        $_SESSION['otp']        = $otp;
        $_SESSION['otp_expire'] = time() + 300;

        sendOTP($email, $otp);
        $success = "OTP mới đã được gửi";
    }
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

<?php if ($error): ?>
<div class="alert alert-danger"><?= $error ?></div>
<?php endif; ?>

<?php if ($success): ?>
<div class="alert alert-success"><?= $success ?></div>
<?php endif; ?>

<?php if (!isset($_SESSION['otp'])): ?>

<form method="post">
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Mật khẩu</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="form-check mb-3">
        <input class="form-check-input" type="checkbox" name="remember" id="remember">
        <label class="form-check-label" for="remember">
            Ghi nhớ đăng nhập
        </label>
    </div>

    <button class="btn btn-primary w-100" name="login">
        Đăng nhập
    </button>
</form>

<?php else: ?>

<form method="post">
    <div class="mb-3">
        <label>Mã OTP</label>
        <input name="otp" class="form-control" required>
    </div>

    <button class="btn btn-success w-100 mb-2" name="verify_otp">
        Xác nhận OTP
    </button>

    <button class="btn btn-outline-secondary w-100" name="resend_otp">
        Gửi lại OTP
    </button>
</form>

<?php endif; ?>

</body>
</html>
