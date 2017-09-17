<?php

	require_once "include/configuration.php";

	if(!isset($_COOKIE["ID"]))
		$img_path = "img/staubi/default.png";
	else
		$img_path = "img/staubi/dragon.png";

	$sleep = false;
	$time = (int) date('Gi');
	if (($time > 2130) || ($time < 800)) 
		$sleep = true;
	
	header("Content-type: image/png");
	
	if($sleep) {
		
		$img_path = "img/staubi/sleep.gif";
		header("Content-Type: image/gif");
	}	

	echo file_get_contents($img_path);
	die;
