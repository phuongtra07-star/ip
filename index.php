<?php
ob_start();
require 'session_check.php';
?>
<!DOCTYPE html>
<html lang='vi'>

<head>
    <meta charset='UTF-8'>
    <title>Trang Quản Lý Đơn Hàng</title>

    <!-- Bootstrap 5 -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>

    <!-- Bootstrap Icons -->
    <link href='https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css' rel='stylesheet'>
    <script src='js/DonAdd.js'></script>
    
    <style>
    body {
        background-color: #f4f6f9;
    }

    /* HEADER */
    .header-custom {
        background: linear-gradient(90deg, #1e3c72, #f1f2f5);
        padding: 12px 30px;
    }

    .logo img {
        height: 50px;
    }

    .dropdown-toggle::after {
        display: none;
    }

    /* Nav */
    nav {
        background-color: #1e3c72;
        height: 40px;
        line-height: 40px;
    }

    .running-text {
        overflow: hidden;
        white-space: nowrap;
    }

    .running-text span {
        display: inline-block;
        padding-left: 100%;
        animation: run 15s linear infinite;
    }

    @keyframes run {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-100%);
        }
    }

    marquee {
        color: #f3f0f0;
        font-weight: bold;
        font-size: 14px;

    }

    /* SIDEBAR */
    .sidebar {
        position: fixed;
        left: 0;
        top: 114px;
        width: 25%;
        height: calc(100vh - 114px);
        overflow-y: auto;
        z-index: 1000;
        color: #444444;
        padding: 20px;

    }

    .sidebar a {
        color: #444444;
        text-decoration: none;
        display: block;
        padding: 10px;
        border-radius: 6px;
    }

    .sidebar a:hover {
        background-color: #e9ecef;
        color: #0d6efd;
    }

    .sidebar a.active {
        background-color: #0d6efd;
        color: white;
    }

    /* CONTENT */
    .content {
        padding: 30px;
        margin-left: 25%;
        min-height: calc(100vh - 114px);

    }

    .card-custom {
        border-radius: 12px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    }

    footer {
        background-color: #1e3c72;
    }

    @media (max-width: 767px) {
        .sidebar {
            position: static;
            width: auto;
            height: auto;
            overflow-y: visible;
            min-height: auto;
        }

        .content {
            margin-left: 0;
            min-height: auto;
        }
        .row18 {
        border: 1px solid #007bff;
        border-radius: 0.25rem;
        padding: 0.5rem;
        margin-bottom: 0.75rem;
        }
    }
    </style>
</head>

<body>
    <header class='navbar header-custom'>
        <div class='container-fluid d-flex align-items-center'>
            <!-- Logo bên trái -->
            <div class='logo'>
                <img src='assets/img/logos/logo.png' alt='Logo'>
            </div>
            <!-- Dòng chữ trắng -->
            <div class='text-white fw-semibold fs-5 ms-3'>
                Bright Innovation Great Prosperity
            </div>
            <!-- Đẩy sang phải -->
            <div class='ms-auto d-flex align-items-center gap-3'>
                <?php if ( !isset( $_SESSION[ 'user_id' ] ) ): ?>
                <!-- CHƯA ĐĂNG NHẬP -->
                <ul style='list-style: none; margin: 0; padding: 0;' class='d-flex align-items-center gap-2'>
                    <!-- thêm tạm 1 li chứa nút thêm mới test xong thì xóa -->
                    <li class='nav-item ms-3'>
                        <a class='btn btn-outline-warning btn-sm' href='index.php?action=add'>Thêm mới</a>
                    </li>
                    <li class='nav-item ms-3'>
                        <a class='btn btn-outline-warning btn-sm' href='login.php'>Đăng nhập</a>
                    </li>
                    <li class='nav-item ms-2'>
                        <a class='btn btn-warning btn-sm' href='register.php'>Đăng ký</a>
                    </li>
                </ul>
                <?php else: ?>
                <!-- Nút thêm mới đơn -->
                <a href='add_order.php' class='btn btn-warning'>
                    <i class='bi bi-plus-circle'></i> Thêm mới đơn
                </a>
                <a href='pending_orders.php' class='btn btn-danger'>
                    <i class='bi bi-clock-history'></i> Cần xử lý
                </a>
                <!-- User dropdown -->
                <div class='dropdown'>
                    <a class='d-flex align-items-center text-white text-decoration-none dropdown-toggle' href='#'
                        data-bs-toggle='dropdown'>
                        <i class='bi bi-person-circle fs-4 me-2'></i>
                        <strong>
                            < ?=htmlspecialchars( $_SESSION[ 'user_name' ] ) ?>
                        </strong>
                    </a>
                    <ul class='dropdown-menu dropdown-menu-end shadow'>
                        <li>
                            <a class='dropdown-item' href='profile.php'>
                                <i class='bi bi-person'></i> Hồ sơ
                            </a>
                        </li>
                        <li>
                            <a class='dropdown-item' href='change_password.php'>
                                <i class='bi bi-key'></i> Đổi mật khẩu
                            </a>
                        </li>
                        <li>
                            <hr class='dropdown-divider'>
                        </li>
                        <li>
                            <a class='dropdown-item text-danger' href='logout.php'>
                                <i class='bi bi-box-arrow-right'></i> Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>
                <?php endif;?>
            </div>
        </div>
    </header>
    <nav class='running-text bg-primary text-white'>
        <span>Bright Innovation Great Prosperity</span>
    </nav>
    <!-- ===  ===  ===  ===  ===  == MAIN ===  ===  ===  ===  ===  == -->
    <div class='container-fluid'>
        <?php
        $action = $_GET[ 'action' ] ?? 'self_managed';
        ?>
        <div class='row'>
            <!-- SIDEBAR ( 1/3 ) -->
            <div class='col-md-3 sidebar'>
                <h5>MENU</h5>
                <a href='index.php?action=self_managed'
                    class="<?php echo ($action == 'self_managed') ? 'active' : ''; ?>"><i
                        class='bi bi-speedometer2'></i> Self Managed Validation</a>
                <a href='index.php?action=validation_admin'
                    class="<?php echo ($action == 'validation_admin') ? 'active' : ''; ?>"><i class='bi bi-list'></i>
                    Validation Administration</a>
                <a href='index.php?action=client_portal'
                    class="<?php echo ($action == 'client_portal') ? 'active' : ''; ?>"><i class='bi bi-people'></i>
                    Client Portal</a>
                <a href='index.php?action=partner_dossiers'
                    class="<?php echo ($action == 'partner_dossiers') ? 'active' : ''; ?>"><i
                        class='bi bi-bar-chart'></i> Partner Managed Dossiers </a>
                <a href='index.php?action=dossiers_admin'
                    class="<?php echo ($action == 'dossiers_admin') ? 'active' : ''; ?>"><i class='bi bi-bar-chart'></i>
                    Dossiers Administration </a>
                <a href='index.php?action=dedicated_functions'
                    class="<?php echo ($action == 'dedicated_functions') ? 'active' : ''; ?>"><i
                        class='bi bi-bar-chart'></i> Dedicated Functions </a>
            </div>

            <!-- CONTENT ( 2/3 ) -->
            <div class='col-md-9 content'>
                <?php
                $action = $_GET[ 'action' ] ?? 'self_managed';
                switch ( $action ) {
                    case 'self_managed':
                        include __DIR__ . '/controller/DonController.php';
                        $controller = new DonController();
                        $controller->index();
                        break;
                    case 'validation_admin':
                        include 'pages/validation_admin.php';
                        break;
                    case 'client_portal':
                        include 'pages/client_portal.php';
                        break;
                    case 'partner_dossiers':
                        include 'pages/partner_dossiers.php';
                        break;
                    case 'dossiers_admin':
                        include 'pages/dossiers_admin.php';
                        break;
                    case 'dedicated_functions':
                        include 'pages/dedicated_functions.php';
                        break;
                    case 'add':
                        include __DIR__ . '/controller/DonController.php';
                        $controller = new DonController();
                        $controller->insert();
                        break;
                    case 'edit':
                        include __DIR__ . '/controller/DonController.php';
                        $controller = new DonController();
                        $id = isset( $_GET['id'] ) ? (int)$_GET['id'] : 0;
                        $controller->update( $id );
                        break;
                    default:
                        echo "<div class='alert alert-danger'>Trang không tồn tại.</div>";
                } ?>
            </div>
            <!-- end of content -->
        </div>
        <!-- end row content and side bar -->
    </div>
    <!-- end Main part -->

    <!-- ===  ===  ===  ===  ===  == FOOTER ===  ===  ===  ===  ===  == -->
    <footer class='footer py-4  text-white'>
        <div class='container text-center'>
            © <?= date( 'Y' ) ?> MyWebsite. All rights reserved.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js'></script>
    <script src='js/scripts.js'></script>

</body>

</html>