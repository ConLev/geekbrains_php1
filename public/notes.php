<?php

//Обработка метода addToCart
if ($_POST['apiMethod'] === 'addToCart') {
    $id = $_POST['postData']['id'] ?? 0;
    if (!$id) {
        error('ID не передан');
    }

    //Получаем данные корзины
    $cart = $_COOKIE['cart'] ?? [];

    //если в корзине товара еще нет, то получаем 0
    $count = $cart[$id] ?? 0;
    //увеличиваем количество в корзине
    $count++;

    //устанавливаем новое куки
    setcookie("cart[$id]", $count);
    success();
}

//Обработка метода removeFromCart
if ($_POST['apiMethod'] === 'removeFromCart') {
    $id = $_POST['postData']['id'] ?? 0;
    if (!$id) {
        error('ID не передан');
    }

    //удаляем товар из корзины
    setcookie("cart[$id]", null);
    success();
}

error('Неизвестный метод');

?>

    <script>
        function addToCart(id) {
            $.post({
                url: '/api.php',
                data: {
                    apiMethod: 'addToCart',
                    postData: {
                        id: id
                    }
                },
                success: function (data) {
                    if (data === 'OK') {
                        alert('Товар добавлен в корзину');
                    } else {
                        alert(data);
                    }
                }
            })
        }

        function removeFromCart(id) {
            $.post({
                url: '/api.php',
                data: {
                    apiMethod: 'removeFromCart',
                    postData: {
                        id: id
                    }
                },
                success: function (data) {
                    if (data === 'OK') {
                        $('[data-id="' + id + '"]').remove();
                    } else {
                        alert(data);
                    }
                }
            })
        }
    </script>

<?php

require_once __DIR__ . '/../config/config.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;

if (!$id) {
    echo 'id не передан';
    exit();
}

//обезопашиваемся от инъекций
$id = (int)$id;


//если передан параметр addToCart то добавляем этот товар в корзину
if (!empty($_GET['addToCart'])) {
    $cart = $_COOKIE['cart'] ?? [];

    setcookie("cart[$id]", ($cart[$id] ?? 0) + 1);
    echo 'Товар добавлен в корзину';
}


echo render(TEMPLATES_DIR . 'index.tpl', [
    'title' => 'Geek Brains Site',
    'h1' => "Товар $id",
    'content' => showProduct($id)
]);