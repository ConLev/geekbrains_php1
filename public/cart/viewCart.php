<?php

require_once __DIR__ . '/../../config/config.php';

echo render(TEMPLATES_DIR . 'cart.tpl', [
    'title' => 'cart',
    'h1' => 'Корзина',
    'content' => showCart(),
    'year' => date('Y'),
]);