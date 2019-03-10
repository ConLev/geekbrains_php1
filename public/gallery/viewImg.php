<?php

require_once __DIR__ . '/../../config/config.php';

if (!isset($_GET['id'])) {
    echo 'id not found';
    exit();
}

$id = $_GET['id'];
$img = view_img($id, TEMPLATES_DIR . 'img.tpl');

echo render(TEMPLATES_DIR . 'viewImg.tpl', [
    'title' => 'Галерея',
    'content' => $img,
]);