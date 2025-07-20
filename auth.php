<?php
$user = $_POST['username'] ?? '';
$pass = $_POST['password'] ?? '';

$lines = file('users.csv');
array_shift($lines);

$valid = false;
foreach ($lines as $line) {
  $parts = explode(',', trim($line));
  if (count($parts) >= 2) {
    list($u, $p) = $parts;
    if ($user === $u && $pass === $p) {
      $valid = true;
      break;
    }
  }
}
// auth.php
if ($valid) {
  header("Location: dashboard.php?u=" . urlencode($user));
}

 else {
  header("Location: login.php?error=1");
}

exit;
?>

