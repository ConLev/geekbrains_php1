<?php

require_once __DIR__ . '/../../config/config.php';

//echo '<pre>';
//var_dump($_GET);
//die;
//echo '</pre>';

$current_id = isset($_GET['id']) ? $_GET['id'] : false;

if (!$current_id) {
    echo 'id не передан';
    exit();
}

$new_id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';
$image = $_POST['image'] ?? '';
$h1 = 'Обновить товар';

if ($new_id && $name && $description && $price && $image) {
    $result = updateProduct($current_id, $new_id, $name, $description, $price, $image);
//при успешном обновлении возвращаемся на страницу просмотра товаров
    if ($result) {
        header("Location: /productsActions/readProducts.php", TRUE, 301);
        //очишаем кеш (id)
        header("Cache-Control: no-cache");
    } else {
        $h1 = "Товар с ID = $new_id уже существует";
    }
}

echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => 'update_product',
    'h1' => "$h1",
    'content' => showProduct($current_id, TEMPLATES_DIR . 'updateProduct.tpl'),
    'year' => date('Y'),
]);