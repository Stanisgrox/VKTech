<?php 
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {} 
else{ exit ('<h1>YOU ARE NOT ALLOWED TO DO THAT</h1>.<br>By Stanisgrox, 2017');}

require_once('config.php');
$db = mysqli_connect($db_host, $db_usr, $db_pass, $db_name);
if (!$db){exit ('0');} // 0 - нет подключения к базе данных
mysqli_set_charset($db,'utf8');

if($_POST){
	$login = mysqli_real_escape_string($db,$_POST['login']);
	$password = password_hash(strip_tags(trim($_POST['password'])),PASSWORD_DEFAULT);
	$name = mysqli_real_escape_string($db,$_POST['name']);
	$surname = mysqli_real_escape_string($db,$_POST['surname']);
	$email = mysqli_real_escape_string($db,$_POST['email']);
	$datereg = date('Y-m-d H:i:s');	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)){exit ('5');} // 5 - неверный формат email
	foreach($_POST['spec'] as $val){$cat = $cat.$val.'pl';}
	$query = "INSERT INTO `users` (`login`,`password`,`name`,`surname`,`email`,`category`,`datereg`,`group`)
	VALUES ('$login','$password','$name','$surname','$email','$cat','$datereg','usr')";

	$success = mysqli_query($db,$query);
	if($success) {exit('100');} else {exit('99');} // 100 - регистрация успешна. 99 - повтор логина или email
}
?>