<?php

$key = bin2hex(mcrypt_create_iv(22, MCRYPT_DEV_URANDOM));

	require_once "include/helper.php";

	if(isset($_GET['user']))
	{
		$user = new UserModel( [ 'ID' => $key, 'Name' => $_GET['user'], 'Hash' => hash("sha512", $key)] );
		echo json_encode ( [$user->ID => $user] );
	}