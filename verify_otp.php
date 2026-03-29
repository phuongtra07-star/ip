<?php
session_start();
$error = "";

if(!isset($_SESSION['otp'])){
    header("Location: login.php");
}

if(isset($_POST['verify'])){
    if(time() - $_SESSION['otp_time'] > 300){
        $error = "OTP đã hết hạn";
    }
    elseif($_POST['otp'] == $_SESSION['otp']){
        $_SESSION['login'] = true;

        unset($_SESSION['otp']);
        unset($_SESSION['otp_time']);

        header("Location: dashboard.php");
        exit;
    } else {
        $error = "OTP không đúng";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Xác thực OTP</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body{
            min-height:100vh;
            background: linear-gradient(135deg, #4e73df, #1cc88a);
            display:flex;
            align-items:center;
            justify-content:center;
            font-family: system-ui, -apple-system, "Segoe UI", Roboto;
        }
        .otp-box{
            width:100%;
            max-width:420px;
            background:#fff;
            border-radius:16px;
            box-shadow:0 15px 40px rgba(0,0,0,0.25);
            padding:30px;
        }
        .otp-icon{
            font-size:55px;
            color:#1cc88a;
        }
        .form-control{
            height:48px;
            font-size:18px;
            text-align:center;
            letter-spacing:4px;
            border-radius:10px;
        }
        .btn-success{
            height:48px;
            border-radius:10px;
            font-weight:500;
        }
    </style>
</head>
<body>

<div class="otp-box">
    <div class="text-center mb-3">
        <i class="bi bi-shield-check otp-icon"></i>
        <h3 class="mt-2">Xác thực OTP</h3>
        <p class="text-muted mb-0">
            Vui lòng nhập mã OTP đã gửi về email
        </p>
    </div>

    <form method="post">
        <div class="mb-3">
            <input class="form-control"
                   name="otp"
                   placeholder="••••••"
                   maxlength="6"
                   required>
        </div>

        <button name="verify" class="btn btn-success w-100">
            <i class="bi bi-check-circle"></i> Xác nhận
        </button>

        <?php if(!empty($error)): ?>
            <div class="alert alert-danger text-center mt-3">
                <?= $error ?>
            </div>
        <?php endif; ?>
    </form>

    <div class="text-center mt-3">
        <small class="text-muted">
            Mã OTP có hiệu lực trong 5 phút
        </small>
    </div>
</div>

</body>
</html>
