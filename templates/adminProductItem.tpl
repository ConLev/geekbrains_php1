<section class="item-product">
    <a href="/product.php?id={{ID}}" class="product">
        <img class="product-img" src="/{{IMAGE}}" alt="product_img">
        <div class="product-text">
            <h5 class="product-name">{{NAME}}</h5>
            <span class="product-price">$ {{PRICE}}</span>
            <span class="product-comment">☆☆☆☆☆</span>
        </div>
    </a>
    <div class="item-add_top">
        <a href="#" class="item-add_link_top" data-id="{{ID}}">Add to Cart</a>
    </div>
    <div class="item-add_bottom">
        <a href="/products/createProduct.php" class="item-add_link_bottom">Create</a>
        <a href="/products/updateProduct.php?id={{ID}}" class="item-add_link_bottom">Update</a>
        <a href="/products/deleteProduct.php?id={{ID}}" class="item-add_link_bottom">Delete</a>
    </div>
</section>