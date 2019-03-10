<?php

require_once '../config/config.php';

$menu = [
    [
        'title' => 'Главная',
        'url' => '/',
    ],
    [
        'title' => 'Галлерея',
        'url' => '/gallery/gallery.php',
    ],
    [
        'title' => 'Новости',
        'url' => '/news.php',
    ],
    [
        'title' => 'Отзывы',
        'url' => '/reviews.php',
    ],
    [
        'title' => 'Товары',
        'url' => '/products/readProducts.php',
    ],
    [
        'title' => 'Контакты',
        'url' => '/contacts.php',
    ],
];

render_menu($menu, 'top_menu', 'top_menu_list', 'top_menu_link');

