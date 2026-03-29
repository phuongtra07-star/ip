<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}
?>

<h2>🎉 Đăng nhập thành công</h2>
<a href="logout.php">Đăng xuất</a>
