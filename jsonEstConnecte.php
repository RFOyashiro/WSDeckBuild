<?php
/**
 * Created by PhpStorm.
 * User: s14004402
 * Date: 10/03/16
 * Time: 14:34
 */

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
//OBLIGATOIRE POUR QUE CETTE CONNERIE COMPRENDS CE QUE TU VEUX FAIRE


session_start();

$obj = new stdClass();

if (isset($_SESSION['logged'])) {
    $obj->success = true;
    $obj->message = 'Vous êtes de retour \o/';
}
else {
    $obj->success = false;
    $obj->message = 'Vous n\'êtes pas connecté :o';
}

echo json_encode($obj);