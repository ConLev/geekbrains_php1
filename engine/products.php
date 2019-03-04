<?php

/**
 * Функция получения всех товаров
 * @return array
 */
function getProducts()
{
    $sql = "SELECT * FROM `products`";

    return getAssocResult($sql);
}

/**
 * Функция получает один товар по его id
 * @param int $id
 * @return array|null
 */
function getProduct($id)
{
    //для безопасности приводим id к числу
    $id = (int)$id;

    $sql = "SELECT * FROM `products` WHERE `id` = $id";

    return show($sql);
}

/**
 * Функция генерации блока товаров
 * @return string
 */
function showProducts()
{
    //инициализируем результирующую строку
    $result = '';
    //получаем все товары
    $products = getProducts();

    //для каждого товара
    foreach ($products as $product) {
        $result .= render(TEMPLATES_DIR . 'productItem.tpl', $product);
    }
    return $result;
}

/**
 * @param int $id
 * @param $file
 * @return string
 */
function showProduct($id, $file)
{
    //для безопасности приводим id к числу
    //получаем товар
    $product = getProduct((int)$id);

    //если продукт не найден выводим 404
    if (!$product) {
        return '404';
    }

    //возвращаем render шаблона товара
    return render($file, $product);
}

/**
 * Добавить товар
 * @param $name
 * @param $description
 * @param $price
 * @param $image
 * @return bool
 */
function createProduct($name, $description, $price, $image)
{
    //Создаем подключение к БД
    $db = createConnection();
    //Избавляемся от всех инъекций
    $name = escapeString($db, $name);
    $description = escapeString($db, $description);
    $price = escapeString($db, $price);
    $image = escapeString($db, $image);

    //Генерируем SQL запрос на добавляение в БД
    $sql = "INSERT INTO `products` (`name`, `description`, `price`, `image`) VALUES ('$name', '$description', '$price', 
'$image')";

    //Выполняем запрос
    return execQuery($sql, $db);
}

/**
 * Обновить товар
 * @param $id
 * @param $name
 * @param $description
 * @param $price
 * @param $image
 * @return bool
 */
function updateProduct($id, $name, $description, $price, $image)
{
    //Создаем подключение к БД
    $db = createConnection();
    //Избавляемся от всех инъекций
    $name = escapeString($db, $name);
    $description = escapeString($db, $description);
    $price = escapeString($db, $price);
    $image = escapeString($db, $image);

    //Генерируем SQL запрос на обновление товара в БД
    $sql = "UPDATE `products` SET `name` = '$name', `description` = '$description', `price` = '$price', 
`image` = '$image' WHERE `products`.`id` = $id";


    //Выполняем запрос
    return execQuery($sql, $db);
}

/**
 * Удалить товар
 * @param $id
 * @return bool
 */
function deleteProduct($id)
{
    //Создаем подключение к БД
    $db = createConnection();
    //Избавляемся от всех инъекций
    //$id = escapeString($db, $id);

    //Генерируем SQL запрос на удаление товара из БД
    $sql = "DELETE FROM `products` WHERE `products`.`id` = '$id'";

    //Выполняем запрос
    return execQuery($sql, $db);
}