<?php
	session_start();
	include "connect.php";
	
	$role = (isset($_SESSION["role"])) ? $_SESSION["role"] : "guest";
	
	$id = (isset($_POST["id"])) ? $_POST["id"] : 0;

	
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<script src="scripts/filter.js"></script>
    <link rel="stylesheet" href="assets/css/styleS.css">
    
    <link rel="stylesheet" href="assets/css/pr.css">
</head>
<body>
<?php
$m = '';
	if(isset($_SESSION["role"])) {
		$m = '<li><a href="sub.php" class="underline-one"><img src="assets/img/Union.png" alt="">Cart</a></li>
        <li><a href="" class="underline-one"><img src="assets/img/mdi_movie-open-plus.png" alt="">Favourites</a></li>';
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
        <div class="lineproz2"></div>
        <h3>User</h3>
        <ul>
            <?= $m ?>  </ul>
        <div class="lineproz2"></div>
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

$con = new PDO("mysql:host=localhost;dbname=il","root","root");

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `products` WHERE name = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
<div class="content">
			
			<div class="head"><?php echo $row->name; ?></div>
			
			<div class="product wrap">
				<div class="image">
					<img src="<?php echo $row->path; ?>" alt=""><div class="r">
					<video class="vi" src="<?php echo $row->video; ?>" controls>		</video>
			</div>
				</div>
				
				<div class="text2">
					<h3>Описание:</h3><div class="lineproz2"></div>
					<p><b><?php echo $row->country; ?></b></p>
					<h3>Актеры:</h3><div class="lineproz2"></div>
					<p><b><?php echo $row->year; ?></b></p>
					
					</div>
					<?php
						if($role == "admin")
							echo '
								<div class="cart__mini">
									<p><a href="update.php?id='.$product["product_id"].'" class="text-small">Редактировать</a></p>
									<p><a onclick="return confirm(\'Вы действительно хотите удалить этот товар?\')" href="controllers/delete_product.php?id='.$product["product_id"].'" class="text-small">Удалить</a></p>
								</div>
							';

						if($role != "guest")
							echo '<p class="text-right"><a href="controllers/add_cart.php?id='. $product["product_id"] .'" class="text-small"><img src="assets/img/mdi_movie-open-plus.png" alt="">В избранное</a></p>';
					?>
				</div>
		</div>
	
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		} } ?>
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
