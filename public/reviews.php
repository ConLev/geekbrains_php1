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
        <li class="top_menu_list"><a class="top_menu_link" href="/productsActions/readProducts.php">Товары</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/contacts.php">Контакты</a></li>
    </ul>
</nav>
<div class="container">
    <?php

    require_once '../config/config.php';

    //?? - заменяет isset($a) ? $a : '';
    $author = $_POST['author'] ?? '';
    $comment = $_POST['comment'] ?? '';
    ?>

    <h1>Отзывы</h1>
    <div class="feedback">
        <?php
        //если есть и автор и комментарий
        if ($author && $comment) {
            //пытаемся вставить отзыв
            $result = insertReview($author, $comment);

            //в случае успеха обнуляем $author и $comment
            if ($result) {
//            echo 'Отзыв добавлен';
                $author = '';
                $comment = '';
            } else {
                echo 'Произошла ошибка';
            }
        }

        //Получаем список отзывов
        $reviews = getReviews();
        //var_dump(isset($reviews['0']['approved']));

        //выводим отзывы на экран
        foreach ($reviews as $review) {
            //Добавил в базу: ALTER TABLE `reviews` ADD `approved` BOOLEAN NOT NULL AFTER `date`
            if ((array_key_exists('approved', $review))) {
                $class = ($review['approved']) ? 'approved' : 'not-approved';
            } else {
                $class = 'approved';
            }
            echo "<div class='$class'>";
            echo "<span class='comment_date'>{$review['date']}</span>";
            echo "<h3 class='comment_author'>{$review['author']}</h3>";
            echo "<p class='comment_text'>{$review['comment']}</p>";
            if ((array_key_exists('approved', $review))) {
                echo '<form action="" method="POST">';
                if (!($review['approved'])) {
                    echo "<button type='submit' name='approved' class='approve-btn' value='{$review['id']}'>Одобрить</button>";
                }
                echo "<button type='submit' name='del' class='remove-btn' value='{$review['id']}'>Удалить</button>";
                echo '</form>';
            }
            echo '</div>';
        }
        if (isset($_POST['approved'])) {
            $approved = (int)$_POST['approved'];
            $query = "UPDATE `reviews` SET `approved` = '1' WHERE `reviews`.`id` = $approved";
            execQuery($query);
            echo "<meta http-equiv='refresh' content='0'>";
        }
        if (isset($_POST['del'])) {
            $del = (int)$_POST['del'];
            $query = "DELETE FROM `reviews` WHERE `reviews`.`id` = $del";
            execQuery($query);
            echo "<meta http-equiv='refresh' content='0'>";
        }
        ?>
        <form action="" method="POST">
            <div>
                <!-- атрибут value позволяет выставить значение по умолчанию -->
                <label class="reviews_label">Имя:
                    <input class="input_author" type="text" name="author" value="<?= $author ?>" required>
                </label>
            </div>
            <div>
                <!-- для textarea значение по умолчанию выглядит так -->
                <label class="reviews_label">Комментарий:
                    <textarea class="input_text" name="comment" cols="30" rows="10" required><?= $comment ?></textarea>
                </label>
            </div>
            <div>
                <input class="reviews_submit" type="submit">
                <input class="reviews_reset" type="reset">
            </div>
        </form>
    </div>
</div>
<footer class="footer">Все права защищены <?= date('Y') ?></footer>
</body>
</html>