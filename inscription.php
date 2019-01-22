<?php

require_once 'database-process.php';

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$obj = new stdClass();

$username = $_POST['username'];
$password = md5($_POST['password']);
$mail = $_POST['mail'];

$usertest = "";

$query = 'SELECT Username as $usertest FROM Users WHERE Username = \'' . $username . '\'';

if ($usertest != ""){
	$obj->success = false;
}
else {
	Inscription($username, $password, $mail);
	$obj->success = true;
}

echo json_encode($obj);
