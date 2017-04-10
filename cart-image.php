<?
	$items_in_cart = count($_SESSION['cart']);
?>

<li class="cart"><a href="shopping-cart.php"><img src="images/cart<?= $items_in_cart ?>.png"></a></li>