<?php

session_start();


header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$obj = new stdClass();

$obj->success = true;

    $_SESSION['nomDeck'] = $_POST['nom'];

echo json_encode($obj);