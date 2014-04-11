<?php
$name = htmlspecialchars(trim($_POST['name']));
$email = htmlspecialchars(trim($_POST['email']));
$website = htmlspecialchars(trim($_POST['website']));
$issue = htmlspecialchars(trim($_POST['issue']));
$lat = htmlspecialchars(trim($_POST['lat']));
$lng = htmlspecialchars(trim($_POST['lng']));
$token = mt_rand(100000, 999999);

$db = new PDO('sqlite:issues.sqlite');
$db->exec("INSERT INTO issues (name, email, website, issue, lat, lng, token) VALUES ('$name', '$email', '$website', '$issue', '$lat', '$lng', '$token');");
$db = NULL;

$subject = "Thank you for reporting a trail issue!";
$body = '
<html>
<head>
</head>
<body>
	<p>Thank you for adding an issue to the trail map!</p>
	Your issue information:<br>
	-------------------------<br>
	Email: '.$email.'<br>
	Token: '.$token.'<br>
	-------------------------<br><br>
	Should you need to delete the issue you submitted, please visit the map and click on Remove Issue under Tools.<br>
	Enter your email and unique token to remove your entry from the database.<br>
</body>
</html>
';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: BCT Issue Reporting <bct@davidtodd.info>' . "\r\n";
$headers .= 'Bcc: bct@davidtodd.info' . "\r\n";
mail($email, $subject, $body, $headers, "-fbct@davidtodd.info");
?>