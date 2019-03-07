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
        <li class="top_menu_list"><a class="top_menu_link" href="/">Главная</a></li>
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
    <div class="shopping-cart_wrapper">
        <div class="products-box-header">
            <span>Product Details</span>
            <span class="unite-price-header">unite Price</span>
            <span class="quantity-header">Quantity</span>
            <span class="shipping-header">shipping</span>
            <span class="subtotal-header">Subtotal</span>
            <span class="action-header">ACTION</span>
        </div>
        <div class="products-box">{{CONTENT}}</div>
        <div class="shopping-cart-button">
            <a href="/cart/clearCart.php" class="shopping-cart-button_clear">CLEAR SHOPPING CART</a>
            <a href="/products/readProducts.php" class="shopping-cart-button_continue">CONTINUE SHOPPING</a>
        </div>
    </div>
</div>
<footer class="footer">Все права защищены {{YEAR}}</footer>
</body>
</html>