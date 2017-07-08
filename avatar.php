<?php

	require_once "include/configuration.php";

	if(!isset($_COOKIE["ID"]))
		$img_path = "img/staubi/default.png";
	else
		$img_path = "img/staubi/dragon.png";

	header("Content-type: image/png");
	echo file_get_contents($img_path);
	die;
