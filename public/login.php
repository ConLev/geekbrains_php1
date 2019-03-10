<?php

require_once '../config/config.php';

//echo '<pre>';
//var_dump($_SESSION);
//var_dump($_POST);
//echo '</pre>';

?>
<!--<form action="" method="POST">-->
<!--    <input name="password">-->
<!--    <input type="submit">-->
<!--</form>-->
<?php

//Вариант без AJAX
//Полуаем логин пароль
$login = $_POST['login'] ?? '';
$password = $_POST['password'] ?? '';
//var_dump(md5($password));
//die;

//Если логин и пароль переданы пытаемся авторизоваться
if ($login && $password) {
    //преобразуем пароль в хэш
    $password = md5($password);
    //получаем пользователя из базы
    $sql = "SELECT * FROM `users` WHERE `login` = '$login' AND `password` = '$password'";
    $user = show($sql);

    //если пользователь найден. Записываем его в сессию
    if ($user) {
        $_SESSION['login'] = $user;
    } else {
        echo 'Неверная пара логин-пароль';
    }
}

?>
<div class="container">
    <link rel="stylesheet" href="/style/style.css">
    <div class="login_message"></div>
    <div>
        <!--    Вариант с AJAX-->
        <label class="user_account_label">Логин:
            <input class="user_account_input" type="text" name="login"/>
        </label>
        <label class="user_account_label">Пароль:
            <input class="user_account_input" type="password" name="password"/>
        </label>
        <!-- При нажатии на кнопку вызвается JS функция login() -->
        <button class="user_account_submit" onclick="login()">Войти</button>
    </div>
</div>

<!--Вариант без AJAX-->
<!--<form action="" method="POST">-->
<!--    <p>Логин: <input type="text" name="login"/></p>-->
<!--    <p>Пароль: <input type="password" name="password"/></p>-->
<!--    <input type="submit">-->
<!--</form>-->

<!-- Подключение jQuery и нашего main.js -->
<script src="/js/jquery-3.3.1.min.js"></script>
<script src="/js/main.js"></script>