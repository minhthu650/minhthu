<?php
session_start();

$password = 'minhthu@1010';

// Nếu chưa xác thực, hiển thị form
if (!isset($_SESSION['admin_verified'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_POST['admin_pass'] === $password) {
            $_SESSION['admin_verified'] = true;
            header('Location: admin.php');
            exit;
        } else {
            $error = "❌ Mật khẩu sai!";
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Admin VCB Digibank</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="logo">🔒 Trang quản trị</div>
    <div class="subtitle">Nhập mật khẩu admin để truy cập</div>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
      <input type="password" name="admin_pass" placeholder="Nhập mật khẩu quản trị">
      <button type="submit">Đăng nhập</button>
    </form>
    <div class="forgot"><a href="login.php">Quay lại trang chính</a></div>
  </div>
</body>
</html>

<?php
exit;
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>VCB Admin - Quản lý hệ thống</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="logo">VCB Digibank - Admin</div>
    <div class="subtitle">Chào mừng quản trị viên</div>

    <div style="display: flex; flex-direction: column; gap: 10px;">
      <form method="get" action="list_users.php">
        <button type="submit">📄 Xem danh sách người dùng</button>
      </form>

      <form method="get" action="history.csv">
        <button type="submit">📂 Lịch sử đổi mật khẩu</button>
      </form>

      <form method="get" action="login.php">
        <button type="submit">🚪 Đăng xuất</button>
      </form>
    </div>
  </div>
</body>
</html>
