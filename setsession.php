<?php
	
	require_once "include/configuration.php";

	// Error Handling
	if(!DEBUG)
		error_reporting(0);
	else
		error_reporting(E_ALL);

	if(isset($_COOKIE["ID"])) {

		echo "Cookie has already been set.";
		die;
	}

	$hash = generateHash();

	$generated = setcookie
	(	
		"ID", 
		$hash, 
		COOKIE_LIFETIME, 
		COOKIE_PATH,
		COOKIE_DOMAIN,
		COOKIE_SECURE,
		COOKIE_HTTPONLY
	);

	function generateHash() {

		return md5(srand((double) microtime() * 1000000));
	}
	
	//file_put_contents (USR_IMG_DATA . $hash, DEFAULT_PIC); doesnt work for unknown reason

	if($generated)
		$generated = file_put_contents ("data/" . $hash, DEFAULT_PIC) === FALSE ? FALSE : TRUE;

	if($generated)

		echo "User successfully generated.";
	else
		echo "User could not be generated.";
