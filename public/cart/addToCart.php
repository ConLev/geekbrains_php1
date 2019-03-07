<?php

require_once __DIR__ . '/../../config/config.php';

$id = $_GET['id'] ?? '';
$name = $_GET['name'] ?? '';
$price = $_GET['price'] ?? '';
$quantity = $_GET['quantity'];
$image = $_GET['img'] ?? '';
$h1 = 'Добавить товар';

$showCartItem = showCartItem($id);

//если в корзине нет товара с полученным id
if ($showCartItem['id'] === NULL) {
//пытаемся добавить товар в корзину
    $result = addToCart($id, $name, $price, $image, $quantity);
    header("Location: /products/readProducts.php", TRUE, 301);
    //если товар уже есть, обновляем количество и общую стоимость
} else {
    $quantity = $showCartItem['quantity'];
    $subtotal = $showCartItem['subtotal'];
    updateCartItem($id, $quantity, $subtotal, $price);
    header("Location: /products/readProducts.php", TRUE, 301);
}