<?php
/*
Создал Stanisgrox (https://vk.com/psionicdog) для конкурса VK Tech, 28-08-2017.
Версия PHP: 7.0
VK AUTH: https://oauth.vk.com/authorize?client_id=6159077&redirect_uri=https://dev.orlandonetworks.ru/stanisgrox-vk-challenge/auth.php&response_type=token&scope=email&v=5.68
*/
require_once('scripts/config.php');
$db = mysqli_connect($db_host, $db_usr, $db_pass, $db_name);
if (!$db){exit ('Не удалось подключиться к базе данных, пожалуйста, проверьте конфигурационный файл.');}
mysqli_set_charset($db,'utf8');
if(!$_COOKIE['onpage']){setcookie('onpage',5,time()+60*60*24*100);}
$onpage = $_COOKIE['onpage'];
if(!is_int($onpage)){$onpage = 5;} //Защита от SQL инъекции через cookie
?>
<!DOCTYPE html>
<html>
	<head>
		<title>VK TECH CHALLENGE</title>
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link type="text/css" rel="stylesheet" href="style/materialize.min.css"  media="screen,projection"/>
		<link type="text/css" rel="stylesheet" href="style/spec_stl.css"  media="screen,projection"/>
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body>
		<header>
			<nav>
				<div class="nav-wrapper">
					<a href="#" class="brand-logo center">Job.Sys</a>
					<ul id="nav-mobile" class="left hide-on-med-and-down">
						<li><a href="#" data-activates="slide-out" id="mnu"><i class="material-icons">menu</i></a></li>
						<li><a href="#">О нас</a></li>
						<li><a href="#">Справка и поддержка</a></li>
					</ul>
				</div>
			</nav>
		</header>
		<main>
			<ul id="slide-out" class="side-nav">
				<li><div class="user-view">
					<div class="background"><img src="images/server-big.jpg"></div>
					<a href="#!user" id="usr-ava"><?php if($usr['avatar']){echo '';}?></a>
					<a href="#!name"><span class="white-text name" id="usr-login"><?php echo 'Анонимный пользователь';?></span></a>
					<a href="#!email"><span class="white-text email" id="usr-email"></span></a>
					</div>
				</li>
				<!--
				<li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
				<li><a href="#!">Second Link</a></li>
				<li><div class="divider"></div></li>
				<li><a class="subheader">Subheader</a></li>
				<li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
				-->
				<li><a href="#welc" class="blue-text modal-trigger">Вход или регистрация</a></li>
			</ul>
			<h4 class="center-align" id="cat">Новые проекты на сайте</h4>
			<div class="container" id="list">
				<ul class="collection">
					<?php
					
					$collection = mysqli_query($db,"SELECT * FROM `jobs` ORDER BY `id` ASC LIMIT ".$onpage);
					while($row = mysqli_fetch_assoc($collection)){
						$uid = $row['id'];
						$publisher = mysqli_fetch_assoc(mysqli_query($db,"SELECT `id`,`login` FROM `users` WHERE `id` ='$uid'"));
						echo '<li class="collection-item avatar">';
							echo '<img src="images/server-big.jpg" alt="" class="circle">';
							echo '<span class="title"><b>'.$row['title'].'</b></span>';
							echo '<p><b>Категория:</b> бытовая техника<br>';
							echo '<b>Бюджет:</b> '.$row['price'].' рублей <br>';
							echo '<b>Осталось времени:</b> 10 лет<br>';
							echo '<b>Опубликовал:</b> '.$publisher['login'].', 23 августа в 20:22<br>';
							echo '<b>Рейтинг:</b> <span class="green-text">+9001</span></p>';
							echo '<a href="#!" class="secondary-content"><i class="material-icons">grade</i></a>';
						echo '</li>';}
						?>
				</ul>
			</div>
			
			<span class="white-text">Количество элементов: 
			<a class="onpg" data-value="5">5</a>
			<a class="onpg" data-value="10">10</a> 
			<a class="onpg" data-value="30">30</a> 
			<a class="onpg" data-value="50">50</a></span>
			
			<ul class="pagination center-align">
				<li class="disabled"><a href="#!"><i class="material-icons">chevron_left</i></a></li>
				<li class="active"><a href="#!">1</a></li>
				<li class="waves-effect"><a href="#!">2</a></li>
				<li class="waves-effect"><a href="#!">3</a></li>
				<li class="waves-effect"><a href="#!">4</a></li>
				<li class="waves-effect"><a href="#!">5</a></li>
				<li class="waves-effect"><a href="#!"><i class="material-icons">chevron_right</i></a></li>
			</ul>
		</main>
		<footer class="page-footer">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Job.Sys для VK Tech</h5>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © 2017 Stanisgrox
            <a class="grey-text text-lighten-4 right" href="http://materializecss.com/">Styled with Materialize css</a>
            </div>
          </div>
        </footer>
		<!-- FAB -->
		<div class="fixed-action-btn toolbar">
			<a class="btn-floating btn-large"><i class="large material-icons">add</i></a>
			<ul>
				<li><a href="#">Фильтры</a></li>
				<li><a href="#">Разместить заказ</a></li>
			</ul>
		</div>
		<!-- END FAB -->
		<!-- MODAL -->
		<div id="welc" class="modal bottom-sheet">
			<?php include('fragments/default-modal.html'); ?>
		</div>
		<!-- END MODAL -->
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/materialize.min.js"></script>
<script id="ent-script">
//LOGIN CLIENT
$('#enter').on("click", function(){
	$.ajax({   
		type: 'POST',
		url: 'scripts/login.php',
		data: $('#login-form').serialize(),
		success: function (data){
			console.log(data);
			window.userdata = JSON.parse(data);
			document.getElementById('usr-login').innerHTML = window.userdata.login;
			document.getElementById('usr-email').innerHTML = window.userdata.email;
			document.getElementById('usr-ava').innerHTML = '<img class="circle" src="'+window.userdata.avatar+'">';
			document.getElementById('welc').innerHTML = '';
		}
	});
});
</script>
		<script>
			function defaultmodal(){$.get('fragments/default-modal.html',function(data){document.getElementById('welc').innerHTML = data;})}
			
			document.addEventListener('DOMContentLoaded', ready());
			function ready(){
				$("#mnu").sideNav();
				$('.modal').modal({opacity: .7});
				$('#welc').modal('open');
				$('#getreg').on("click",function(){
					$.get('fragments/reg.php','stage=1',function(data){$('#welc').html(data);$('#ent-script').html = '';});	
				});
			}
		</script>
	</body>
</html>