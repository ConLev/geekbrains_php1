<?php

require_once '../../config/config.php';

$id = $_GET['id'] ?? '';

deleteProduct((int)$id);

header("Location: /products/readProducts.php", TRUE, 301);