<div class="modal-content">
	<h4 class="center-align">Шаг 2: Введите Ваши данные</h4>
	<p class="center-align">Введите данные Вашей учетной записи.</p>
	<div class="row">
		<form class="col s12 l6 offset-l3" id="register">
			<div class="input-field">
				<input id="login" name="login" type="text" class="validate" required>
				<label for="login">Логин</label>
			</div>
			<div class="input-field">
				<input id="email" name="email" type="text" class="validate" required>
				<label for="email">Email</label>
			</div>
			<div class="input-field">
				<input id="password" name="password" type="password" class="validate" required>
				<label for="password">Пароль</label>
			</div>
			<div class="input-field">
				<input id="password-rept" type="password" class="validate" data-error="Пароли не совпадают">
				<label for="password-rept">Повторите пароль</label>
			</div>
			<div class="input-field">
				<input id="name" name="name" type="text" class="validate" required>
				<label for="name">Ваше имя</label>
			</div>
			<div class="input-field">
				<input id="surname" name="surname" type="text" class="validate" required>
				<label for="surname">Ваша фамилия</label>
			</div>
			<div class="input-field">
				<select multiple name="spec[]">
					<option value="" disabled selected>Вы заказчик или специалист?</option>
					<option value="1000">Я - заказчик</option>
					<?php include('../scripts/config.php');
					foreach ($specs as $key => $value){
						echo '<option value="'.$key.'">'.$value.'</option>';
					}	
					?>
				</select>
				<label>Ваша специализация</label>
			</div>
		<form>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat" onclick="modalchange('default');">Отмена</a>
		<a href="#!" class="modal-action waves-effect waves-green btn-flat" onclick="proceed();">Завершить регистрацию</a>
	</div>
</div>
<script>
function pass_compare(){
	var pass = $('#password').val();
	var compare = $('#password-rept').val();
	if (pass == compare) {
		window.comparedpass = true
		$('#password').addClass('valid');
		$('#password-rept').addClass('valid');
		}
	else {
		window.comparedpass = false;
		$('#password').addClass('invalid');
		$('#password-rept').addClass('invalid');}	
}
function proceed () {
	$.ajax({   
	type: 'POST',   
	url: 'scripts/reg_handler.php',   
	data: $('#register').serialize(),
	success: function (data){
		if(data == 99){$('#login').addClass('invalid');	$('#email').addClass('invalid');}
		if(data == 5){$('#email').addClass('invalid');}
		console.log(data);
	}
	}); 
}
$(document).ready(function() {
	$('select').material_select();
	$('#password').on('keyup paste change', pass_compare());
	$('#password-rept').on('keyup paste change', pass_compare());
});
</script>