<?php
	
	require_once "include/configuration.php";
	require_once "include/UserModel.php";
	require_once "include/helper.php";

	// Error Handling
	if(!DEBUG)
		error_reporting(0);
	else
		error_reporting(E_ALL);

	if(isset($_COOKIE["ID"])) {

		echo "Cookie has already been set.";
		die;
	}

	
	if(!isset($_GET['hash'])) {

		echo "No supported hash.";
		die;
	}

	// validate user by hash -> helper

	$user = validateUser($_GET['hash']);

	if($usern === FALSE)
		die;

	$generated = setcookie
	(	
		"ID", 
		$user, 
		COOKIE_LIFETIME, 
		COOKIE_PATH,
		COOKIE_DOMAIN,
		COOKIE_SECURE,
		COOKIE_HTTPONLY
	);

	if($generated) {

		$view = new View('success');
		$view->set("message", "User successfully generated.");
		$view->render();
	}
	else {
		$view = new View('error');
		$view->set("message", "User could not be generated.");
		$view->render();
	}
