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

    //    echo '<pre>';
    //    var_dump($_POST);
    //    echo '</pre>';

    //?? - заменяет isset($a) ? $a : '';
    $name = $_POST['name'] ?? '';
    $description = $_POST['description'] ?? '';
    $price = $_POST['price'] ?? '';
    $image = $_POST['image'] ?? '';

    if ($name && $description && $price && $image) {
//пытаемся добавить товар
        $result = createProduct($name, $description, $price, $image);
//        var_dump($result);

//в случае успеха обнуляем поля ввода
        if ($result) {
            echo 'Товар добавлен';
            $name = '';
            $description = '';
            $price = '';
            $image = '';
        } else {
            echo 'Произошла ошибка';
        }
    }

    $products = getProducts();
    echo '<div class="box-product">';
    //выводим отзывы на экран
    foreach ($products as $product) {
        echo "<section class='item-product'>";
        echo "<a href='#' class='product'>";
        echo "<img src=../{$product['image']} class='product-img' alt='product_img'>";
        echo "<div class='product-text'>";
        echo "<h5 class='product-name'>{$product['name']}</h5>";
        echo "<span class='product-price'>$ {$product['price']}</span>";
        echo "<span class='product-comment'>☆☆☆☆☆</span>";
        echo '</div>';
        echo '</a>';
        echo '</section>';
    }
    echo '</div>';
    ?>
    <form action="" method="POST">
        <div>
            <!-- атрибут value позволяет выставить значение по умолчанию -->
            <label class="product_label">product_name:
                <input class="product_name" type="text" name="name">
            </label>
        </div>
        <div>
            <label class="product_label">product_price:
                <input class="product_price" type="text" name="price">
            </label>
        </div>
        <div>
            <label class="product_label">product_image:
                <input class="product_img" type="text" name="image">
            </label>
        </div>
        <div>
            <!-- для textarea значение по умолчанию выглядит так -->
            <label class="product_label">product_description:
                <textarea class="product_description" name="description" cols="100" rows="30"></textarea>
            </label>
        </div>
        <div>
            <input class="update_submit" type="submit">
        </div>
    </form>
</div>
<footer class="footer">Все права защищены <?= date('Y') ?></footer>
</body>
</html>