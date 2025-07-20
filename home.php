<?php
session_start();

// Mật khẩu cố định để truy cập
$admin_password = 'minhthu@1010';

// Nếu chưa xác thực thì hiển thị form
if (!isset($_SESSION['home_verified'])) {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if ($_POST['home_pass'] === $admin_password) {
            $_SESSION['home_verified'] = true;
            header("Location: home.php?u=admin"); // Gán tên giả định nếu cần
            exit;
        } else {
            $error = "❌ Mật khẩu không đúng!";
        }
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>VCB Digibank - Bảo vệ</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="logo">VCB Digibank</div>
    <div class="subtitle">🔐 Nhập mật khẩu để tiếp tục</div>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="post">
      <input type="password" name="home_pass" placeholder="Mật khẩu truy cập">
      <button type="submit">Vào trang chính</button>
    </form>
    <div class="forgot"><a href="login.php">Quay lại</a></div>
  </div>
</body>
</html>
<?php
exit;
}
?>

<?php
$user = $_GET['u'] ?? 'Ẩn danh';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>VCB Digibank - Trang chính</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="logo">VCB Digibank</div>
    <div class="subtitle">Xin chào <strong><?php echo htmlspecialchars($user); ?></strong></div>

    <div style="display: flex; flex-direction: column; gap: 10px;">
      <form method="get" action="change_password.php">
        <input type="hidden" name="u" value="<?php echo htmlspecialchars($user); ?>">
        <button type="submit">Đổi mật khẩu</button>
      </form>

      <form method="get" action="list_users.php">
        <button type="submit">Xem danh sách người dùng</button>
      </form>

      <form method="get" action="history.csv">
        <button type="submit">Xem lịch sử đổi mật khẩu</button>
      </form>

      <form method="get" action="logout.php">
        <button type="submit">Đăng xuất</button>
      </form>
    </div>
  </div>
</body>
</html>
