<?php
	
	date_default_timezone_set('Europe/Berlin');
	
	define('DEBUG',				1);

	/**
	 *	Cookie Settings
	 */
	define('COOKIE_LIFETIME',	1924905600); // 12/31/2030 @ 12:00am (UTC)
	define('COOKIE_PATH',		'/');
	define('COOKIE_DOMAIN', 	'');
	define('COOKIE_SECURE',		false);
	define('COOKIE_HTTPONLY', 	true);

	//define('ROOT_DIR',			'');
	define('USR_IMG_DATA',		'data/');
	define('IMG_DIR', 			'img/');
	define('USR_DATA', 			USR_IMG_DATA . 'userdata.json'); 
	define('DEFAULT_PIC',		IMG_DIR . 'default.png');
