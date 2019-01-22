<?php
/**
 * Created by PhpStorm.
 * User: s14004402
 * Date: 10/03/16
 * Time: 16:55
 */

require_once 'database-process.php';

header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');

$obj = new stdClass();

$serie = $_GET['serie'];

if($serie == 'Wooser\'s Hand-to-Mouth Life'){
	$serie = 'Wooser\'\'s Hand-to-Mouth Life';
}

$result = SearchSerie($serie);

$num = array();
$name = array();
$type = array();
$color = array();
$level = array();
$cout = array();
$trigger = array();
$card = array();
$carteLink = array();
$i = 0;

while ($result2 = $result->fetch(PDO::FETCH_OBJ)) {
    $num[$i] = $result2->Num;
    $name[$i] = $result2->Name;
    $type[$i] = $result2->Type;
    $color[$i] = $result2->Color;
    $level[$i] = $result2->Level;
    $cout[$i] = $result2->Cout;
    $trigger[$i] = $result2->Trig;

    if ($trigger[$i] == "") {
        $trigger[$i] = "None";
    }

    $card[$i] = $result2->Num;

    $carteImg = substr($card[$i], strrpos($card[$i], '-'));
    $carteImg2 = str_replace ($carteImg, '', $card[$i]);
    $carteImg3 = str_replace ('/', '_', $card[$i]);
    $carteImg3 = str_replace('-', '_', $carteImg3);

    $carteLink[$i] = $carteImg2 . '/' . $carteImg3;
    $carteLink[$i] = 'http://wsdecks.com/static/img/' . $carteLink[$i] . '.gif';

    /*$ch = curl_init($carteLink[$i]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FAILONERROR, TRUE);
    curl_exec($ch);

    if (curl_errno($ch)){
        $carteLink[$i] = 'https://approachphase.files.wordpress.com/2013/05/148lwsm.png';
    }

    curl_close($ch);*/

    $i++;
}

$obj->carte = $card;
$obj->carteLink = $carteLink;
$obj->numCard = $num;
$obj->nameCard = $name;
$obj->typeCard = $type;
$obj->colorCard = $color;
$obj->levelCard = $level;
$obj->coutCard = $cout;
$obj->triggerCard = $trigger;
$obj->nbCard = $i;

if($serie == 'Wooser\'\'s Hand-to-Mouth Life'){
	$serie = 'Wooser\'s Hand-to-Mouth Life';
}

$obj->serieCard = $serie;
$obj->success = true;

echo json_encode($obj);