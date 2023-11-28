<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/stylelogreg.css">
</head>
<body>

<?php
session_start();
include "connect.php";
$sql = "SELECT * FROM `products` WHERE `count` > 0 ORDER BY `created_at` DESC LIMIT 5";
if(!$result = $connect->query($sql))
    return die ("Ошибка получения данных: ". $connect->error);
	include "header.php";
?>
<?php
$m = '';
	if(isset($_SESSION["role"])) {
		$m = '<li><a href="sub.php" class="underline-one"><img src="assets/img/Union.png" alt="">Cart</a></li>
        <li><a href="" class="underline-one"><img src="assets/img/mdi_movie-open-plus.png" alt="">Favourites</a></li>';
		$m .= ($_SESSION["role"] == "admin") ? '<li><a href="admin.php" class="underline-one">Orders</a></li>' : '';
	} else
		$m = '
        <li><a href="logreg.php" class="underline-one"><img src="assets/img/mdi_account.png" alt="">Account</a></li>
        <li><a href="" class="underline-one"><img src="assets/img/mdi_movie-open-plus.png" alt="">Favourites</a></li>
		';

	$m = sprintf($m);
?>
 <!--Начало меню-->

 <div class="category-wrap">
        <div class="logo"><img src="assets/img/logo.png" alt=""></div>
        <h3>Menu</h3>
        <ul>
            <li><a href="index.php" class="underline-one"><img src="assets/img/Vector.png" alt="">Home</a></li>
            <li><a href="catalog.php" class="underline-one"><img src="assets/img/material-symbols_filter-list.png" alt="">Categories</a></li>
            <li><a href="sub.php" class="underline-one"><img src="assets/img/dashicons_awards.png" alt="">Subscription</a></li>
            <li><a href="" class="underline-one"><img src="assets/img/solar_graph-down-new-broken.png" alt="">History</a></li>
        </ul>
        <div class="lineproz"></div>
        <h3>User</h3>
        <ul>
            <?= $m ?>  </ul>
        <div class="lineproz"></div>
        <h3>General</h3>
        <ul>
            <li><a href="" class="underline-one"><img src="assets/img/streamline_interface-setting-cog-work-loading-cog-gear-settings-machine.png" alt="">Setting</a></li>
            <li><a href="controllers/logout.php" class="underline-one"><img src="assets/img/iconoir_log-out.png" alt="">Log out</a></li>
        </ul>
    </div>


    <!--Конец меню-->

    <main>
        <div class="kategor">
            <div class="container__kat">
            <a href="mov.php" class="m">Movies</a>
						<a href="sir.php" class="b">Series</a>
						<a href="mult.php" class="b">Animations</a> </div>
            <form class="op" method="post" action="search.php">
<input class="ser" type="text" name="search" placeholder="                 Search...">
<input class="lup" type="submit" name="submit">
</form>
            <img src="assets/img/Ellipse 2.png" alt="" class="lich">
        </div>
<div class="forr">
    <div class="vmm">
        <div class="head" id="register">log in</div>
        <form action="controllers/register.php" method="POST">
            <input  type="text" placeholder="Имя" name="name" pattern="[а-яА-ЯёЁ\s\-]+" required><div class="lineproz2"></div>
            <input type="text" placeholder="Фамилия" name="surname" pattern="[а-яА-ЯёЁ\s\-]+" required><div class="lineproz2"></div>
            <input type="text" placeholder="Отчество" name="patronymic" pattern="[а-яА-ЯёЁ\s\-]+"><div class="lineproz2"></div>
            <input type="text" placeholder="Логин" name="login" pattern="[a-zA-Z0-9\-]+" required><div class="lineproz2"></div>
            <input type="email" placeholder="Email" name="email" required><div class="lineproz2"></div>
            <input type="password" placeholder="Пароль" name="password" pattern=".{6,}" required><div class="lineproz2"></div>
            <input type="password" placeholder="Повтор пароля" name="password_repeat" required><div class="lineproz2"></div>
            <div class="part">
                <input type="checkbox" name="rules" required>
                <p>Согласие с правилами регистрации</p>
            </div>
            <button class="forrr">Зарегистрироваться</button>
        </form>
</div>
<div class="vmm">
        <div class="head" id="login">sign in</div>
        <form action="controllers/login.php" method="POST">
            <input type="text" placeholder="Логин" name="login" required><div class="lineproz2"></div>
            <input type="password" placeholder="Пароль" name="password" required><div class="lineproz2"></div>
            <button class="forrr">Войти</button>
        </form></div>
</div>
  <!--Начало футера-->
  <footer>
            <div class="container__footer">
                <div class="logo"><img src="assets/img/logo-1.png" alt=""></div>
                <div class="punkt">
                    <div class="p">
                        <a href="" class="m">Movies</a>
                        <a href="" class="b">Series</a>
                        <a href="" class="b">Animations</a>
                    </div>
                    <div class="p">
                        <a href="" class="h">Home</a>
                        <a href="" class="b">Subscription</a>
                        <a href="" class="b">Account</a>
                    </div>
                </div>
                <div class="icons">
                    <img src="assets/img/telegram.png" alt="">
                    <img src="assets/img/discord.png" alt="">
                    <img src="assets/img/vk.png" alt=""></div>
            </div>
        </footer>
        <!--конец футера-->
    </main>

</body>

</html>