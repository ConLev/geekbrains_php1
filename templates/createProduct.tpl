<form action="" method="POST">
    <div>
        <!-- атрибут value позволяет выставить значение по умолчанию -->
        <label class="product_label">product_name:
            <input class="product_name" type="text" name="name">
        </label>
    </div>
    <div>
        <label class="product_label">product_price:
            <input class="product_price" type="text" name="price">
        </label>
    </div>
    <div>
        <label class="product_label">product_image:
            <input class="product_img" type="text" name="image">
        </label>
    </div>
    <div>
        <!-- для textarea значение по умолчанию выглядит так -->
        <label class="product_label">product_description:
            <textarea class="product_description" name="description" cols="100" rows="30"></textarea>
        </label>
    </div>
    <div>
        <input class="update_submit" type="submit">
    </div>
</form>

<!-- Тип кодирования данных, enctype, ДОЛЖЕН БЫТЬ указан ИМЕННО так
<form enctype="multipart/form-data" action="__URL__" method="POST">
    Поле MAX_FILE_SIZE должно быть указано до поля загрузки файла (в байтах)
    <input type="hidden" name="MAX_FILE_SIZE" value="30000"/>
    Название элемента input определяет имя в массиве $_FILES
    Отправить этот файл: <input name="user_file" type="file"/>
    <input type="submit" value="Send File"/>
</form> -->