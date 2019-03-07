<?php

require_once '../../config/config.php';

$id = $_GET['id'] ?? '';

removeFromCart((int)$id);

header("Location: /cart/viewCart.php", TRUE, 301);