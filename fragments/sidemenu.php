<?php 
include('../scripts/config.php');
$db = mysqli_connect($db_host, $db_usr, $db_pass, $db_name);
if (!$db){exit ();}
$login = mysqli_real_escape_string($db,$_GET['login']);
$usr = mysqli_fetch_assoc(mysqli_query($db,"SELECT `balance` FROM `users` WHERE `login`='$login'"));
?>
<li><a href="#">Платежные данные</a></li>
<li><a href="#">Редактировать проифль</a></li>
<li><div class="divider"></div></li>
<li><a href="#">История сделок</a></li>
<li><div class="divider"></div></li>
<li><a href="#" id="refresh">Баланс: <?php echo $usr['balance']?> рублей</a></li>
<li><a href="#" id="addmoney">Пополнить баланс</a></li>
<li><a href="#" id="takemoney">Получить деньги</a></li>
<li><div class="divider"></div></li>
<li><a href="#" id="exit">Выход</a></li>
