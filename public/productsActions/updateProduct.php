<?php

require_once __DIR__ . '/../../config/config.php';

//echo '<pre>';
//var_dump($_GET);
//echo '</pre>';

$id = isset($_GET['id']) ? $_GET['id'] : false;

if (!$id) {
    echo 'id не передан';
    exit();
}

//?? - заменяет isset($a) ? $a : '';
$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? '';
$price = $_POST['price'] ?? '';
$image = $_POST['image'] ?? '';

if ($name && $description && $price && $image) {
//пытаемся обновить товар
    $result = updateProduct($id, $name, $description, $price, $image);
//        var_dump($result);

//в случае успеха обнуляем поля ввода
    if ($result) {
        echo 'Товар обновлен';
        $name = '';
        $description = '';
        $price = '';
        $image = '';
    } else {
        echo 'Произошла ошибка';
    }
}

echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => 'update_product',
    'h1' => "Товар $id",
    'content' => showProduct($id, TEMPLATES_DIR . 'updateProduct.tpl'),
    'year' => date('Y'),
]);