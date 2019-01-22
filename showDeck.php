<?php
/**
 * Created by PhpStorm.
 * User: s14004402
 * Date: 29/03/16
 * Time: 09:07
 */

require_once 'database-process.php';

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$obj = new stdClass();

$query = 'SELECT * FROM DeckComposition WHERE NumDeck = ' . $_POST['NumDeck'];
$result = ExecuteQuery($query);
$num = array();
$nbFois = array();
$i = 0;

while ($result2 = $result->fetch(PDO::FETCH_OBJ)) {
    $num[$i] = $result2->NumCarte;
    $nbFois[$i] = $result2->NbExemplaire;

    $carteImg = substr($num[$i], strrpos($num[$i], '-'));
    $carteImg2 = str_replace ($carteImg, '', $num[$i]);
    $carteImg3 = str_replace ('/', '_', $num[$i]);
    $carteImg3 = str_replace('-', '_', $carteImg3);

    $carteLink[$i] = $carteImg2 . '/' . $carteImg3;

    $i++;
}

$obj->i = $i;
$obj->numCard = $num;
$obj->nbFoisCard = $nbFois;
$obj->carteLink = $carteLink;
$obj->success = true;

echo json_encode($obj);



