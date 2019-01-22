<?php

    header('Cache-Control: no-cache, must-revalidate');
    header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
    header('Content-type: application/json');

	require_once 'database-process.php';
	
    session_start();

    function valid_input(& $input) {
        if (isset($input) && is_string($input)) {
            return $input;
        }
        else {
            return false;
        }
    }

    $obj = new stdClass();

    if (valid_input($_POST['nom']) && valid_input($_POST['password'])) {
        if (ConnexionCompte($_POST['nom'], $_POST['password'])){
        // Sinon $obj->success = false;
        $_SESSION['logged'] = true;
		$_SESSION['name'] = $_POST['nom'];
        $obj->success = true;
        $obj->message = 'Bonjour, ' . $_POST['nom'] . ' o/';
		}
		else {
			$obj->success = false;
		}
    }
    else {
        $obj->success = false;
    }

    echo json_encode($obj);
