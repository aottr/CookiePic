<?php

	require_once "include/configuration.php";

	if(!isset($_COOKIE["ID"]))
		$img_path = "img/" . $_GET['user'] . "/default.png";
	else
		$img_path = file_get_contents("data/" . $_COOKIE["ID"]);

	header("Content-type: image/png");
	echo file_get_contents($img_path);
	die;
