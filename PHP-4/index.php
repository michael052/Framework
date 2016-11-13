<!DOCTYPE html>
<html>
	<head>
	<META charset="UTF-8">
		<title>Главная страница</title>
		<Link rel="stylesheet" type="text/css" href="style.css">
		<link href="https://fonts.googleapis.com/css?family=Jura " rel="stylesheet">
	</head>
	<body>
	<form method="post">
	<div class="head">
	<p><b><br>Введите адрес страницы</b></p>
	<input type="text" class="url" size="75" name="url"/>
	<p><b>Выберите параметр для поиска автомобиля:</b>
		<select name="_sel1"><option></option>
			<option value="1">Название автомобиля</option>
			<option value="2">Цена</option>
			<option value="3">Год выпуска</option>
			<option value="4">Тип привода</option>
			<option value="5">Литраж двигателя</option>
		</select>
		<br><br>
		<input type="submit" class="sea" value="Поиск"/>
		<br><br>
		<Div class="Block_Body">
			<?php require('poisk.php'); ?>
		</Div>
		<br><br>
		<Div class="Clear"></Div>
	</Div>
		</form>
	</body>
</html>