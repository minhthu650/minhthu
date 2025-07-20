<?php
$rows = array_map('str_getcsv', file('users.csv'));
array_shift($rows);
?>
<h2>Danh sách tài khoản (users.csv)</h2>
<table border=1 cellpadding=5>
<tr><th>STT</th><th>Username</th><th>Password</th></tr>
<?php foreach ($rows as $i => $r) {
  echo "<tr><td>".($i+1)."</td><td>{$r[0]}</td><td>{$r[1]}</td></tr>";
} ?>
</table>
