<?php
session_start();
include "connect.php";

/* ====== KIỂM TRA LOGIN ====== */
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

/* ====== PHÂN TRANG ====== */
$limit = 5; // số user / trang
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1;

$offset = ($page - 1) * $limit;

/* Tổng số bản ghi */
$total = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$totalPages = ceil($total / $limit);

/* Lấy dữ liệu theo trang */
$sql = "SELECT * FROM users ORDER BY id DESC LIMIT :limit OFFSET :offset";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Danh sách Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="container mt-4">

<!-- ====== HEADER ====== -->
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>DANH SÁCH USERS</h3>
    <div>
        Xin chào <b><?= htmlspecialchars($_SESSION['user']['email']) ?></b>
        | <a href="logout.php">Đăng xuất</a>
    </div>
</div>

<a href="user_form.php" class="btn btn-primary mb-3">➕ Thêm user</a>

<!-- ====== TABLE ====== -->
<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th width="60">ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Phone</th>
            <th width="80">Level</th>
            <th width="160">Hành động</th>
        </tr>
    </thead>
    <tbody>
    <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['username']) ?></td>
            <td><?= htmlspecialchars($row['email']) ?></td>
            <td><?= htmlspecialchars($row['phone']) ?></td>
            <td>
                <?= $row['level'] == 1 ? 'Admin' : 'User' ?>
            </td>
            <td>
                <a href="user_form.php?id=<?= $row['id'] ?>"
                   class="btn btn-warning btn-sm">Sửa</a>

                <?php if ($_SESSION['user']['level'] == 1) { ?>
                    <a href="user_delete.php?id=<?= $row['id'] ?>"
                       onclick="return confirm('Xóa user này?')"
                       class="btn btn-danger btn-sm">Xóa</a>
                <?php } ?>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<!-- ====== PHÂN TRANG ====== -->
<nav>
<ul class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
        <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
            <a class="page-link" href="?page=<?= $i ?>">
                <?= $i ?>
            </a>
        </li>
    <?php } ?>
</ul>
</nav>

</body>
</html>
