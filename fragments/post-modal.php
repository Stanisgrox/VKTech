<div class="modal-content">
	<h4 class="center-align">Разместить заказ</h4>
	<p class="center-align">Вы можете разместить заказ, чтобы исполнитель с сайта выполнил его. Будьте аккуратны при заполнении всех полей.</p>
		<div class="row">
			<form class="col s12 m6 l4 offset-m3 offset-l4" id="anket">			
				<div class="input-field">
					<input id="oname" name="oname" type="text" class="validate" required>
					<label for="oname">Название</label>
				</div>
				<div class="input-field">
					<input id="price" name="price" type="text" data-wrong="Только цифры, максимально: 6 цифр" class="validate">
					<label for="price">Цена</label>
				</div>
				<p class="center-align">С вашего счета будет снято <span id="thisprice"></span> рублей.</p>
				<p class="center-align red-text">Пример формата даты и времени: 2017-01-28 18:50.</p>
				<div class="input-field">
					<input name="todate" id="todate" type="text" pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])">
					<label for="todate">До даты</label>
				</div>
				<div class="input-field">
					<input name="totime" id="totime" type="text" class="datepicker" pattern="(0[0-9]|1[0-9]|2[0-3])(:[0-5][0-9])">
					<label for="totime">До (время)</label>
				</div>
				<label>Категория</label>
				<select class="browser-default" name="category">
					<option value="" disabled selected>Выберите одну категорию</option>
					<?php include('../scripts/config.php');
						foreach ($specs as $key => $value){
							echo '<option value="'.$key.'">'.$value.'</option>';
						}	
						?>
				</select>

			</form>
		</div>
		<p class="center-align">Внимание! Система Job.Sys берет комиссию в размере 5% от сделки.</p>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Отмена</a>
		<a href="#!" onclick="readyorder()" class="modal-action modal-close waves-effect waves-green btn-flat">Разместить заказ</a>
	</div>
</div>
