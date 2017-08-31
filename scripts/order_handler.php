<?php
include('config.php');
$db = mysqli_connect($db_host, $db_usr, $db_pass, $db_name);
if (!$db){exit ();}
mysqli_set_charset($db,'utf8');

$key = mysqli_real_escape_string($db,$_POST['key']);
$uid = mysqli_fetch_assoc(mysqli_query($db,"SELECT `id` FROM `keys` WHERE `key` = '$key' AND `actual`= 1"));
if(!$uid['id']){exit('error');}
$id = $uid['id'];

$now = date('Y-m-d H:i:s');
$title = $_POST['oname'];
$till = $_POST['todate'].' '.$_POST['totime'].':00';
$price = $_POST['price'];
$category = $_POST['category'];
$query = "INSERT INTO `jobs` (`title`,`author`,`price`,`category`,`date`,`till`)
	VALUES ('$title','$id','$price','$category','$now','$till')";
mysqli_query($db,$query);
?>