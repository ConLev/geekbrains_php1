<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>reviews</title>
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>
<nav class="nav">
    <ul class="top_menu">
        <li class="top_menu_list"><a class="top_menu_link" href="/">Главная</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/gallery.php">Галлерея</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/news.php">Новости</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/reviews.php">Отзывы</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/readProducts.php">Товары</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/contacts.php">Контакты</a></li>
    </ul>
</nav>
<div class="container">
    <?php

    require_once '../../config/config.php';

    //?? - заменяет isset($a) ? $a : '';
    $id = $_GET['id'] ?? '';

    //пытаемся удалить товар
    $result = deleteProduct((int)$id);

    //выводим сообщение
    if ($result) {
        echo 'Товар удален';

    } else {
        echo 'Произошла ошибка';
    }

    ?>

<!--    <form action="" method="POST">-->
<!--        <div>-->
<!--            <label class="product_label">product_ID:-->
<!--                <input class="product_id" type="text" name="id" placeholder="ID">-->
<!--            </label>-->
<!--        </div>-->
<!--        <div>-->
<!--            <input class="delete_submit" type="submit">-->
<!--        </div>-->
<!--    </form>-->
</div>
<footer class="footer">Все права защищены <?= date('Y') ?></footer>
</body>
</html>