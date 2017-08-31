<?php
require_once('config.php');
$db = mysqli_connect($db_host, $db_usr, $db_pass, $db_name);
if (!$db){exit ('');}
mysqli_set_charset($db,'utf8');

$key = mysqli_real_escape_string($db,$_GET['key']);
$uid = mysqli_fetch_assoc(mysqli_query($db,"SELECT `id` FROM `keys` WHERE `key` = '$key' AND `actual`= 1"));
if(!$uid['id']){exit('error');}
$id = $uid['id'];
$jid = mysqli_real_escape_string($db,$_GET['work']);
$job = mysqli_fetch_assoc(mysqli_query($db,"SELECT `author`,`price` FROM `jobs` WHERE `id`='$jid' LIMIT 1"));
$owner = $job['author'];
$balance = mysqli_fetch_assoc(mysqli_query($db,"SELECT `balance` FROM `users` WHERE `id`='$owner' LIMIT 1"));
$new_balance = intval($balance['balance'])-intval($job['price'])-intval($job['price'])*0.05;
var_dump($jid);
mysqli_query($db,"UPDATE `users` SET `balance`='$new_balance' WHERE `id`='$owner'");
//Исполнитель
$balance = mysqli_fetch_assoc(mysqli_query($db,"SELECT `balance` FROM `users` WHERE `id`='$id' LIMIT 1"));
$new_balance = $balance['balance']+$job['price'];
mysqli_query($db,"UPDATE `users` SET `balance`='$new_balance' WHERE `id`='$id'");
//Комиссия
$balance = mysqli_fetch_assoc(mysqli_query($db,"SELECT `sum` FROM `comission` WHERE `key`=1 LIMIT 1"));
$new_balance = $balance['balance']+$job['price']*0.05;
mysqli_query($db,"UPDATE `comission` SET `sum`='$new_balance' WHERE `key`=1");
//Работа выполнена
mysqli_query($db,"UPDATE `jobs` SET `done`=1 WHERE `id`='$jid'");

?>