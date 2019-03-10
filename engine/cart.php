<?php

/**
 * Функция получения всех товаров в корзине
 * @return array
 */
function getCart()
{
    $sql = "SELECT * FROM `cart`";

    return getAssocResult($sql);
}

/**
 * Функция генерации блока корзины
 * @return string
 */
function showCart()
{
    //инициализируем результирующую строку
    $result = '';
    //получаем все товары в корзине
    $products = getCart();

    //для каждого товара
    foreach ($products as $product) {
        $result .= render(TEMPLATES_DIR . 'cartItems.tpl', $product);
    }
    return $result;
}

/**
 * Функция получает один товар из корзины по его id
 * @param int $id
 * @return array|null
 */
function showCartItem($id)
{
    //для безопасности приводим id к числу
    $id = (int)$id;

    $sql = "SELECT * FROM `cart` WHERE `id` = $id";

    return show($sql);
}

/**
 * Функция обновления количества и суммарной стоимости товара в корзине
 * @param int $id
 * @param $quantity
 * @param $price
 * @return bool|mysqli_result
 */
function updateCartItem($id, $quantity, $price)
{
    //для безопасности приводим id к числу
    $id = (int)$id;

    //Создаем подключение к БД
    $db = createConnection();

    $subtotal = $price * $quantity;

    $sql = "UPDATE `cart` SET `quantity` = '$quantity', `subtotal` = '$subtotal' WHERE `cart`.`id` = $id";

    //Выполняем запрос
    return execQuery($sql, $db);
}

/**
 * Функция добавления товара в корзину
 * @param $id
 * @param $name
 * @param $price
 * @param $image
 * @param $quantity
 * @return bool
 */
function addToCart($id, $name, $price, $image, $quantity)
{
    //Создаем подключение к БД
    $db = createConnection();
    //Избавляемся от всех инъекций
    $id = escapeString($db, $id);
    $name = escapeString($db, $name);
    $price = escapeString($db, $price);
    $quantity = escapeString($db, $quantity);
    $image = escapeString($db, $image);

    //Генерируем SQL запрос на добавляение в БД
    $sql = "INSERT INTO `cart` (`id`, `name`, `price`, `image`, `quantity`, `subtotal`) VALUES ('$id', '$name', '$price', 
'$image', '$quantity', '$price')";

    //Выполняем запрос
    return execQuery($sql, $db);
}

/**
 * Функция удаления товара из корзины
 * @param $id
 * @return bool
 */
function removeFromCart($id)
{
    //Создаем подключение к БД
    $db = createConnection();
    //Избавляемся от всех инъекций
    $id = escapeString($db, $id);

    //Генерируем SQL запрос на удаление товара из БД
    $sql = "DELETE FROM `cart` WHERE `cart`.`id` = $id";

    //Выполняем запрос
    return execQuery($sql, $db);
}

/**
 * Функция очистки корзины
 * @return bool
 */
function clearCart()
{
    //Создаем подключение к БД
    $db = createConnection();

    //Генерируем SQL запрос на очистку корзины
    $sql = "TRUNCATE TABLE `cart`";

    //Выполняем запрос
    return execQuery($sql, $db);
}