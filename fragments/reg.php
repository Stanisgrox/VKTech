<?php
if($_GET['stage']==1){echo '
	<div class="modal-content">
		<h4 class="center-align">Шаг 1: выберите способ регистрации</h4>
		<p class="center-align">Вы можете зарегистрироваться в нашей системе или использовать аккаунт социальной сети "ВКонтакте".</p>
		<div class="row">
			<div class="col s4 offset-s3">
				<a href="#" id="goreg">Зарегистрироваться</a>
			</div>
			<div class="col s4">
				<a href="#" id="govkreg">Войти через ВКонтакте</a>
			</div>
		</div>
		<div class="modal-footer">
			<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Отмена</a>
		</div>
	</div>
	<script>
	$("#goreg").on("click",function(){$.get("fragments/reg.php","stage=2",function(data){$("#welc").html(data)});})
	$("#govkreg").on("click",function(){$.get("fragments/reg.php","stage=vk",function(data){$("#welc").html(data)});})
	</script>';
	exit;}
if($_GET['stage']==2){include('2.php');exit;}
if($_GET['stage']=='vk'){include('vk.html');exit;}
?>

