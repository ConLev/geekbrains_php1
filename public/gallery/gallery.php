<?php

require_once __DIR__ . '/../../config/config.php';

$sql = "SELECT * FROM `images` ORDER BY `images`.`views` DESC";
$images = getAssocResult($sql);
$gallery = renderImg(TEMPLATES_DIR . 'galleryItem.tpl', $images);
$year = date("Y");

echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => 'Gallery',
    'h1' => 'Gallery',
    'content' => $gallery,
    'year' => $year,
]);