<!DOCTYPE html>
<html>
	<head>
	<META charset="UTF-8">
		<title>Главная страница</title>
		<Link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>
	<div class="head">
		<div class="logo">
			<img src="image/1.png">
			<div class="word">
			Security <br><span>instal corp.</span>
			</div>
		</div>
		<div class="avtor">
		<form method="post">
				
<?php
	function lines($file) 
	{ 
		if(!file_exists($file))exit("Файл не найден"); 
		$file_arr = file($file); 
		$lines = count($file_arr); 
		return $lines; 
	} 
	if( isset($_POST['v_login']) && 
	isset($_POST['v_password'])) 
	{ 
		$file = 'Regr.txt'; 
		$tmpp = false; 
		$tmp = file_get_contents($file, true); 
		$line = explode("\n", $tmp); 
		$index = lines($file); 
		for($i = 0; $i < $index; $i++) 
		{ 
			$cell = explode("|", $line[$i]); 
			if(@$cell[3] == $_POST['v_login'] && @$cell[5] == $_POST['v_password']) 
			{ 
				$tmpp = true; 
				break; 
			} 
			else 
			{ 
				$tmpp = false; 
			} 
		} 
		if($tmpp == true) 
		{ 
			$cell = explode("|", $line[$i]);
			echo "Вы успешно авторизовались,"; 
			echo $cell[1]."!!!";
		} 
		else 
		{ 
			echo "Не верный логин или пароль!";
			echo '<p><br><b>Имя пользователя</b><br>
			<input type="text" maxlength="15" size="30" name="v_login"/></p>
			<p><b>Пароль</b><br>
			<input type="password" maxlength="15" size="30" name="v_password"/></p> <br>
			<input type="submit" class="b1" value="Вход"/>
			<a href="index2.php">Регистрация</a>
			</form>';
		} 
	} 
	else 
	{ 
		echo '<p><br><b>Имя пользователя</b><br>
		<input type="text" maxlength="15" size="30" name="v_login"/></p>
		<p><b>Пароль</b><br>
		<input type="password" maxlength="15" size="30" name="v_password"/></p> <br>
		<input type="submit" class="b1" value="Вход"/>
		<a href="index2.php">Регистрация</a>
		</form>';
	} 
?>
		</div>
	</div>
	<div class="vs">	
		<div class="menu">
			<ul id="bar">
			<a href="index.php"><li>Главная страница</li></a>
			<a href="index.php"><li>Первая страница</li></a>
			<a href="index.php"><li>Вторая страница</li></a>
			<a href="index.php"><li>Третья страница</li></a>
			<a href="index.php"><li>Страница четыре</li></a>
			<a href="index.php"><li>Пятая страница</li></a>
			<div class="oglavl"> О<br> С<br>Н<br>О<br>В<br>Н<br>Ы<br>Е<br><br>Р<br>А<br>З<br>Д<br>Е<br>Л<br>Ы<br></div>
			</ul>
		</div>
		<div class="menu2">
			<ul id="bar2">
				<a href="index.php"><li>Контакты</li></a>
				<a href="index.php"><li>Вакансии</li></a>
				<a href="index.php"><li>Схема проезда</li></a>
				<a href="index.php"><li>Мы в соц.сетях</li></a>
				<a href="index.php"><li>Наши партнеры</li></a>
				<div class="oglav2"> М<br> Е<br>Н<br>Ю<br><br>C<br>Т<br>Р<br>А<br>Н<br>И<br>Ц<br>Ы<br></div>
			</ul>
		</div>
		<div class="kons">
		<ul id="bar3">
		<a><li>Здесь будет находится консультант</li></a>
			<div class="oglav3"> К<br> О<br>Н<br>С<br>У<br>Л<br>Ь<br>Т<br>А<br>Н<br>Т<br></div>
		</ul>
		</div>
	</div>
	
		<div class="kontent2">
			<?php
				if(isset($_POST['_famil'])&&
				isset($_POST['_name'])&&
				isset($_POST['_otch'])&&
				isset($_POST['_login'])&&
				isset($_POST['_email'])&&
				isset($_POST['_password'])&&
				isset($_POST['_sel1'])&&
				isset($_POST['_sel2'])&&
				isset($_POST['_check']))
				{
					if(!preg_match('/^[A-Za-zА-Яа-я]{3,16}+$/iu', $_POST['_famil'])) $famil_err = 'Не верный формат ввода фамилии';
					if(!preg_match('/^[A-Za-zА-Яа-я]{3,16}+$/iu', $_POST['_name'])) $name_err = 'Не верный формат ввода имени';
					if(!preg_match('/^[A-Za-zА-Яа-я]{3,16}+$/iu', $_POST['_otch'])) $otch_err = 'Не верный формат ввода отчества';
					if(!preg_match('/^[A-Za-z0-9_.-]+$/i', $_POST['_login'])) $login_err = 'Не верный формат ввода логина';
					if(!preg_match('/^[A-Za-z0-9-_.]+@[A-Za-z]{2,10}+\.[a-zA-Z_.]{2,6}+$/i', $_POST['_email'])) $email_err = 'Не верный формат ввода email';
					if(!preg_match('/^[A-Za-z0-9]{8,20}+$/i', $_POST['_password'])) $pass_err = 'Не верный формат ввода пароля';
					else
					{
						$ErrorLog = 0;	
						$file='Regr.txt';
						$str=$_POST['_famil']."|".$_POST['_name']."|".$_POST['_otch']."|".$_POST['_login']."|".$_POST['_email']."|".$_POST['_password']."|".$_POST['_sel1']."|".$_POST['_sel2'];
						if(!$file)
						{
							echo('Файл не открыт');
						}
						else
						{
							if(filter_var($_POST['_email'], FILTER_VALIDATE_EMAIL))
							{
								$tmp = file_get_contents($file, true);
								$line = explode("\n", $tmp);
								$index = lines($file);
								for($i = 0; $i < $index; $i++)
								{
									$cell = explode("|", $line[$i]);
									if(@$cell[2] == $_POST['_login'])
									{
										$ErrorLog = $ErrorLog + 1;
									}
									
								}
								if($ErrorLog > 0)
								{
									echo "Данный логин уже используется!";
								}
								else
								{
									file_put_contents($file, $str."\n", FILE_APPEND);
								}
							}
						}
					}
				}
			?>
			<form method="post">
				<div class="regr"> <br> 
				<span><p>*-обязательные к заполнению поля <br> Длинна пароля составляет МИНИМУМ 8 знаков</p></span>
				<br><p><b>Фамилия *:</b>
				<input type="text" maxlength="20" required class="reg" size="50" name="_famil" value="<?php if(isset ($_POST['_famil'])) echo $_POST['_famil']?>"/></p>
				<div class="error"><?php if(isset($famil_err)) echo $famil_err;?></div><br>
				<p><b>Имя *:</b>
				<input type="text" maxlength="20" required class="reg" size="50" name="_name" value="<?php if(isset ($_POST['_name'])) echo $_POST['_name']?>"/></p>
				<div class="error"><?php if(isset($name_err)) echo $name_err;?></div><br>
				<p><b>Отчество*:</b>
				<input type="text" maxlength="20" required class="reg" size="50" name="_otch" value="<?php if(isset ($_POST['_otch'])) echo $_POST['_otch']?>"/></p>
				<div class="error"><?php if(isset($otch_err)) echo $otch_err;?></div><br>
				<p><b>Логин *:</b>
				<input type="text" maxlength="20" required class="reg" size="50" name="_login" value="<?php if(isset ($_POST['_login'])) echo $_POST['_login']?>"/></p>
				<div class="error"><?php if(isset($login_err)) echo $login_err;?></div><br>
				<p><b>E-mail *:</b>
				<input type="email" maxlength="20" required class="reg" size="50" name="_email" value="<?php if(isset ($_POST['_email'])) echo $_POST['_email']?>"/></p>
				<div class="error"><?php if(isset($email_err)) echo $email_err;?></div><br>
				<p><b>Пароль *:</b>
				<input type="password" maxlength="20" required class="reg" size="50" name="_password" /></p>
				<div class="error"><?php if(isset($pass_err)) echo $pass_err;?></div><br>
				<p><b>Повторите пароль *:</b>
				<input type="password" maxlength="20" required class="reg" size="50" name="_password2" /></p><br>
					<?php
						
						if(isset($_POST['_password']) && isset($_POST['_password2']))
						{
							$password = $_POST['_password'];
							$password2 = $_POST['_password2'];
							if($password==$password2) echo '<div class="1"></div>';
							else
							{
								echo '<div class="a2">Пароли не совпадают</div>';
							}
						}
					?>	
				<p><b>Выберите пол:*</b>
					<select required name="_sel1"><option></option>
						<option value="Мужской">Мужской</option>
						<option value="Женский">Женский</option>
						<option value="Не определился(-лась)">Не определился(-лась)</option>
					</select>
					<br>
					<br>
				</p>
				<p><b>Тип предприятия:*</b>
					<span><select required name="_sel2"><option></option>
						<option value="Государственное предприятие">Государственное предприятие</option>
						<option value="Индивидуальное предприятие">Индивидуальное предприятие</option>
						<option value="Не определился(-лась)">Не определился(-лась)</option>
					</select></span>
					<br><br>
				<p><b>Лицензионное соглашение *:</b>
					<p><textarea rows="6" cols="70" name="text" disabled>Условия таковы. Если вы у нас что то покупаете, то это не значит что оно будет работать. Если оно не будет работать, то вы, в праве, пойти туда, откуда вас достали много лет назад. Предприятие не несет ответственности за все, что здесь произойдет. Если вдруг вам нравится наш сайт и вы находите его интересным, то вы долбанутый человек. Всего хорошего. Во славу ВДВ!</textarea>
					<br><br>
					<div class="flag"><input type="checkbox" required name="_check" value="<?php if(isset ($_POST['_check'])) echo $_POST['_check']?>">  Я принимаю данное соглашение</p><br></input></div>
				</div>
				<br><br>
				<br>
				<input type="submit" class="b2" value="Регистрация"/>
				<input type="reset" class="b2" value="Очистка"/><br><br><br>
			</form>
		</div>
		<div class="clr"></div>
		<div class="footer">
		Security instal corporation<span>2016</span> </div>
	</div>
	</body>
</html>