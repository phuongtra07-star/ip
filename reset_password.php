<?php
require "connect.php";

$error = "";
$success = "";

if (empty($_GET['token'])) {
    exit("Link không hợp lệ");
}

$token = $_GET['token'];

/* ===== FIND USER BY TOKEN ===== */
$expire=date("Y-m-d H:i:s");
$stmt = $pdo->prepare("
    SELECT id, reset_token
    FROM users
    WHERE reset_expire > ?
      AND reset_token IS NOT NULL
    LIMIT 1
");
$stmt->execute([$expire]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user || !password_verify($token, $user['reset_token'])) {
    exit("Link đã hết hạn hoặc không hợp lệ");
    }

/* ===== SUBMIT NEW PASSWORD ===== */
if (isset($_POST['reset'])) {

    $password = trim($_POST['password']);
    $confirm  = trim($_POST['confirm']);

    if (strlen($password) < 6) {
        $error = "Mật khẩu tối thiểu 6 ký tự";
    } elseif ($password !== $confirm) {
        $error = "Mật khẩu xác nhận không khớp";
    } else {

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("
            UPDATE users
            SET password=?, reset_token=NULL, reset_expire=NULL
            WHERE id=?
        ");
        $stmt->execute([$hash, $user['id']]);

        $success = "Đổi mật khẩu thành công. Bạn có thể đăng nhập.";
    }
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8">
<title>Đặt lại mật khẩu</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-5" style="max-width:420px">

<h3 class="text-center mb-4">Đặt lại mật khẩu</h3>

<?php if ($error): ?>
<div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<?php if ($success): ?>
<div class="alert alert-success">
    <?= htmlspecialchars($success) ?><br>
    <a href="login.php">👉 Đăng nhập</a>
</div>
<?php else: ?>

<form method="post">
    <div class="mb-3">
        <label>Mật khẩu mới</label>
        <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Xác nhận mật khẩu</label>
        <input type="password" name="confirm" class="form-control" required>
    </div>

    <button class="btn btn-primary w-100" name="reset">
        Đổi mật khẩu
    </button>
</form>

<?php endif; ?>

</body>
</html>
