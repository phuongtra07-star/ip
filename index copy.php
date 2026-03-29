<?php
require "session_check.php";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8" />
    <title>Trang chủ</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Font Awesome 111111-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" />

    <!-- Bootstrap + Theme CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/styles.css?v=2" rel="stylesheet" />
</head>

<body id="page-top">

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-expand-lg fixed-top custom-nav">
    <div class="container">
        <!-- <a class="navbar-brand" href="index.php">BigPro's Website</a> -->
        <a class="navbar-brand d-flex align-items-center" href="index.php">
            <img src="assets/img/logos/logo-1.png"
            alt="Logo"
            style="height: 48px; width: auto;"
            class="me-2">
           
        </a>
     

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto text-uppercase">

                <li class="nav-item"><a class="nav-link" href="#services">Dịch vụ</a></li>
                <li class="nav-item"><a class="nav-link" href="#about">Giới thiệu</a></li>
                <li class="nav-item"><a class="nav-link" href="#contact">Liên hệ</a></li>

                <?php if (!isset($_SESSION['user_id'])): ?>
                    <!-- CHƯA ĐĂNG NHẬP -->
                    <li class="nav-item ms-3">
                        <a class="btn btn-outline-warning btn-sm" href="login.php">Đăng nhập</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-warning btn-sm" href="register.php">Đăng ký</a>
                    </li>
                <?php else: ?>
                    <!-- ĐÃ ĐĂNG NHẬP -->
                    <li class="nav-item ms-3">
                        <span class="nav-link text-info">
                            👋 <?= htmlspecialchars($_SESSION['user_name']) ?>
                        </span>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-danger btn-sm" href="logout.php">Đăng xuất</a>
                    </li>
                <?php endif; ?>

            </ul>
        </div>
    </div>
</nav>


<div class="container my-2" style="margin-top: 65px !important;">
    <div class="row">
        
        <!-- 25% -->
        <div class="col-3">
            <div class="d-flex flex-column gap-1">
               <button class="btn btn-primary w-100" disabled>Self-managed Validation</button> 
               <button class="btn btn-primary w-100">Validation Administration</button> 
               <button class="btn btn-primary w-100">Client Portal</button> 
               <button class="btn btn-primary w-100">Partner-managed Dossiers</button> 
               <button class="btn btn-primary w-100">Dossiers Administration</button> 
               <button class="btn btn-primary w-100">Special intended facilitates</button>
            </div>
        </div>

        <!-- 75% -->
        <div class="col-9">
            <div class="content border p-2">
                Nội dung hiển thị ở đây
            </div>
        </div>

    </div>
</div>
<!-- ================= CONTACT ================= -->
<section class="page-section" id="contact">
    <div class="container text-center">
        <h2 class="section-heading text-uppercase">Liên hệ</h2>
        <p class="text-muted">Email: support@mywebsite.com</p>
    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="footer py-4 bg-dark text-white">
    <div class="container text-center">
        © <?= date('Y') ?> MyWebsite. All rights reserved.
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>

</body>
</html>
