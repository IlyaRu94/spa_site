<html>
<body>
<head>
<title>SPA-салон "Блаженство"</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="style.css" type="text/css" rel="stylesheet">

</head>

<header>
<?
include 'auth.php';
$users=getUsersList();//запрос всех пользователей
if(($users[$_SESSION['login']]['birtday']===(string)date("n").'-'.date("j")) or ($_SESSION['time'])){//проверка, есть ли скидка, если есть - показываем блок
?>
	<div class="topright">
<?if($users[$_SESSION['login']]['birtday']===(string)date("n").'-'.date("j")){//проверяем, есть ли у пользователя день рождения, если есть - показываем блок, скидка на день рождения больше, поэтому не показываем временную скидку
?>

<h2><span style="color:red">С днем рождения!</span><br>При заказе назовите промокод <span style="color:red">DR</span> и ловите <span style="color:red">скидку 15%!</span></h2>
<script>
// Добавляем в счетчик дату рождения, данная скидка действует до следующего дня
const deadline = new Date("<?=date('Y').'-'.$users[$_SESSION['login']]['birtday'].' 23:59:59';?>");
</script>
<?}else{?>
<h2><span style="color:red">Персональная скидка 5%</span> по промокоду <span style="color:red">24</span><br>Не забудьте промокод назвать при оформлении заказа</h2>
<script>
// Добавляем в счетчик 24 часа на временную скидку
const deadline = new Date("<?=$_SESSION['time']?>");
</script>
<?}?>
<script src="script.js"></script>
<div class="timer">
  <div class="timer__items">
    <div class="timer__item timer__days">00</div>дн.
    <div class="timer__item timer__hours">00</div>час.
    <div class="timer__item timer__minutes">00</div>мин.
    <div class="timer__item timer__seconds">00</div>
  </div>
</div>
</div>
<?}?>
<div class="topright" style="bottom:10px; top:auto;">
Акция дня:<br>SPA для двоих со скидкой <span style="color:red">10%</span>
</div>

<h1 class="head">
    SPA-салон "Блаженство"
</h1>


<?php
//пост данные для выхода, при выходе уничтожаем сессию
if ($_POST['exit']==='true'){session_destroy();header('location: index.php');}
//если пользователь не вошел - отображаем кнопку входа, если вошел - отображаем имя и кнопку выхода
if(!getCurrentUser()){?>
<a href="login.php" class="exit">войти</a>
<?}else{?>
    <div class="user">Привет, <?=getCurrentUser();?></div><form class="exit" method="post" action="index.php"><button type="submit" name="exit" value="true">выйти</button></form>
<?}?>

</header>

<div class="mid_flex">
<main>
<article>
    <div class="item" style="top: 5px; left: 5px; width: 227.5px; height: 227.5px;">
		<div class="item_info">
			<a class="front_cont" style="background-image:url(images/37_image_small.jpeg);">
				<div class="front_name">
					<div class="text"><span>SPA-обертывание</span>
                        <div class="texthide">Anti-Age: <br>80 мин. - 3800 руб<br>SLIM-ананас и водоросли: <br>80 мин. - 3300 руб.<br>SLIM-Медовое обертывание: <br>80 мин. - 2300 руб.</div>
                    </div>
				</div>
			</a>
		</div>
	</div>
	<div class="item" style="top: 5px; left: 242.5px; width: 465px; height: 465px;">
		<div class="item_info">
			<a class="front_cont" style="background-image:url(images/46_image_small.jpeg);">
				<div class="front_name">
					<div class="text"><span>SPA-программы в хаммаме</span>
                        <div class="texthide">«Очищение»: 70 мин. — 2400 руб<br>«Нежный хлопок»: 120 мин. — 3750 руб<br>«Время для себя»: 180 мин. — 6900 руб<br>«Секрет женщины»: 150 мин. — 6250 руб<br>«Сочное манго»: 120 мин. — 4100 руб</div>
                    </div>
				</div>
			</a>
		</div>
	</div>
	<div class="item" style="top: 480px; left: 5px; width: 465px; height: 465px;">
		<div class="item_info">
			<a class="front_cont" style="background-image:url(images/47_image_small.jpeg);">
				<div class="front_name">
					<div class="text"><span>SPA-программы без хаммама</span>
                        <div class="texthide">«Пробуждение»: 120 минут - 4100 руб.<br>«Идеальное тело»: 90 мин. - 2300 руб.<br>«Секрет мужчины»: 90 мин. - 3200 руб.</div>
                    </div>
				</div>
			</a>
		</div>
	</div>
	<div class="item" style="top: 480px; left: 480px; width: 465px; height: 465px;">
		<div class="item_info">
			<a class="front_cont" style="background-image:url(images/48_image_small.jpeg);">
				<div class="front_name">
					<div class="text"><span>SPA-массаж лица</span>
                        <div class="texthide">Косметический массаж лица: 25 мин. - 1000 руб<br>Альгинатная маска по типу кожи: 15 мин. - 800 руб.<br>Уход для лица LA PEAULIE: 20 мин. - 1300 руб.</div>
                    </div>
				</div>
			</a>
		</div>
	</div>
	<div class="item" style="top: 955px; left: 5px; width: 465px; height: 227.5px;">
		<div class="item_info">
			<a class="front_cont" style="background-image:url(images/15_image_small.jpeg);">
				<div class="front_name">
					<div class="text"><span>SPA для двоих</span>
                        <div class="texthide">«Кокосовое наслаждение»: 120 мин. - 8900 руб.<br>«Сладкая жизнь»: 120 мин. — 9900 руб.<br>«Горячее сердце»: 90 минут - 8000 руб.</div>
                    </div>
				</div>
			</a>
		</div>
	</div>
	<div class="item" style="top: 955px; left: 480px; width: 465px; height: 227.5px;">
		<div class="item_info">
			<a class="front_cont" style="background-image:url(images/17_image_small.jpeg);">
				<div class="front_name">
					<div class="text"><span>SPA-девичник</span>
                        <div class="texthide">«Черный бархат»: 120 мин. 3 человека - 8500 руб.<br>«Безупречный вкус»: 150 мин. 3 человека - 10500 руб.<br>«Сказочное чувство»: 180 мин. 3 человека - 13000 руб</div>  
                    </div>
				</div>
			</a>
		</div>
	</div>
	<div class="item" style="top: 5px; left: 717.5px; width: 227.5px; height: 227.5px;">
		<div class="item_info">
			<a class="front_cont" style="background-image:url(images/19_image_small.jpeg);">
				<div class="front_name">
					<div class="text"><span>SPA-массаж</span>
                        <div class="texthide">Ароматический массаж: <br>60 мин. - 1590 руб<br>Lomi-Lomi: <br>80 мин. - 2000 руб<br>Стоун-терапия: <br>80 мин. - 2000 руб</div>
                    </div>
				</div>
			</a>
		</div>
	</div>
	<div class="item" style="top: 242.5px; left: 5px; width: 227.5px; height: 227.5px;">
		<div class="item_info">
			<a class="front_cont" style="background-image:url(images/42_image_small.jpeg);">
				<div class="front_name">
					<div class="text"><span>Дополнительные услуги в SPA</span>
                        <div class="texthide">Спа-массаж: <br>30 мин. - 700 руб<br>Массаж головы: <br>15 мин. - 590 руб<br>Молочная купель: <br>20 мин. - 900 руб</div>
                    </div>
				</div>
			</a>
		</div>
	</div>
	<div class="item" style="top: 242.5px; left: 717.5px; width: 227.5px; height: 227.5px;">
		<div class="item_info">
			<a class="front_cont" style="background-image:url(images/33_image_small.jpeg);">
				<div class="front_name">
					<div class="text"><span>SPA-меню</span>
                        <div class="texthide">Составьте свою индивидуальную программу релакса:<br>от 3600 руб. за 90 мин</div>
                    </div>
				</div>
			</a>
		</div>
	</div>
</article>
</main>
</div>
<footer>
    <div class="left">График работы:<br>ПН-ПТ 8:00 - 18:00</div>
    <div class="center">Телефон для записи:<br>8-999-999-99-99</div>
    <div class="right">Наш адрес:<br>г.Судогда</div>
</footer>

</body>
</html>
