<?php

require_once __DIR__ . '/../../config/config.php';

echo render(TEMPLATES_DIR . 'cart.tpl', [
    'title' => 'cart',
    'h1' => 'Корзина',
    'create_order' => empty($_SESSION['login'])
        ? '<a href="/" class="shopping-cart-button_button_createOrder">Log in</a>'
        : '<a href="#" class="shopping-cart-button_button_createOrder">Create order</a>',
    'content' => showCart(),
    'year' => date('Y'),
]);