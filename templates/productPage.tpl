<div>
	<a href="updateProduct.php?id={{ID}}">Редактировать</a>
	<a href="deleteProduct.php?id={{ID}}">Удалить</a>

	<a class="btn" onclick="addToCart({{ID}})">Купить</a>
</div>
<hr>
<div>
	Название: {{NAME}}
</div>
<div>
	Описание: {{DESCRIPTION}}
</div>
<div>
	Цена: {{PRICE}}
</div>
<div>
	Изображение:
	<img src="/{{IMAGE}}" alt="image-{{ID}}" style="max-width: 300px; max-height: 300px"/>
</div>