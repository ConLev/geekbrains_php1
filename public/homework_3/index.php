<?php /** @noinspection PhpStatementHasEmptyBodyInspection */

$title = 'lesson_3';
$header = 'lesson_3';
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
<div class="container">
    <h1 class="header"><?= "$header" ?></h1>
    <div class="content">
        <?php
        echo '<p class="task">1. С помощью цикла while вывести все числа в промежутке от 0 до 100, 
        которые делятся на 3 без остатка.</p>';

        $minNumber = 0;
        $maxNumber = 100;
        while ($minNumber <= $maxNumber) {
            if ($minNumber % 3 === 0) {
                echo "$minNumber, ";
            }
            $minNumber++;
        }
        echo '<br>';

        echo '<br><p class="task"> 2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, 
        чтобы результат выглядел так:<br>

        <br>0 – это ноль.
        <br>1 – нечетное число.
        <br>2 – четное число.
        <br>3 – нечетное число.
        <br>…
        <br>10 – четное число. </p>';

        $number = 0;
        do {
            if ($number === 0) {
                echo "$number - это ноль.<br>";
            } else if ($number % 2) {
                echo "$number - нечётное число.<br>";
            } else {
                echo "$number - чётное число.<br>";
            }
            $number++;
        } while ($number <= 10);

        echo '<br><p class="task">3. Объявить массив, в котором в качестве ключей будут использоваться названия 
        областей, <br>а в качестве значений – массивы с названиями городов из соответствующей области.<br> 
        Вывести в цикле значения массива, чтобы результат был таким:<br>

        <br>Московская область:
        <br>Москва, Зеленоград, Клин
        <br>Ленинградская область:
        <br>Санкт-Петербург, Всеволожск, Павловск, Кронштадт
        <br>Рязанская область … (названия городов можно найти на maps.yandex.ru) </p>';

        $arr = [
            'Московская область' => [
                'Москва',
                'Зеленоград',
                'Клин',
            ],
            'Ленинградская область' => [
                'Санкт-Петербург',
                'Всеволожск',
                'Павловск',
                'Кронштадт',
            ],
            'Рязанская область' => [
                'Агломазово',
                'Елино',
                'Желобово',
                'Заречный',
                'Касимов',
                'Лопатино',
                'Машково',
                'Нарма',
            ],
        ];

        foreach ($arr as $region => $cities) {
            echo "$region: <br>";
            echo implode(', ', $cities);
//            $i = -1;
//            foreach ($cities as $city) {
//            $i++;
//                if (array_key_last($cities) === $i) {
//                    echo "$city";
//                } else {
//                    echo "$city, ";
//                }
//            $count = count($cities);
//            foreach ($cities as $key => $city) {
//                if ($key + 1 === $count) {
//                    echo "$city";
//                } else {
//                    echo "$city, ";
//                }
//            }
            echo '<br>';
        }

        echo '<br><p class="task">4. Объявить массив, индексами которого являются буквы русского языка, 
        а значениями – соответствующие латинские буквосочетания<br> 
        (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’). Написать функцию 
        транслитерации строк.</p>';

        function transliteration($word)
        {
            $letters = [
                'а' => 'a',
                'б' => 'b',
                'в' => 'v',
                'г' => 'g',
                'д' => 'd',
                'е' => 'e',
                'ё' => 'yo',
                'ж' => 'zh',
                'з' => 'z',
                'и' => 'i',
                'й' => 'j',
                'к' => 'k',
                'л' => 'l',
                'м' => 'm',
                'н' => 'n',
                'о' => 'o',
                'п' => 'p',
                'р' => 'r',
                'с' => 's',
                'т' => 't',
                'у' => 'u',
                'ф' => 'f',
                'х' => 'x',
                'ц' => 'c',
                'ч' => 'ch',
                'ш' => 'sh',
                'щ' => 'shh',
                'ъ' => '``',
                'ы' => 'y\'',
                'ь' => '`',
                'э' => 'e`',
                'ю' => 'yu',
                'я' => 'ya',
            ];
            $word = mb_strtolower($word);
            //return str_replace(array_keys($letters), array_values($letters), $word);
            return strtr($word, $letters);
        }

        echo transliteration("Я функция транслитерации кириллицы в латиницу.<br>");

        echo '<br><p class="task">5. Написать функцию, которая заменяет в строке пробелы на подчеркивания
        и возвращает видоизмененную строчку.</p>';

        function characterReplacement($string)
        {
            $symbol = ' ';
            $replacement = '_';
            return str_replace($symbol, $replacement, $string);
        }

        echo characterReplacement("Я функция замены пробелов на символ подчеркивания<br>");
        echo '<br>';

        echo '<p class="task">6. В имеющемся шаблоне сайта заменить статичное меню (ul – li) на генерируемое через PHP.<br> 
        Необходимо представить пункты меню как элементы массива и вывести их циклом.<br> 
        Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.</p>';
        echo '<div>';
        $menu = [
            [
                'title' => 'Главная',
                'url' => '/home.php',
            ],
            [
                'title' => 'Статьи о животных',
                'url' => '/articles/articles.php',
                'items' => [
                    [
                        'title' => 'О котиках',
                        'url' => '/articles/cats/cats.php',
                        'items' => [
                            [
                                'title' => 'О домашних котиках',
                                'url' => '/articles/cats/home_cats/cats.php'
                            ],
                        ],
                    ],
                    [
                        'title' => 'О собачках',
                        'url' => '/articles/dogs/dogs.php',
                        'items' => [
                            [
                                'title' => 'О домашних собачках',
                                'url' => '/articles/dogs/home_dogs/dogs.php'
                            ],
                        ],
                    ],
                ],
            ],
            [
                'title' => 'Контакты',
                'url' => '/contacts/contacts.php',
            ],
        ];
        function render_menu($menu, $ul_class, $li_class, $a_class)
        {
            echo "<ul class= '$ul_class' >";
            foreach ($menu as $list_item) {
                echo "<li class='$li_class'>";
                echo "<a class='$a_class' href='{$list_item['url']}'>{$list_item['title']}</a>";
                //if (isset($list_item['items']) && is_array($list_item['items'])) { // вариант преподавателя
                if (array_key_exists('items', $list_item) && is_array($list_item['items'])) {
                    render_menu($list_item['items'], 'sub_menu', 'sub_menu_list', 'sub_menu_link');
                }
                echo '</li>';
            }
            echo "</ul>";
        }

        render_menu($menu, 'top_menu', 'top_menu_list', 'top_menu_link');
        echo '</div>';

        echo '<br><p class="task">7. *Вывести с помощью цикла for числа от 0 до 9, не используя тело цикла. 
        Выглядеть должно так:<br>

        <br>for (…){ // здесь пусто}<br></p>';

        for ($number = 0; $number < 10; print $number++) {
        }
        echo '<br>';

        echo '<br><p class="task">8. *Повторить третье задание, но вывести на экран только города, 
        начинающиеся с буквы «К».</p>';

        foreach ($arr as $region => $cities) {
            echo "$region: <br>";
            $key = 'К';
            foreach ($cities as $city) {
                if (strpos($city, $key) !== false) {
                    echo "$city";
                }
            }
            echo '<br>';
        }

        echo '<br><p class="task">9. *Объединить две ранее написанные функции в одну, 
        которая получает строку на русском языке,<br> производит транслитерацию и замену пробелов на подчеркивания<br> 
        (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).</p>';

        function transliterationAndReplacement($word)
        {
            $symbol = ' ';
            $replacement = '_';
            return str_replace($symbol, $replacement, transliteration($word));
        }

        echo transliterationAndReplacement("Я функция транслитерации и замены символов прообела на символы 
подчеркивания<br>");

        ?>
    </div>
    <div class="clr"></div>
</div>
<footer class="footer">Все права защищены<?= " $year" ?></footer>
</body>
</html>