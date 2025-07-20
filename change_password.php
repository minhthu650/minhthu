<?php $u = $_GET['u'] ?? 'unknown'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đổi mật khẩu</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="logo">VCB Digibank</div>
    <div class="subtitle">Đổi mật khẩu cho người dùng: <?php echo htmlspecialchars($u); ?></div>
    <form method="post" action="change.php">
      <input type="hidden" name="username" value="<?php echo htmlspecialchars($u); ?>">
      <input name="newpass" type="password" placeholder="Mật khẩu mới" required>
      <button type="submit">Cập nhật</button>
    </form>
  </div>
</body>
</html>
