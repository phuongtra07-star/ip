<?php
session_start();
require "connect.php";

if (isset($_COOKIE['remember_token'])) {
    $stmt = $pdo->prepare("UPDATE users SET remember_token=NULL WHERE remember_token=?");
    $stmt->execute([$_COOKIE['remember_token']]);
    setcookie("remember_token", "", time()-3600, "/");
}

session_destroy();
header("Location: index.php");
?>