<?php

require_once __DIR__ . '/../config/config.php';

$userName = $_SESSION['login']['name'];
$userLogin = $_SESSION['login']['login'];

if (isset($userLogin) && isset($userName)) {
    echo render(TEMPLATES_DIR . 'userAccount.tpl', [
        'title' => 'user account',
        'h1' => 'Личный кабинет',
        'name' => "$userName",
        'login' => "$userLogin",
        'year' => date('Y'),
    ]);
} else {
    header("Location: /", TRUE, 301);
}