<?php
require_once 'session_start.php';

$product = $_GET['product'];
if (!empty($product)) {
    $_SESSION['cart'][$product] += 1;
}

header('Location: cart.php');
