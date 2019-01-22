<?php

require_once 'page-builder.php';
require_once 'database-process.php';

$script = array();

page_head('Deck Listing', $script);

$query = 'SELECT * FROM DeckList';
$result = ExecuteQuery($query);

echo '
    <br/><br/><br/>
    <a href="testProjet.php">Create your own deck</a><br/><br/>
    <div id="ShowDeck" style="display: none">
    </div>
    <div id="DeckList">';

while ($result2 = $result->fetch(PDO::FETCH_OBJ)){
    echo '
        <a href="javascript:void(0)" onclick="showDeck('. $result2->NumDeck . ');">Deck '. $result2->NomDeck .' par ' . $result2->Auteur .'</a><br/>';
}

echo '
    </div>
    <a href="javascript:void(0)" onclick="showDeckList();" style="display: none" id="change">Look for another deck</a>';

page_foot();