<div class="modal-content">
	<h4 class="center-align">Разместить заказ</h4>
	<p class="center-align">Вы можете разместить заказ, чтобы исполнитель с сайта выполнил его. Будьте аккуратны при заполнении всех полей.</p>
		<div class="row">
			<form class="col s12 m6 l4 offset-m3 offset-l4">			
				<div class="input-field">
					<input id="oname" name="oname" type="text" class="validate" required>
					<label for="oname">Название</label>
				</div>
				<div class="input-field">
					<input id="price" name="price" type="text" pattern="[0-9]{,6}" data-wrong="Только цифры, максимально: 6 цифр" class="validate">
					<label for="price">Цена</label>
				</div>
				<div class="input-field">
					<input name="todate" type="text" class="datepicker">
				</div>
				<div class="input-field">
					<input name="totime" type="text" class="timepicker" onclick="fx();">
				</div>
				<div class="input-field">
					<select name="category">
						<option value="" disabled selected>Выберите одну категорию</option>
						<?php include('../scripts/config.php');
						foreach ($specs as $key => $value){
							echo '<option value="'.$key.'">'.$value.'</option>';
						}	
						?>
					</select>
					<label>Категория</label>
				</div>
			</form>
		</div>
		<p class="center-align">Внимание! Система Job.Sys берет комиссию в размере 5% от сделки.</p>
	<div class="modal-footer">
		<a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Отмена</a>
		<a href="#!" id="enter" class="modal-action modal-close waves-effect waves-green btn-flat">Разместить заказ</a>
	</div>
</div>