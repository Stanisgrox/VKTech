<?php
require_once('../scripts/config.php');
$db = mysqli_connect($db_host, $db_usr, $db_pass, $db_name);
if (!$db){exit ('');}
mysqli_set_charset($db,'utf8');

$categories = explode('pl',$_GET['cats']);
$onpage = 5;
if($_GET['onpage']){$onpage = $_GET['onpage'];}
if(!is_int($onpage)){$onpage = 5;} //Защита от SQL инъекции

function dating($date){
	$datetime = explode(' ',$date);
	$datef = explode('-',$datetime[0]);
	$datet = explode(':',$datetime[1]);
	switch ($datef[1]){
		case '01':$month = "января";break;
		case '02':$month = "февраля";break;
		case '03':$month = "марта";break;
		case '04':$month = "апреля";break;
		case '05':$month = "мая";break;
		case '06':$month = "июня";break;
		case '07':$month = "июля";break;
		case '08':$month = "августа";break;
		case '09':$month = "сентября";break;
		case '10':$month = "октября";break;
		case '11':$month = "ноября";break;
		case '12':$month = "декабря";break;}
	return intval($datef[2]).' '.$month.' '.$datef[0].' в '.$datet[0].':'.$datet[1];}
$collection = mysqli_query($db,"SELECT * FROM `jobs` WHERE `done` = 0 ORDER BY `id` DESC LIMIT ".$onpage);
while($row = mysqli_fetch_assoc($collection)){
	$uid = $row['author'];
	$publisher = mysqli_fetch_assoc(mysqli_query($db,"SELECT `id`,`login` FROM `users` WHERE `id` ='$uid'"));
	$category = $specs[$row['category']];
	
	echo '<li class="collection-item avatar works '.$row['category'].'">';
		echo '<img src="images/server-big.jpg" alt="" class="circle">';
		echo '<span class="title"><b>'.$row['title'].'</b></span>';
		echo '<p><b>Категория:</b> '.$category.'<br>';
		echo '<b>Бюджет:</b> '.$row['price'].' рублей <br>';
		echo '<b>Опубликовал:</b> '.$publisher['login'].', '; echo(dating($row['date']));echo'<br>';
		echo '<b>До:</b> '; echo(dating($row['till']));echo'<br>';
		if(array_search($row['category'],$categories)){echo '<a href="#!" onclick="working('.$row['id'].');" class="secondary-content"><i class="material-icons">Выполнить</i></a>';}
	echo '</li>';}
?>