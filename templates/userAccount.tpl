<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{TITLE}}</title>
    <link rel="stylesheet" href="/style/style.css">
</head>
<body>
<nav class="nav">
    <ul class="top_menu">
        <li class="top_menu_list"><a class="top_menu_link" href="/userAccount.php">Личный кабинет</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/gallery/gallery.php">Галлерея</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/news.php">Новости</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/reviews.php">Отзывы</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/products/readProducts.php">Товары</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/cart/viewCart.php">Корзина</a></li>
        <li class="top_menu_list"><a class="top_menu_link" href="/contacts.php">Контакты</a></li>
    </ul>
</nav>
<div class="container">
    <h1>{{H1}}</h1>
    <div class="user_account_box">
        <span class="text">Здравствуйте, </span><span class="user_account_text">{{NAME}}</span>
    </div>
    <div class="user_account_box">
        <span class="text">Ваш логин: </span><span class="user_account_text">{{LOGIN}}</span>
    </div>
</div>
<footer class="footer">Все права защищены {{YEAR}}</footer>
</body>
</html>