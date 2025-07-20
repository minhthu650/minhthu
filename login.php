<?php /* login.php */ ?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>VCB Digibank</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <div class="logo">VCB Digibank</div>
    <div class="subtitle">Kính chào Quý khách</div>

    <?php if (isset($_GET['error'])) echo '<div class="msg">Sai thông tin đăng nhập!</div>'; ?>

    <form method="post" action="auth.php">
      <label for="username">Tên đăng nhập</label>
      <div class="input-group">
        <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
      </div>

      <label for="password">Mật khẩu</label>
      <div class="input-group">
        <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
      </div>

      <button type="submit">Đăng nhập</button>
    </form>

    <div class="forgot">
      <a href="index.html">Quay lại trang chính</a>
    </div>
  </div>
</body>
</html>

