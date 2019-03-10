<?php
require_once '../../engine/functions.php';
$title = 'lesson_4';
$header = 'lesson_4';
$year = date("Y");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= "$title" ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1 class="header"><?= "$header" ?></h1>
<div class="container">
    <div class="content">
        <?php
        echo '<p class="task">1. Создать галерею фотографий.<br> Она должна состоять из одной страницы, на которой 
пользователь видит все картинки в уменьшенном виде.<br> 
При клике на фотографию она должна открыться в браузере в новой вкладке. <br>Размер картинок можно ограничивать с помощью 
свойства width.</p><br>';

        $img = [
            '1.jpg',
            '2.jpg',
            '3.jpg',
            '4.jpg',
            '5.jpg',
            '6.jpg',
            '7.jpg',
            '8.jpg',
        ];

        render_img($img);

        echo '<br><p class="task"> 2. *Строить фотогалерею, не указывая статичные ссылки к файлам, 
а просто передавая в функцию построения адрес папки с изображениями.<br> 
Функция сама должна считать список файлов и построить фотогалерею со ссылками в ней.</p><br>';

        render_img_v2('../img', 'other');

        echo '<br><p class="task">3. *[ для тех, кто изучал JS-1 ]<br> 
При клике по миниатюре нужно показывать полноразмерное изображение в модальном окне<br>
(материал в помощь: 
<a href="http://dontforget.pro/javascript/prostoe-modalnoe-okno-na-jquery-i-css-bez-plaginov/" target="_blank">
модальное окно</a></p><br>';

        render_img_v2('../img', 'img_max');
        echo '<div class="modal_form">';
        echo '<span class="modal_close">X</span>';
        echo '</div>';
        echo '<div class="overlay"></div>';

        ?>
    </div>
    <div class="clr"></div>
</div>
<footer class="footer">Все права защищены<?= " $year" ?></footer>
<script src="../js/jquery-3.3.1.min.js"></script>
<script>
    $(document).ready(() => {
        $('.img_max').click((e) => {
            if (e.target.tagName !== 'IMG') {
                return
            }
            e.preventDefault();
            let $src = e.currentTarget.dataset.src;
            let $alt = e.currentTarget.dataset.alt;
            let $img = `<img class="modal_img" src="${$src}" alt="${$alt}">`;
            $('.modal_form');
            $('.overlay').fadeIn(400,
                () => {
                    document.body.classList.add('stop-scroll');
                    $('.modal_form')
                        .append($img)
                        .css('display', 'block')
                        .animate({opacity: 1, top: '50%'}, 200);
                });
        });

        $('.modal_close').click(() => {
            $('.modal_form')
                .animate({opacity: 0, top: '45%'}, 200,
                    () => {
                        $('.modal_form').css('display', 'none');
                        $('.overlay').fadeOut(400);
                        $('.modal_img').remove();
                        document.body.classList.remove('stop-scroll');
                    }
                );
        });
    });
</script>
</body>
</html>