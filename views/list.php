<!DOCTYPE html>
<html lang="vi">

<head>

    <meta charset="UTF-8">
    <title>Danh sách hồ sơ</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
    body {
        background: #f5f5f5;
        font-family: Arial;
    }

    /* tiêu đề trang */
    .header-title {
        color: #c40000;
        font-weight: bold;
        font-size: 22px;
    }

    /* tabs */
    .tabs {
        border-bottom: 2px solid #eee;
    }

    .tabs a {
        padding: 10px 15px;
        text-decoration: none;
        color: #555;
        font-weight: 500;
    }

    .tabs a.active {
        border-bottom: 3px solid #f4b400;
        color: black;
    }

    .tabs a:hover {
        color: #c62828;
    }

    /* khung bảng */
    .table-wrapper {
        background: white;
        border-radius: 6px;
        overflow: hidden;
    }

    /* header bảng
    .table thead th {
        background: #c62828;
        color: white;
    } */

    /* hover dòng */
    .table tbody tr:hover {
        background: #e3f2fd;
        cursor: pointer;
        transition: 0.2s;
    }

    /* trạng thái */
    .status {
        color: #555;
    }

    /* tiền */
    .amount {
        font-weight: bold;
    }

    /* link */
    .link {
        color: #1a73e8;
        text-decoration: none;
        font-size: 13px;
    }

    /* icon thao tác */
    .actions i {
        margin-right: 10px;
        font-size: 18px;
        cursor: pointer;
    }

    .actions i:hover {
        transform: scale(1.2);
    }
    </style>

</head>

<body>

    <div class="container-fluid mt-4">

        <!-- tiêu đề -->
        <div class="row mb-3 align-items-center">

            <div class="col-md-6">
                <div class="header-title">
                    Danh sách hồ sơ - Đang xử lý (27)
                </div>
            </div>

            <div class="col-md-6 text-end">

                <div class="tabs d-inline">

                    <a href="#" class="active">All</a>
                    <a href="#">Sáng chế</a>
                    <a href="#">Nhãn hiệu</a>
                    <a href="#">Kiểu dáng</a>
                    <a href="#">Others</a>

                </div>

            </div>

        </div>

        <!-- bảng -->

        <div class="table-wrapper">

            <table class="table table-bordered align-middle">

                <thead class="table-primary">

                    <tr>

                        <th style="width:60px">STT</th>

                        <th>Mã tiếp nhận ID</th>

                        <th>Số đơn</th>

                        <th>Loại đơn</th>

                        <th>
                            Ngày nộp<br>
                            Ngày tiếp nhận
                            <i class="bi bi-arrow-down-up"></i>
                        </th>

                        <th>
                            Tổng phí (VND)<br>
                            Trạng thái thanh toán
                        </th>

                        <th>Trạng thái</th>

                        <th style="width:140px">Thao tác</th>

                    </tr>

                </thead>

                <tbody>

                    <tr>

                        <td>1</td>

                        <td>E202600907067</td>

                        <td>1-2026-01128</td>

                        <td>
                            Đơn đăng ký sáng chế: Cơ cấu kẹp dùng cho robot
                        </td>

                        <td>
                            10/02/2026 10:34<br>
                            10/02/2026 10:35
                        </td>

                        <td class="amount">

                            2.655.000<br>

                            <a href="#" class="link">
                                Có biên lai
                            </a>

                        </td>

                        <td class="status">
                            Đang thẩm định
                        </td>

                        <td class="actions">

                            <i class="bi bi-eye text-primary"></i>
                            <i class="bi bi-pencil text-success"></i>
                            <i class="bi bi-trash text-danger"></i>

                        </td>

                    </tr>

                    <tr>

                        <td>2</td>

                        <td>E2026009495D288</td>

                        <td>-</td>

                        <td>
                            CÔNG TY CỔ PHẦN CÔNG NGHỆ WEGLOW
                        </td>

                        <td>
                            06/02/2026 11:16<br>
                            06/02/2026 11:21
                        </td>

                        <td class="amount">

                            1.730.000<br>

                            <a href="#" class="link">
                                Có biên lai
                            </a>

                        </td>

                        <td class="status">
                            Đang thẩm định
                        </td>

                        <td class="actions">

                            <i class="bi bi-eye text-primary"></i>
                            <i class="bi bi-pencil text-success"></i>
                            <i class="bi bi-trash text-danger"></i>

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</body>

</html>