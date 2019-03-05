<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>lesson_6</title>
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>
<nav class="nav">
    <ul class="top_menu">
        <li class="top_menu_list"><a class="top_menu_link" href="/">Главная</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/gallery.php">Галлерея</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/news.php">Новости</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/reviews.php">Отзывы</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/productsActions/readProducts.php">Товары</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/contacts.php">Контакты</a></li>
    </ul>
</nav>
<div class="container">
    <?php

    require_once '../config/config.php';

    $arg1 = $_POST['arg1'] ?? '';
    $arg2 = $_POST['arg2'] ?? '';
    $operation = $_POST['operation'] ?? '';

    $result = mathOperation((float)$arg1, (float)$arg2, $operation);

    if (isset($result)) {
        $arg1 = '';
        $arg2 = '';
        $operation = '';
    }
    ?>
    <h1>lesson_6</h1>
    <h4>Калькулятор</h4>
    <div class="content"><span style="color: red; font-size: 18px"><?= $result ?></span>
        <br><br>
        <form style="display: flex" action="" method="POST">
            <div style="padding-right: 5px">
                <label class="text">a:
                    <input type="text" name="arg1" value="<?= $arg1 ?>">
                </label>
            </div>
            <label style="padding-right: 5px">
                <select name="operation">
                    <option selected value="Выберите операцию">Выберите операцию</option>
                    <option value="+">Сложение</option>
                    <option value="-">Вычитание</option>
                    <option value="*">Умножение</option>
                    <option value="/">Деление</option>
                </select>
            </label>
            <div>
                <label class="text">b:
                    <input type="text" name="arg2" value="<?= $arg2 ?>">
                </label>
            </div>
            <div>
                <input style="margin-left: 5px" type="submit" value="=">
            </div>
        </form>
        <form style="padding-top: 50px" action="" method="POST">
            <div>
                <label class="text">a:
                    <input type="text" name="arg1" value="<?= $arg1 ?>">
                </label>
            </div>
            <div style="padding: 5px 0">
                <label class="text">b:
                    <input type="text" name="arg2" value="<?= $arg2 ?>">
                </label>
            </div>
            <div>
                <input type="submit" name="operation" value="+">
                <input type="submit" name="operation" value="-">
                <input type="submit" name="operation" value="*">
                <input type="submit" name="operation" value="/">
            </div>
        </form>
    </div>
</div>
<footer class="footer">Все права защищены <?= date('Y') ?></footer>
</body>
</html>