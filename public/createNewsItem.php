<?php

require_once '../config/config.php';

echo '<pre>';
var_dump($_POST);
echo '</pre>';

//?? - заменяет isset($a) ? $a : '';
$title = $_POST['title'] ?? '';
$content = $_POST['content'] ?? '';

//если получены и $title и $content
if ($title && $content) {
    //пытаемся вставить новую новость
    $result = insertItem($title, $content);
    //если новость добавлена обнуляем $title и $content
    if ($result) {
        echo 'Статья добавлена';
        $title = '';
        $content = '';
    } else {
        echo 'Произошла ошибка';
    }
}

//если есть контент, но нет заголовка
if ($content && !$title) {
    echo 'Введите заголовок<br>';
}

//если есть заголовок, но нет контента
if ($title && !$content) {
    echo 'Введите контент<br>';
}
?>

<hr>
<form action="" method="POST">
    <div>
        <!-- атрибут value позволяет выставить значение по умолчанию -->
        <label>Title:
            <input type="text" name="title" value="<?= $title ?>">
        </label>
    </div>
    <div>
        <!-- для textarea значение по умолчанию выглядит так -->
        <label>Content:
            <textarea name="content" cols="30" rows="10"><?= $content ?></textarea>
        </label>
    </div>
    <div>
        <input type="submit">
    </div>
</form>