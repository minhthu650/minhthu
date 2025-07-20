<?php $user = $_GET['u'] ?? 'Ẩn danh'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>VCB Digibank - Tài khoản</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="logo">VCB Digibank</div>
    <div class="subtitle">Xin chào <strong><?php echo htmlspecialchars($user); ?></strong></div>

    <div style="display: flex; flex-direction: column; gap: 10px;">
      <form method="get" action="change_password.php">
        <input type="hidden" name="u" value="<?php echo htmlspecialchars($user); ?>">
        <button type="submit">🔐 Đổi mật khẩu</button>
      </form>

      <form method="get" action="transfer.php">
        <input type="hidden" name="u" value="<?php echo htmlspecialchars($user); ?>">
        <button type="submit">💸 Chuyển tiền</button>
      </form>

      <form method="get" action="transactions.php">
        <input type="hidden" name="u" value="<?php echo htmlspecialchars($user); ?>">
        <button type="submit">📄 Lịch sử giao dịch</button>
      </form>

      <form method="get" action="profile.php">
        <input type="hidden" name="u" value="<?php echo htmlspecialchars($user); ?>">
        <button type="submit">📊 Thông tin tài khoản</button>
      </form>

      <form method="get" action="login.php">
        <button type="submit">🔓 Đăng xuất</button>
      </form>
    </div>
  </div>
</body>
</html>
