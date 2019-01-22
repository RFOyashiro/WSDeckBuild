<?php

    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');

    session_start();

    if ($_SESSION['logged'] = true){
        session_destroy();
    }

    $obj = new stdClass();
    $obj->success = true;
    $obj->message = "Au revoir o/";
    echo json_encode($obj);
