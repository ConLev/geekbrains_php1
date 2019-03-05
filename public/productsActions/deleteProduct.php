<?php

require_once '../../config/config.php';

$id = $_GET['id'] ?? '';

deleteProduct((int)$id);

header("Location: /productsActions/readProducts.php", TRUE, 301);