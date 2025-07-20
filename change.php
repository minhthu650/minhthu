<?php
$u = $_POST['username'];
$new = $_POST['newpass'];

$lines = file('users.csv');
$output = [];
$oldpass = '';

foreach ($lines as $line) {
  if (str_starts_with($line, 'username')) {
    $output[] = $line;
    continue;
  }
  list($user, $pw, $otp, $time) = explode(',', trim($line), 4);
  if ($user === $u) {
    $oldpass = $pw;
    $output[] = "$user,$new,$otp,$time\n";
  } else {
    $output[] = $line;
  }
}
file_put_contents('users.csv', implode('', $output));

$history = "$u,$oldpass,$new," . date("Y-m-d H:i:s") . "\n";
file_put_contents('history.csv', $history, FILE_APPEND);

echo "✅ Đổi mật khẩu thành công!";
?>
