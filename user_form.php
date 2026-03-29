<?php
session_start();
include "connect.php";

/* ====== KIỂM TRA LOGIN ====== */
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

/* ====== CHỈ ADMIN ĐƯỢC QUẢN LÝ USER ====== */
if ($_SESSION['user']['level'] != 1) {
    die("Bạn không có quyền truy cập!");
}

/* ====== LẤY USER ĐỂ SỬA ====== */
$edit = null;
if (isset($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $edit = $stmt->fetch(PDO::FETCH_ASSOC);
}

/* ====== XỬ LÝ SUBMIT ====== */
if (isset($_POST['save'])) {

    $id       = $_POST['id'];
    $username = trim($_POST['username']);
    $email    = trim($_POST['email']);
    $phone    = trim($_POST['phone']);
    $level    = $_POST['level'];
    $password = $_POST['password'];

    /* ====== THÊM USER ====== */
    if ($id == "") {

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users(username, password, email, phone, level)
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $hash, $email, $phone, $level]);

    } 
    /* ====== SỬA USER ====== */
    else {

        // Nếu có nhập password → hash lại
        if ($password != "") {
            $hash = password
