<?php

require_once '../config/config.php';

echo '<pre>';
var_dump($_POST);
var_dump($_FILES); //тут хранится информация о загружаемых файлах
echo '</pre>';

//user_file - имя name заданное для input типа file
//Если $_FILES['user_file'] существует, и нет ошибок
if (!empty($_FILES['user_file']) && !$_FILES['user_file']['error']) {
    $file = $_FILES['user_file'];

    //выбираем деррикторию куда загружать изображение
    $upload_dir = WWW_DIR . '/uploads/';

    //выбираем конечное имя файла
    $upload_file = $upload_dir . basename($file['name']);

    //Пытаемся переместить файл из временного местонахождения в постоянное
    if (move_uploaded_file($file['tmp_name'], $upload_file)) {
        echo "Файл корректен и был успешно загружен.\n";
    } else {
        echo "Возможная атака с помощью файловой загрузки!\n";
    }
}
?>

<!-- показываю, что кнопка submit может так же передавать данные в POST|GET -->
<form action="" method="POST">
    <input type="submit" name="var1">
    <input type="submit" name="var2">
</form>

<!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так -->
<form enctype="multipart/form-data" action="" method="POST">
    <!-- Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла (в байтах) -->
    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000"/> -->
    <!-- Название элемента input определяет имя в массиве $_FILES -->
    Отправить этот файл: <input name="user_file" type="file"/>
    <input type="submit" value="Send File"/>
</form>