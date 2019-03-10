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
 * @param $file
 * @return string
 */
function showProducts($file)
{
    //инициализируем результирующую строку
    $result = '';
    //получаем все товары
    $products = getProducts();

    //для каждого товара
    foreach ($products as $product) {
        $result .= render($file, $product);
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

    if (!$product) {
        return '404';
    }

    //возвращаем render шаблона товара
    return render($file, $product);
}

/**
 * Функция добавления товара
 * @param $id
 * @param $name
 * @param $description
 * @param $price
 * @param $image
 * @return bool
 */
function createProduct($id, $name, $description, $price, $image)
{
    //Создаем подключение к БД
    $db = createConnection();
    //Избавляемся от всех инъекций
    $id = escapeString($db, $id);
    $name = escapeString($db, $name);
    $description = escapeString($db, $description);
    $price = escapeString($db, $price);
    $image = escapeString($db, $image);

    //Генерируем SQL запрос на добавляение в БД
    $sql = "INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`) VALUES ('$id', '$name', 
'$description', '$price', '$image')";

    //Выполняем запрос
    return execQuery($sql, $db);
}

/**
 * Функция обновления товара
 * @param $current_id
 * @param $new_id
 * @param $name
 * @param $description
 * @param $price
 * @param $image
 * @return bool
 */
function updateProduct($current_id, $new_id, $name, $description, $price, $image)
{
    //Создаем подключение к БД
    $db = createConnection();
    //Избавляемся от всех инъекций
    $current_id = escapeString($db, $current_id);
    $new_id = escapeString($db, $new_id);
    $name = escapeString($db, $name);
    $description = escapeString($db, $description);
    $price = escapeString($db, $price);
    $image = escapeString($db, $image);

    //Генерируем SQL запрос на обновление товара в БД
    $sql = "UPDATE `products` SET `id` = '$new_id', `name` = '$name', `description` = '$description', `price` = '$price', 
`image` = '$image' WHERE `products`.`id` = '$current_id'";

    //Выполняем запрос
    return execQuery($sql, $db);
}

/**
 * Функция удаления товара
 * @param $id
 * @return bool
 */
function deleteProduct($id)
{
    //Создаем подключение к БД
    $db = createConnection();
    //Избавляемся от всех инъекций
    $id = escapeString($db, $id);

    //Генерируем SQL запрос на удаление товара из БД
    $sql = "DELETE FROM `products` WHERE `products`.`id` = '$id'";

    //Выполняем запрос
    return execQuery($sql, $db);
}
function generateMyOrdersPage()
{
	//получаем id пользователя и и получаем все заказы пользователя
	$user_id = $_SESSION['login']['id'];
	$orders = getAssocResult("SELECT * FROM `orders` WHERE `user_id` = $user_id");

	$result = '';
	foreach ($orders as $order) {
		$order_id = $order['id'];

		//получаем продукты, которые есть в заказе
		$products = getAssocResult("
			SELECT * FROM `orders_products` as op
			JOIN `products` as p ON `p`.`id` = `op`.`product_id`
			WHERE `op`.`order_id` = $order_id
		");

		$content = '';
		$orderSum = 0;
		//генерируем элементы таблицы товаров в заказе
		foreach ($products as $product) {
			$count = $product['amount'];
			$price = $product['price'];
			$productSum = $count * $price;
			$content .= render(TEMPLATES_DIR . 'orderTableRow.tpl', [
				'name' => $product['name'],
				'id' => $product['id'],
				'count' => $count,
				'price' => $price,
				'sum' => $productSum
			]);
			$orderSum += $productSum;
		}

		$statuses = [
			0 => 'Заказ оформлен',
			1 => 'Заказ собирается',
			2 => 'Заказ готов',
			3 => 'Заказ завершен',
			4 => 'Заказ отменен',
		];

		//генерируем полную таблицу заказа
		$result .= render(TEMPLATES_DIR . 'orderTable.tpl', [
			'id' => $order_id,
			'content' => $content,
			'sum' => $orderSum,
			'status' => $statuses[$order['status']]
		]);
	}
	return $result;
}