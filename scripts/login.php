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
$usr = mysqli_fetch_assoc(mysqli_query($db,"SELECT `id`,`login`,`password`,`email`,`vk`,`category` FROM `users` WHERE `login` = '$login'"));
if(password_verify($password,$usr['password'])){
	$key = md5($now);
	$request = 'http://api.vk.com/method/users.get?uids='.$usr['vk'].'&fields=photo_200';
	$response = file_get_contents($request);
	$response = substr($response,13);
	$response = substr($response, 0,-2);
	$info = json_decode($response,TRUE);
	$rights = explode("pl",$usr['category']);
	if(array_search('1000',$rights)||array_search('1000',$rights) == 0){$post = 'true';} else {$post = 'false';}
	echo '{"key":"'.$key.'","login":"'.$login.'","email":"'.$usr['email'].'","avatar":"'.$info['photo_200'].'","post":'.$post.',"categories":"'.$usr['category'].'"}';
	$id = $usr['id'];
	mysqli_query($db,"INSERT INTO `keys` (`id`,`key`,`loggedat`) VALUES ('$id','$key','$now')");

}
else {exit('00');}
?>