<?php
$login = $_POST['login'];
$password = $_POST['password'];
if (!$login || !$password){exit ('0');}
$ip = 'NULL';
require_once('config.php');
$db = mysqli_connect($db_host, $db_usr, $db_pass, $db_name);
if (!$db){exit ();}

$login = mysqli_real_escape_string($db,$_POST['login']);

$now = date('Y-m-d H:i:s');
$usr = mysqli_fetch_assoc(mysqli_query($db,"SELECT `login`,`password`,`email`,`vk` FROM `users` WHERE `login` = '$login'"));
if(password_verify($password,$usr['password'])){
	$log = fopen('../logs/users.log','a');
	fwrite($log,'[LOGGED IN] '.$login.' AT '.$now.' FROM IP: '.$ip.'\r\n');
	fclose($log);
	$key = md5($now);
	
	$request = 'http://api.vk.com/method/users.get?uids='.$usr['vk'].'&fields=photo_200';
	$response = file_get_contents($request);
	$response = substr($response,13);
	$response = substr($response, 0,-2);
	$info = json_decode($response,TRUE);
	echo '{"key":"'.$key.'","login":"'.$login.'","email":"'.$usr['email'].'","avatar":"'.$info['photo_200'].'"}';

}
else {exit('00');}
?>