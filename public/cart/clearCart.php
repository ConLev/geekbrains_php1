<?php

require_once '../../config/config.php';

clearCart();

header("Location: /cart/viewCart.php", TRUE, 301);