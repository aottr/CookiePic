<?php
$time = (int) date('Gi');
//echo ($time > 2130) || ($time < 800) ? "night" : "day";

if(isset($_GET['user'])) {

?>
Zeichenkette: 

<?php
	echo $_GET['user'];
?> <br><br>
User: <?php
	$user = explode('?', $_GET['user']);
	echo $user[0];
}