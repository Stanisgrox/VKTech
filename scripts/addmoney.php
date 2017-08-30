<?php
include('config.php');
$db = mysqli_connect($db_host, $db_usr, $db_pass, $db_name);
if (!$db){exit ();}
$key = mysqli_real_escape_string($db,$_POST['key']);
$add = mysqli_real_escape_string($db,$_POST['addmoney']);
$uid = mysqli_fetch_assoc(mysqli_query($db,"SELECT `id` FROM `keys` WHERE `key` = '$key' AND `actual`= 1"));
if(!$uid['id']){exit('error');}
$id = $uid['id'];
$balance = mysqli_fetch_assoc(mysqli_query($db,"SELECT `balance` FROM `users` WHERE `id`='$id' LIMIT 1"));
$balance = $balance['balance'] + $add;
$result = mysqli_query($db,"UPDATE `users` SET `balance`='$balance' WHERE `id`='$id';");
if($result){exit('success');}
?>