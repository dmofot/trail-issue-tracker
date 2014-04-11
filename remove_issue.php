<?php
$email = $_REQUEST['email'];
$token = $_REQUEST['token'];

$db = new PDO('sqlite:issues.sqlite');
$sql = "DELETE FROM issues WHERE email = '$email' AND token = '$token';";

$rs = $db->query($sql);
$count = $rs->rowCount();
echo $count;
$db = NULL;
?>