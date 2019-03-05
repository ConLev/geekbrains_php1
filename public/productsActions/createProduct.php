<?php

require_once __DIR__ . '/../../config/config.php';

//echo '<pre>';
//var_dump($_POST);
//die;
//echo '</pre>';

//?? - заменяет isset($a) ? $a : '';
$id = $_POST['id'] ?? '';
$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';
$image = $_POST['image'] ?? '';
$h1 = 'Добавить товар';

if ($id && $name && $description && $price && $image) {
//пытаемся добавить товар
    $result = createProduct($id, $name, $description, $price, $image);
//при успешном добавлении товара возвращаемся на страницу просмотра товаров
    if ($result) {
        header("Location: /productsActions/readProducts.php", TRUE, 301);
    } else {
        $h1 = "Товар с ID = $id уже существует";
    }
}

echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => 'create_product',
    'h1' => "$h1",
    'content' => render(TEMPLATES_DIR . 'createProduct.tpl'),
    'year' => date('Y'),
]);