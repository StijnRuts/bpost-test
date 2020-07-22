<?php
session_start();

$product = $_GET['product'];
if (!empty($product)) {
    $_SESSION['cart'][$product] += 1;
}

header('Location: cart.php');
