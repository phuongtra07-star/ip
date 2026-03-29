<?php
require "session_check.php";
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Trang Quản Lý Đơn Hàng</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">

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
        nav{
            background-color: #1e3c72;
            height: 40px;
            line-height: 40px;
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
            width: 20%;
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
            color: rgba(228, 9, 9, 0.9);
        }

         /* CONTENT */
        .content {
            padding: 30px;
            margin-left: 20%;
            
        }

        .card-custom {
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
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
            }
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>
<header class="navbar header-custom">

    <div class="container-fluid d-flex align-items-center">

        <!-- Logo bên trái -->
        <div class="logo">
            <img src="assets/img/logos/logo.png" alt="Logo">
        </div>
         <!-- Dòng chữ trắng -->
        <div class="text-white fw-semibold fs-6">
            Bright Innovation Great Prosperity
        </div>

        <!-- Đẩy sang phải -->
        <div class="ms-auto d-flex align-items-center gap-3">

            <?php if (!isset($_SESSION['user_id'])): ?>
                <!-- CHƯA ĐĂNG NHẬP -->
                <ul style="list-style: none; margin: 0; padding: 0;" class="d-flex align-items-center gap-2">
                    <li class="nav-item ms-3">
                        <a class="btn btn-outline-warning btn-sm" href="login.php">Đăng nhập</a>
                    </li>
                    <li class="nav-item ms-2">
                        <a class="btn btn-warning btn-sm" href="register.php">Đăng ký</a>
                    </li>
                </ul>
            <?php else: ?>
                <!-- Nút thêm mới đơn -->
                <a href="add_order.php" class="btn btn-warning">
                    <i class="bi bi-plus-circle"></i> Thêm mới đơn
                </a>
                <a href="add_order.php" class="btn btn-warning">
                    <i class="bi bi-arrow-counterclockwise"></i> Cần xử lý
                </a>
                <!-- User dropdown -->
                <div class="dropdown">
                    <a class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    href="#"
                    data-bs-toggle="dropdown">
                        <i class="bi bi-person-circle fs-4 me-2"></i>
                        <strong><?= htmlspecialchars($_SESSION['user_name']) ?></strong>
                    </a>                
                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        <li>
                            <a class="dropdown-item" href="profile.php">
                                <i class="bi bi-person"></i> Hồ sơ
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="change_password.php">
                                <i class="bi bi-key"></i> Đổi mật khẩu
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger" href="logout.php">
                                <i class="bi bi-box-arrow-right"></i> Đăng xuất
                            </a>
                        </li>
                    </ul>
                </div>
            <?php endif; ?>
        </div>

    </div>
</header>
<nav class="running-text">
    <marquee behavior="scroll" direction="left">Bright Innovation Great Prosperity</marquee>
</nav>
<!-- ================= MAIN ================= -->
<div class="container-fluid">
    <div class="row">
        <!-- SIDEBAR (1/3) -->
        <div class="col-md-3 sidebar">
            <h5>MENU</h5>
            <a href="#"><i class="bi bi-speedometer2"></i> Self Managed Validation</a>
            <a href="#"><i class="bi bi-list"></i> Validation Administration</a>
            <a href="#"><i class="bi bi-people"></i> Client Portal</a>
            <a href="#"><i class="bi bi-bar-chart"></i> Partner Managed Dossiers </a>
            <a href="#"><i class="bi bi-bar-chart"></i> Dossiers Administration </a>
            <a href="#"><i class="bi bi-bar-chart"></i> Dedicated Functions </a>
        </div>

        <!-- CONTENT (2/3) -->
        <div class="col-md-9 content">
            <!-- Cụm 1 -->
            <!-- Cụm 1: Thông tin chính yếu -->
            <div class="card card-custom p-4 mb-4">
                <h5 class="text-success fw-bold mb-3">Cụm 1: Thông tin chính yếu</h5>
                <div class="row">
                    <!-- Loại hồ sơ -->
                    <div class="col-md-4">
                        <label for="f1_loai_ho_so" class="fw-bold">Loại hồ sơ</label>
                        <input class="form-control mb-2" list="danh_sach_loai_ho_so" id="loai_ho_so" name="f1_loai_ho_so" placeholder="Chọn hoặc nhập...">
                        <datalist id="danh_sach_loai_ho_so">
                            <option value="Sáng chế">
                            <option value="Nhãn hiệu">
                            <option value="Kiểu dáng">
                   .        <option value="Giống cây trồng">
                            <option value="Chỉ dẫn địa lý">
                            <option value="Bản quyền tác giả">
                            <option value="Mạch tích hợp">                            
                        </datalist>                        
                    </div>
                    <div class="col-md-4">
                        <label for="our_ref">Our Ref</label>
                        <input type="text" class="form-control" id="our_ref" name="f2_our_ref">
                    </div>
                    <div class="col-md-4">
                        <label for="your_ref">Your Ref</label>
                        <input type="text" class="form-control" id="your_ref" name="f3_your_ref">
                    </div>                            
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <label for="tong_diem_doc_lap">Tổng số điểm độc lập/nhóm hàng hóa dịch vụ/phương án <br>thiết kế</label>
                   </div>
                    <div class="col-md-6">
                        <input type="text" class="form-control" id="tong_diem_doc_lap" name="f4_tong_diem_doc_lap">
                    </div>
                </div>

                <div class="row mb-2">
                    <div class="col-md-3">
                        <label for="id_khach_hang" class="text-danger">ID khách hàng</label>
                        <input type="text" class="form-control" id="id_khach_hang" name="f5_id_khach_hang">
                    </div>
                    <div class="col-md-3">
                        <label for="ten_khach_hang">Tên khách hàng</label>
                        <input type="text" class="form-control" id="ten_khach_hang" name="f6_ten_khach_hang">
                    </div>                    
                    <div class="col-md-6">
                        <label for="uy_quyen">Ủy quyền</label>
                        <div class="d-flex gap-2">
                            <select class="form-select" id="uy_quyen" name="f7_uy_quyen">
                                <option>General</option>
                                <option>Specific</option>
                            </select>
                            <select class="form-select" id="ban_sao" name="f8_ban_sao">
                                <option>Original</option>
                                <option>Copy</option>
                            </select>
                            <input type="text" class="form-control" id="reference_data" name="f9_reference_data" placeholder="Reference data">
                        </div>
                    </div>                
                </div>

                <div class="row mb-2">
                    <div class="col-md-3">
                        <label for="so_don">Số đơn</label>
                        <input type="text" class="form-control" id="so_don" name="f10_so_don">
                    </div>
                    <div class="col-md-3">
                        <label for="ngay_nop_don">Ngày nộp đơn</label>
                        <input type="date" class="form-control" id="ngay_nop_don" name="f11_ngay_nop_don">
                    </div>
                    <div class="col-md-3">
                        <label for="so_bang">Số bằng</label>
                        <input type="text" class="form-control" id="so_bang" name="f12_so_bang">
                    </div>
                    <div class="col-md-3">
                        <label for="ngay_cap_bang">Ngày cấp bằng</label>
                        <input type="date" class="form-control" id="ngay_cap_bang" name="f13_ngay_cap_bang">
                    </div>
                </div>

                <fieldset class="border p-2 rounded mb-2">
                    <legend class="float-none w-auto px-2 fs-6 text-danger">Trạng thái bổ xung</legend>
                    <div class="row mb-2">
                        <div class="col-md-4">
                            <label for="f14-1-mota">Mô tả</label>
                            <input type="text" class="form-control" id="f14-1-mota" name="f14_1_mota">
                        </div>
                        <div class="col-md-3">
                            <label for="f14-2-ngay-lien-quan">Ngày liên quan</label>
                            <input type="date" class="form-control" id="f14-2-ngay-lien-quan" name="f14_2_ngay_lien_quan">
                        </div>
                        <div class="col-md-5">
                            <label for="f14-3-ghi-chu">Ghi chú</label>
                            <input type="text" class="form-control" id="f14-3-ghi-chu" name="f14_3_ghi_chu">
                        </div>                        
                    </div>
                    <button class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Add</button>
                </fieldset>
                    
            </div>               
            <!-- Kết thúc cụm 1 -->
            <!-- Cụm 2: Thông tin thư/mục đơn -->
            <div class="card card-custom p-4 mb-4">
                <h5 class="text-success fw-bold mb-3">Cụm 2: Thông tin thư/mục đơn</h5>
                <div class="row mb-2">
                    <div class="col-md-4">
                        <label for="f15-ten_doi_tuong">Tên đối tượng</label>
                        <input type="text" class="form-control" id="ten_doi_tuong" name="f15_ten_doi_tuong">
                    </div>
                    <div class="col-md-4">
                        <label for="f16-phan_loai">Phân loại</label>
                        <input type="text" class="form-control" id="f16-phan_loai" name="f16_phan_loai">
                    </div>
                    <div class="col-md-4">
                        <label for="f17_noi_nop">Nơi nộp</label>
                        <input type="text" class="form-control" id="f17_noi_nop" name="f17_noi_nop">
                    </div>
                </div>
                <!-- Thông tin chủ đơn -->
                <fieldset class="border p-2 rounded mb-2">
                    <legend class="float-none w-auto px-2 fs-6">Thông tin chủ đơn</legend>
                    <div class="row mb-2">
                        <div class="col-md-3">
                            <label for="ten_chu_don">Chủ đơn</label>
                            <input type="text" class="form-control" id="ten_chu_don" name="f18_1_ten_chu_don">
                        </div>
                        <div class="col-md-3">
                            <label for="dia_chi_chu_don">Địa chỉ</label>
                            <input type="text" class="form-control" id="dia_chi_chu_don" name="f18_2_dia_chi_chu_don">
                        </div>
                        <div class="col-md-2">
                            <label for="quoc_gia_chu_don">Quốc Gia</label>
                            <input type="text" class="form-control" id="quoc_gia_chu_don" name="f18_3_quoc_gia_chu_don">
                        </div>
                        <div class="col-md-2">
                            <label for="mst_cc">MST/CC</label>
                            <input type="text" class="form-control" id="mst_cc" name="f18_4_mst_cc">
                        </div>
                        <div class="col-md-2">
                            <label for="id_chu_don" class="text-danger">ID chủ đơn</label>
                            <input type="text" class="form-control" id="id_chu_don" name="f18_5_id_chu_don">
                        </div>
                        
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Add</button>
                    </div>
                </fieldset>
                <!-- Thông tin tác giả -->
                <fieldset class="border p-2 rounded mb-2">
                    <legend class="float-none w-auto px-2 fs-6">Thông tin tác giả</legend>
                    <div class="row mb-2">
                        <div class="col-md-2">
                            <label for="tac_gia_1">Tác giả 1</label>
                            <input type="text" class="form-control" id="tac_gia_1" name="f19_1_tac_gia_1">
                        </div>
                        <div class="col-md-2">
                            <label for="dia_chi_tac_gia">Địa chỉ</label>
                            <input type="text" class="form-control" id="dia_chi_tac_gia" name="f19_2_dia_chi_tac_gia">
                        </div>
                        <div class="col-md-2">
                            <label for="quoc_tich_tac_gia">Quốc tịch</label>
                            <input type="text" class="form-control" id="quoc_tich_tac_gia" name="f19_3_quoc_tich_tac_gia">
                        </div>
                        <div class="col-md-2">
                            <label for="email_tac_gia">Email</label>
                            <input type="email" class="form-control" id="email_tac_gia" name="f19_4_email_tac_gia">
                        </div>
                        <div class="col-md-2">
                            <label for="dien_thoai_tac_gia">Điện thoại</label>
                            <input type="text" class="form-control" id="dien_thoai_tac_gia" name="f19_5_dien_thoai_tac_gia">
                        </div>
                        <div class="col-md-2">
                            <label for="can_cuoc_tac_gia">Căn cước</label>
                            <input type="text" class="form-control" id="can_cuoc_tac_gia" name="f19_6_can_cuoc_tac_gia">
                        </div>
                    </div>
                    <div class="mt-2">
                        <button class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Add</button>
                    </div>
                </fieldset>
                <!-- Nguồn gốc đơn & Thông tin đơn ưu tiên -->
                <div class="row mb-2">
                    <div class="col-md-6">
                        <fieldset class="border p-2 rounded h-100">
                            <legend class="float-none w-auto px-2 fs-6">Nguồn gốc đơn</legend>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label for="so_don_tham_chieu_1">Số đơn tham chiếu 1</label>
                                    <input type="text" class="form-control" id="so_don_tham_chieu_1" name="f20_1_so_don_tham_chieu_1">
                                </div>
                                <div class="col-md-4">
                                    <label for="ngay_nop_tham_chieu_1">Ngày nộp</label>
                                    <input type="date" class="form-control" id="ngay_nop_tham_chieu_1" name="f20_2_ngay_nop_tham_chieu_1">
                                </div>
                                <div class="col-md-4">
                                    <label for="ngay_nop_tham_chieu_1">Ghi chú</label>
                                    <input type="date" class="form-control" id="ngay_nop_tham_chieu_1" name="f20_3_ngay_nop_tham_chieu_1">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Add</button>
                        </fieldset>
                    </div>
                    <div class="col-md-6">
                        <fieldset class="border p-2 rounded h-100">
                            <legend class="float-none w-auto px-2 fs-6">Thông tin đơn ưu tiên</legend>
                            <div class="row mb-2">
                                <div class="col-md-4">
                                    <label for="so_don_uu_tien_1">Số đơn ưu tiên 1</label>
                                    <input type="text" class="form-control" id="so_don_uu_tien_1" name="f21_1_so_don_uu_tien_1">
                                </div>
                                <div class="col-md-4">
                                    <label for="ngay_uu_tien">Ngày ưu tiên</label>
                                    <input type="date" class="form-control" id="ngay_uu_tien" name="f21_2_ngay_uu_tien">
                                </div>
                                <div class="col-md-4">
                                    <label for="ma_nuoc">Mã nước</label>
                                    <input type="text" class="form-control" id="ma_nuoc" name="f21_3_ma_nuoc">
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Add</button>
                        </fieldset>
                    </div>
                </div>
                <!-- Thông tin liên hệ khách hàng -->
                <fieldset class="border p-2 rounded mb-2">
                    <legend class="float-none w-auto px-2 fs-6 text-danger">Thông tin liên hệ khách hàng</legend>
                    <div class="row mb-2">
                        <div class="col-md-2">
                            <label for="contact1_ten">Contact 1</label>
                            <input type="text" class="form-control" id="contact1_ten" name="f22_1_contact1_ten">
                        </div>
                        <div class="col-md-2">
                            <label for="contact1_email">Email</label>
                            <input type="email" class="form-control" id="contact1_email" name="f22_2_contact1_email">
                        </div>
                        <div class="col-md-2">
                            <label for="contact1_dien_thoai">Điện thoại</label>
                            <input type="text" class="form-control" id="contact1_dien_thoai" name="f22_3_contact1_dien_thoai">
                        </div>
                        <div class="col-md-6">
                            <label for="contact1_ghi_chu">Ghi chú</label>
                            <input type="text" class="form-control" id="contact1_ghi_chu" name="f22_4_contact1_ghi_chu">
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Add</button>
                </fieldset>

                <!-- Cụm 2: Thông tin thư/mục đơn (tiếp) -->
            
                <div class="mb-3">
                    <label for="thong_tin_bo_sung" class="form-label">
                        Thông tin bổ sung (Tóm tắt sáng chế)
                    </label>
                    <textarea class="form-control" id="thong_tin_bo_sung" name="f23_thong_tin_bo_sung" rows="5" placeholder="Nhập text"></textarea>
                </div>
                <fieldset class="border p-2 rounded">
                    <legend class="float-none w-auto px-2 fs-6">Tài liệu bổ sung</legend>
                    <div class="row mb-2">
                        <div class="col-md-5">
                            <label for="ten_tai_lieu">Tên tài liệu</label>
                            <input type="text" class="form-control" id="ten_tai_lieu" name="f24_1_ten_tai_lieu" placeholder="Nhập text (tên TL)">
                        </div>
                        <div class="col-md-3">
                            <label for="ngay_lien_quan">Ngày liên quan</label>
                            <input type="date" class="form-control" id="ngay_lien_quan" name="f24_2_ngay_lien_quan">
                        </div>
                        <div class="col-md-4">
                            <label for="ghi_chu_tai_lieu">Ghi chú</label>
                            <input type="text" class="form-control" id="ghi_chu_tai_lieu" name="f24_3_ghi_chu_tai_lieu" placeholder="Text">
                        </div>
                    </div>
                    <button class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Add</button>
                </fieldset>         
            </div>
             <!-- Kết thúc cụm 2 -->
            <!-- cụm 3 -->
            <!-- Cụm 3: Tiến trình xử lý đơn -->
            <div class="card card-custom p-4 mb-4">
                <h5 class="text-success fw-bold mb-3">Cụm 3: Tiến trình xử lý đơn</h5>
                <div class="row">
                    <!-- Deadline loại 1 -->
                    <div class="col-md-6 mb-3">
                        <fieldset class="border p-3 rounded">
                            <legend class="float-none w-auto px-2 fs-6">Deadline loại 1</legend>
                                                 
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label for="thongbao_ht1">Thông báo HT1</label>
                                    <input type="date" class="form-control" id="thongbao_ht1" name="f25_1thongbao_ht1" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="deadline_ht1">Deadline HT1</label>
                                    <input type="text" class="form-control" id="deadline_ht1" name="f25_2_deadline_ht1" placeholder="Date + 02 tháng" readonly />
                                </div>
                            </div>
                        
                            <!-- Hàng 2: Gia hạn HT1 và Deadline GH1 -->
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label for="giahan_ht1">Gia hạn HT1</label>
                                    <input type="date" class="form-control" id="giahan_ht1" name="f25_3_giahan_ht1" required />
                                </div>
                                <div class="col-md-6">
                                    <label for="deadline_gh1">Deadline GH1</label>
                                    <input type="text" class="form-control" id="deadline_gh1" name="f25_4_deadline_gh1" placeholder="Date + 04 tháng" readonly />
                                </div>
                            </div>
                            <div class="mb-2">
                                <label>Ngày phúc đáp</label>
                                <input type="date" class="form-control" />
                            </div>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Add</button>
                        </fieldset>
                    </div>
                    <div class="col-md-6 mb-3">
                        <fieldset class="border p-3 rounded">
                            <legend class="float-none w-auto px-2 fs-6">Deadline loại 1</legend>
                            
                            <div class="mb-2">
                                <label>Chấp nhận HT</label>
                                <input type="date" class="form-control" name="f26_chap_nhan_ht" />
                            </div>
                            <div class="mb-2">
                                <label>Công bố đơn</label>
                                <input type="date" class="form-control" name="f27_cong_bo_don" />
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="row">
                    <!-- Deadline loại 2 -->
                    <div class="col-md-6 mb-3">
                        <fieldset class="border p-3 rounded">
                            <legend class="float-none w-auto px-2 fs-6">Deadline loại 2</legend>
                                <div class="row mb-2" >
                                    <div class="col-md-6">
                                    <label>Thông báo ND1</label>
                                    <input type="date" class="form-control" name="f28_1_thong_bao_nd1" />
                                </div>
                                <div class="col-md-6">
                                    <label>Deadline ND1</label>
                                    <input type="text" class="form-control" placeholder="Date + 03 tháng"  name="f28_2_deadline_nd1"/>
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label>Gia hạn ND1</label>
                                    <input type="date" class="form-control" name="f28_3_giahan_nd1" />
                                </div>
                                <div class="col-md-6">
                                    <label>Deadline GH1</label>
                                    <input type="text" class="form-control" placeholder="Date + 06 tháng" name="f28_4_deadline_gh1" />
                                </div>
                            </div>
                            
                            <div class="mb-2">
                                <label>Ngày phúc đáp</label>
                                <input type="date" class="form-control" name="f28_5_ngay_phuc_dap" />
                            </div>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Add</button>
                        </fieldset>
                    </div>
                    <!-- Deadline loại 3 -->
                    <div class="col-md-6 mb-3">
                        <fieldset class="border p-3 rounded">
                            <legend class="float-none w-auto px-2 fs-6">Deadline loại 3</legend>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label>Chấp nhận CB</label>
                                    <input type="date" class="form-control" name="f29_1_chap_nhan_cb" />
                                </div>
                                <div class="col-md-6">
                                    <label>Deadline nộp phí</label>
                                    <input type="text" class="form-control" placeholder="Date + 03 tháng" name="f29_2_deadline_nop_phi" />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label>Gia hạn nộp phí</label>
                                    <input type="text" class="form-control" placeholder="Date + 06 tháng" name="f29_3_gia_han_nop_phi" />
                                </div>
                                <div class="col-md-6">
                                    <label>Deadline nộp phí</label>
                                    <input type="text" class="form-control" placeholder="Date + 06 tháng" name="f29_4_deadline_nop_phi" />
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-md-6">
                                    <label>Ngày đóng phí</label>
                                    <input type="date" class="form-control" name="f29_5_ngay_dong_phi" />
                                </div>
                                <div class="col-md-6">
                                    <label>Ngày gửi bằng</label>
                                    <input type="date" class="form-control" name="f29_6_ngay_gui_bang" />
                                </div>
                            </div>                        
                           
                        </fieldset>
                    </div>
                </div>
                <!-- Deadline loại 4 -->
                <div class="row">
                    <div class="col-12">
                        <fieldset class="border p-3 rounded">
                            <legend class="float-none w-auto px-2 fs-6">Deadline loại 4</legend>
                            <div class="row mb-2">
                                <div class="col-md-3">
                                    <label>Mô tả sự việc</label>
                                    <input type="text" class="form-control" name="f30_1_mo_ta_su_viec" />
                                </div>
                                <div class="col-md-2">
                                    <label>Ngày phát sinh</label>
                                    <input type="date" class="form-control" name="f30_2_ngay_phat_sinh" />
                                </div>
                                <div class="col-md-2">
                                    <label>Deadline</label>
                                    <input type="date" class="form-control" name="f30_3_deadline" />
                                </div>
                                <div class="col-md-2">
                                    <label>Ngày xử lý</label>
                                    <input type="date" class="form-control" name="f30_4_ngay_xu_ly" />
                                </div>
                                <div class="col-md-3">
                                    <label>Ghi chú</label>
                                    <input type="text" class="form-control" name="f30_5_ghi_chu" />
                                </div>
                            </div>
                            <button class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Add</button>
                        </fieldset>
                    </div>
                </div>
            </div>   
            <!-- end of cụm 3 -->
             <!-- Cụm 4: Duy trì gia hạn hiệu lực -->
<div class="card card-custom p-4 mb-4">
    <h5 class="text-success fw-bold mb-3">Cụm 4: Duy trì gia hạn hiệu lực</h5>
    <div class="row mb-3">
        <div class="col-md-3">
            <label for="ma_duy_tri_gia_han">Mã duy trì gia hạn</label>
            <input type="text" class="form-control" id="ma_duy_tri_gia_han" name="f31_ma_duy_tri_gia_han" placeholder="Text">
        </div>
    </div>
    <div class="mb-2">
        <div class="ms-3">
            <div class="mb-2">    
                <div class="row mb-2">
                    <div class="col-md-3">
                        <label>Deadline duy trì năm 1</label>
                        <input type="date" class="form-control" name="f32_1_vn_deadline_duy_tri_nam1">
                    </div>
                    <div class="col-md-3">
                        <label>Ngày nộp duy trì</label>
                        <input type="date" class="form-control" name="f32_2_vn_ngay_nop_duy_tri_nam1">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Trạng thái</label>
                        <input type="text" class="form-control" name="f32_3_vn_trangthai" readonly>
                    </div>
                    
                </div>
                <div class="mt-2">
                        <button class="btn btn-primary btn-sm"><i class="bi bi-plus-circle"></i> Add</button>
                </div>
              
            </div>
            
        </div>
    </div>
    
</div>
            <!-- end cụm 4 -->
            <!-- Cụm 5: Thủ tục liên quan sau cấp bằng -->
            <div class="card card-custom p-4 mb-4">
                <div class="mb-2" style="background: #009846; color: #fff; padding: 8px 16px; border-radius: 4px 4px 0 0; font-weight: bold;">
                    Cụm 5: Thủ tục liên quan sau cấp bằng
                </div>
                <div class="p-3" style="border: 1px solid #222;">
                    <div class="row mb-2">
                        <div class="col-md-2">
                            <label class="form-label">Mã vụ việc</label>
                            <input type="text" class="form-control" placeholder="Nhập text" name="f33_1_ma_vu_viec">
                        </div>
                    </div>
                    <div class="p-3" style="border: 1px solid #222;">
                        <div class="row mb-2 align-items-end">
                            <div class="col-md-3">
                                <label class="form-label">Mô tả sự việc</label>
                                <input type="text" class="form-control" placeholder="Text" name="f33_1_1_mo_ta_su_viec">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Ngày phát sinh</label>
                                <input type="date" class="form-control" name="f33_1_2_ngay_phat_sinh">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Deadline</label>
                                <input type="date" class="form-control" name="f33_1_3_deadline">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label">Ngày xử lý</label>
                                <input type="date" class="form-control" name="f33_1_4_ngay_xu_ly">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Ghi chú</label>
                                <input type="text" class="form-control" placeholder="Text" name="f33_1_5_ghi_chu">
                            </div>
                            
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-primary btn-sm  dropdown-toggle" data-bs-toggle="dropdown">
                                Add
                            </button>                            
                        </div>
                    </div>
                    <div class="text-end text-danger fw-bold mt-2">Deadline loại 6</div>
                </div>
                <div class="mt-2">
                    <button class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                        Add
                    </button>                    
                </div>
            </div>
            <!-- end cụm 5 -->
            <!-- cụm 6  -->

            <div class="card card-custom p-4 mb-4">
                <div class="mb-2" style="background: #009846; color: #fff; padding: 8px 16px; border-radius: 4px 4px 0 0; font-weight: bold;">
                    Cụm 6: Tài liệu thanh toán
                </div>
                <div class="p-3" style="border: 1px solid #222;">
                    
                    <div class="row mb-2 align-items-end">
                        <div class="col-md-3">
                            <label class="form-label">Tên tài liệu</label>
                            <input type="text" class="form-control" placeholder="Text" name="f34_1_ten_tai_lieu">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Số tài liệu</label>
                            <input type="text" class="form-control" placeholder="Text" name="f34_2_so_tai_lieu">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Ngày phát hành</label>
                            <input type="date" class="form-control" name="f34_3_ngay_phat_hanh">
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Ghi chú</label>
                            <input type="text" class="form-control" placeholder="Text" name="f34_4_ghi_chu">
                        </div>                        
                    </div>                    
                </div>
                <div class="mt-2">
                    <button class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                        Add
                    </button>                    
                </div>
            </div>
            <!-- end cụm 6 -->
            <!-- cụm 7 -->
                <div class="card card-custom p-4 mb-4">
                <div class="mb-2" style="background: #009846; color: #fff; padding: 8px 16px; border-radius: 4px 4px 0 0; font-weight: bold;">
                    Cụm 7: Lịch sử giao dịch
                </div>
                <div>
                    Tài liệu đến
                </div>
                <div class="p-3" style="border: 1px solid #222;">                    
                    <div class="row mb-2 align-items-end">
                        <div class="col-md-2">
                            <label class="form-label">Tên tài liệu</label>
                            <input type="text" class="form-control" placeholder="Text" name="f35_1_ten_tai_lieu">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Số tài liệu</label>
                            <input type="text" class="form-control" placeholder="Text" name="f35_2_so_tai_lieu">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Người gửi</label>
                            <input type="text" class="form-control" placeholder="Text" name="f35_3_ngay_phat_hanh">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Ngày nhận</label>
                            <input type="date" class="form-control" name="f35_4_ngay_nhan">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Ghi chú</label>
                            <input type="text" class="form-control" name="f35_5_ghi_chu">
                        </div>                        
                    </div>                    
                </div>
                <div class="mt-2">
                    <button class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                        Add
                    </button>                    
                </div>


               <div>
                    Tài liệu đi
                </div>
                <div class="p-3" style="border: 1px solid #222;">                    
                    <div class="row mb-2 align-items-end">
                        <div class="col-md-2">
                            <label class="form-label">Tên tài liệu</label>
                            <input type="text" class="form-control" placeholder="Text" name="f36_1_ten_tai_lieu">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Số tài liệu</label>
                            <input type="text" class="form-control" placeholder="Text" name="f36_2_so_tai_lieu">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Người gửi</label>
                            <input type="text" class="form-control" placeholder="Text" name="f36_3_ngay_phat_hanh">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Ngày nhận</label>
                            <input type="date" class="form-control" name="f36_4_ngay_nhan">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Ghi chú</label>
                            <input type="text" class="form-control" name="f36_5_ghi_chu">
                        </div>                        
                    </div>                    
                </div>
                <div class="mt-2">
                    <button class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown">
                        Add
                    </button>                    
                </div>     


            </div>
            <!-- end cụm 7 -->
        <!-- end of content -->
        </div>

    </div>
</div>

<!-- ================= FOOTER ================= -->
<footer class="footer py-4  text-white">
    <div class="container text-center">
        © <?= date('Y') ?> MyWebsite. All rights reserved.
    </div>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/scripts.js"></script>

</body>
</html>
