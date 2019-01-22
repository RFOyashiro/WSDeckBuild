<?php

require_once 'database-process.php';
	
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$obj = new stdClass();

$deck = json_decode($_POST['deck'], true);

addDeck($deck);

$obj->success = true;
echo json_encode($obj);




/*
//connection BD
//check nombre deck
//donne $idDeck = nbDeck + 1

for ($i = 0; i < count($deck); ++i) {
	$num = $deck[i].num;
	$nbFois = $deck[i].nbFois;
	'INSERT INTO DeckComposition VALUE (\'' . $num . '\', ' . $nbFois . ', ' . $idDeck . ')';
}*/

