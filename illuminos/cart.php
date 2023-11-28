<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php
session_start();
include "connect.php";
$sql = "SELECT * FROM `products` WHERE `count` > 0 ORDER BY `created_at` DESC LIMIT 5";
if(!$result = $connect->query($sql))
    return die ("Ошибка получения данных: ". $connect->error);

?>
<?php
$m = '';
	if(isset($_SESSION["role"])) {
		$m = '<li><a href="sub.php" class="underline-one"><img src="assets/img/Union.png" alt="">Cart</a></li>
        <li><a href="cart.php" class="underline-one"><img src="assets/img/mdi_movie-open-plus.png" alt="">Favourites</a></li>';
		$m .= ($_SESSION["role"] == "admin") ? '<li><a href="admin.php" class="underline-one">Orders</a></li>' : '';
	} else
		$m = '
        <li><a href="logreg.php" class="underline-one"><img src="assets/img/mdi_account.png" alt="">Account</a></li>
        <li><a href="cart.php" class="underline-one"><img src="assets/img/mdi_movie-open-plus.png" alt="">Favourites</a></li>
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
						<a href="mult.php" class="b">Animations</a>  </div>
			<form class="op" method="post" action="search.php">
<input class="ser" type="text" name="search" placeholder="                 Search...">
<input class="lup" type="submit" name="submit">
</form>
            <img src="assets/img/Ellipse 2.png" alt="" class="lich">
        </div>
<?php
	include "controllers/check.php";
	include "connect.php";

	$sql = sprintf("SELECT `order_id`, `product_id`, `orders`.`count`, `name`, `price`, `path` FROM `orders` INNER JOIN `products` USING(`product_id`) WHERE `user_id`='%s'", $_SESSION["user_id"]);
	$result = $connect->query($sql);

	$products = "";
	while($row = $result->fetch_assoc())
		$products .= sprintf('
			<div class="col">
				<img src="%s" alt="">
				<div class="row">
					<h3><a href="product.php?id=%s">%s</a></h3>
					
				</div>
				<div class="row">
					<p><a href="controllers/delete_cart.php?id=%s">Убрать</a></p>
				</div>
			</div>
		', $row["path"], $row["product_id"], $row["name"], $row["price"], $row["product_id"], $row["count"], $row["product_id"]);

	if($products == "")
		$products = '<h3 class="text-center">избранных нет</h3>';

	$sql = sprintf("SELECT * FROM `orders` WHERE `user_id`='%s' AND `number` IS NOT NULL AND `product_id`=0 ORDER BY `created_at` DESC", $_SESSION["user_id"]);
	$result = $connect->query($sql);

	$orders = "";
	while($row = $result->fetch_assoc()) {
		$del = ($row["status"] == "Новый") ? '<p class="text-right"><a onclick="return confirm(\'Вы действительно хотите удалить этот заказ?\')" href="controllers/delete_order.php?id='.$row["order_id"].'" class="text-small">Удалить заказ</a></p>' : '';
		$orders .= sprintf('
			<div class="col">
				<div class="row">
					<h2>Заказ %s</h2>
					%s
				</div>
				<div class="row">
					<p>Статус: <b>%s</b></p>
					<p>Количество товаров: <b>%s</b></p>
				</div>
			</div>
		', $row["number"], $del, $row["status"], $row["count"]);
	}

	if($orders == "")
		$orders = '<h3 class="text-center">Список заказов пуст</h3>';

	include "header.php";
?>

	<main>
		<div class="content">

			<div class="head">Ваши избранные</div>
			<div class="row">
				<?= $products ?>
</div>

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
	
</div>