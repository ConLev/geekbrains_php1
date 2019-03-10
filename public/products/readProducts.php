<?php

require_once __DIR__ . '/../../config/config.php';

$file = ($_SESSION['login']['admin']) ? TEMPLATES_DIR . 'adminProductItem.tpl' :
    TEMPLATES_DIR . 'userProductItem.tpl';

echo render(TEMPLATES_DIR . 'products.tpl', [
    'title' => 'products',
    'content' => showProducts($file),
    'year' => date('Y'),
]);