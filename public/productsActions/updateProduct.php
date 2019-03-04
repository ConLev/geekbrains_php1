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

echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => 'update_product',
    'h1' => "Товар $id",
    'content' => showProduct($id, TEMPLATES_DIR . 'updateProduct.tpl'),
    'year' => date('Y'),
]);