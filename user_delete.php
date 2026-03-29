<?php
session_start();
include "connect.php";

/* ====== KIỂM TRA LOGIN ====== */
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

/* ====== CHỈ ADMIN ĐƯỢC XÓA ====== */
if ($_SESSION['user']['level'] != 1) {
    die("Bạn không có quyền xóa user!");
}

/* ====== KIỂM TRA ID ====== */
if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    die("ID không hợp lệ!");
}

$id = (int)$_GET['id'];

/* ====== KHÔNG CHO XÓA CHÍNH MÌNH ====== */
if ($id == $_SESSION['user']['id']) {
    die("Bạn không thể tự xóa tài khoản của mình!");
}

/* ====== XÓA USER ====== */
$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);

header("Location: users_list.php");
exit;
