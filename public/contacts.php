<?php

require_once __DIR__ . '/../config/config.php';

$year = date("Y");
echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => 'Contacts',
    'h1' => 'Contacts',
    //'footer' => 'Все права защищены ' . date("Y"),
    'content' => render(TEMPLATES_DIR . 'contacts.tpl'),
    'year' => $year,
]);