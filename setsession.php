<?php
	
	require_once "include/configuration.php";
	require_once "include/UserModel.php";

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

	// check key

	$assc = json_decode(file_get_contents("test.txt"), true);

	$user = NULL;

	foreach ($assc as $userm) {

		$userm = (object)$userm;
		if($userm->Hash == $_GET['hash'])
			$user = $userm;
	}

	if($user == NULL) {

		echo "User does'nt exist.";
		die;
	}

	if($user->Active == TRUE) {

		echo "User already active.";
		die;
	}

	$user->Active = TRUE;

	// save Users
	file_put_contents ("test.txt", json_encode (array_replace($assc, [ $user->ID => $user ])));

	$generated = setcookie
	(	
		"ID", 
		$user->ID, 
		COOKIE_LIFETIME, 
		COOKIE_PATH,
		COOKIE_DOMAIN,
		COOKIE_SECURE,
		COOKIE_HTTPONLY
	);

	if($generated)

		echo "User successfully generated.";
	else
		echo "User could not be generated.";
