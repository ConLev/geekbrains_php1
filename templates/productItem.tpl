<section class="item-product">
    <a href="/product.php?id={{ID}}" class="product">
        <img class="product-img" src="{{IMAGE}}" alt="product_img">
        <div class="product-text">
            <h5 class="product-name">{{NAME}}</h5>
            <span class="product-price">$ {{PRICE}}</span>
            <span class="product-comment">☆☆☆☆☆</span>
        </div>
    </a>
    <div class="item-add_top">
        <a class="item-add_link_top" href="#" data-id="{{ID}}" data-img="{{IMAGE}}" data-name="{{NAME}}"
           data-rating="☆☆☆☆☆" data-color="red" data-size="XXL" data-shipping="FREE" data-price="{{PRICE}}">Add to Cart</a>
    </div>
    <div class="item-add_bottom">
        <a href="/productsActions/createProduct.php?id={{ID}}" class="item-add_link_bottom">Create</a>
        <a href="/productsActions/updateProduct.php?id={{ID}}" class="item-add_link_bottom">Update</a>
        <a href="/productsActions/deleteProduct.php?id={{ID}}" class="item-add_link_bottom">Delete</a>
    </div>
</section>