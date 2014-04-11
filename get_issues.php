<?php
$db = new PDO('sqlite:issues.sqlite');
$sql = "SELECT id, name, website, issue, lat, lng, timestamp FROM issues;";

$rs = $db->query($sql);
if (!$rs) {
    echo "An SQL error occured.\n";
    exit;
}

$rows = array();
while($r = $rs->fetch(PDO::FETCH_ASSOC)) {
    $rows[] = $r;
}
print json_encode($rows);
$db = NULL;
?>