<?php
session_start();
header("Content-type: image/png");

if($_GET['user'] == "mikami") {
	$_SESSION['pic'] = "mikami";
}
if(@$_SESSION['pic'] == "mikami") 
	$im = imagecreatefrompng("mikami.png");

else
	$im = imagecreatefrompng("random.png");
imagepng($im);
imagedestroy($im);
?>
