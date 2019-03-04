<?php

require_once __DIR__ . '/../config/config.php';

echo render(TEMPLATES_DIR . 'products.tpl', [
    'title' => 'products',
    'content' => showProducts(),
    'year' => date('Y'),
]);