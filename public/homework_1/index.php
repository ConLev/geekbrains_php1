<?php
/**
 * Created by PhpStorm.
 * User: konstantinlevchenko
 * Date: 2019-02-13
 * Time: 13:40
 */

/*
echo $abraCadabra;
var_dump();
require'';
*/

$title = 'lesson_1';
$header = 'lesson_1';
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
        echo '<p class="task">1. Установить программное обеспечение: веб­-сервер, базу данных, интерпретатор,<br> 
        текстовый редактор и проверить, что всё работает правильно.</p>';
        echo '<p>Установлен XAMPP, добавлен хост my.site, настроено взаимодействие phpstorm c внешним веб-сервером<br> 
        и базой данных. Включено отображение ошибок php-интерпретатора.</p><br>';
        echo '<p class="task"> 2. Выполнить примеры из методички, разобраться, как это работает. </p>';
        $name = "Konstantin";
        echo "Hello, $name! <br>";
        define('MY_CONST', 100);
        echo MY_CONST;
        echo '</br>';
        $int10 = 42;
        $int2 = 0b101010;
        $int8 = 052;
        $int16 = 0x2A;
        echo "Десятеричная система $int10 <br>";
        echo "Двоичная система $int2 <br>";
        echo "Восьмеричная система $int8 <br>";
        echo "Шестнадцатеричная система $int16 <br>";
        $precise1 = 1.5;
        $precise2 = 1.5e4;
        $precise3 = 6E-8;
        echo "$precise1 | $precise2 | $precise3 <br>";
        $a = 1;
        echo "$a <br>";
        echo '$a <br>';
        $a = 'Hello,';
        $b = ' world';
        $c = $a . $b;
        echo $c;
        echo '</br>';
        $a = 4;
        $b = 5;
        echo $a + $b . '<br>';      // сложение
        echo $a * $b . '<br>';      // умножение
        echo $a - $b . '<br>';      // вычитание
        echo $a / $b . '<br>';      // деление
        echo $a % $b . '<br>';      // остаток от деления
        echo $a ** $b . '<br>';     // возведение в степень
        $a = 4;
        $b = 5;
        $a += $b;
        echo 'a = ' . $a;
        echo '</br>';
        $a = 0;
        echo $a++;    // Постинкремент
        echo '</br>';
        echo ++$a;    // Преинкремент
        echo '</br>';
        echo $a--;    // Постдекремент
        echo '</br>';
        echo --$a;    // Предекремент
        echo '</br>';
        echo '<span> a = 4 </span> <br>';
        $a = 4;
        echo '<span> b = 5 </span> <br>';
        $b = 5;
        echo '<span> a == b </span>';
        var_dump($a == $b);
        echo '// Сравнение по значению <br>';
        echo '<span> a === b </span>';
        var_dump($a === $b);
        echo '// Сравнение по значению и типу <br>';
        echo '<span> a > b </span>';
        var_dump($a > $b);
        echo '// Больше <br>';
        echo '<span> a < b </span>';
        var_dump($a < $b);
        echo '// Меньше <br>';
        echo '<span> a <> b </span>';
        var_dump($a <> $b);
        echo '// Не равно <br>';
        echo '<span> a != b </span>';
        var_dump($a != $b);
        echo '// Не равно <br>';
        echo '<span> a !== b </span>';
        var_dump($a !== $b);
        echo '// Не равно без приведения типов <br>';
        echo '<span> a <= b </span>';
        var_dump($a <= $b);
        echo '// Меньше или равно <br>';
        echo '<span> a >= b </span>';
        var_dump($a >= $b);
        echo '// Больше или равно <br>';
        echo '</br>';
        echo '<p class="task">3. Объяснить, как работает данный код: </p>';
        echo '<span>a = 5</span><br>';
        $a = 5;
        echo '<span>b = "05"</span><br>';
        $b = '05';
        echo '<span>a == b </span>';
        var_dump($a == $b);
        echo '<span>// Почему true? - Преобразование строки "05" к числу, сравнение по значению.</span><br>';
        echo '<span>(int)"012345" </span>';
        var_dump((int)'012345');
        echo '<span>// Почему 12345? - Преобразование строки "012345" к целому (int) числу.</span><br>';
        echo '<span>(float)123.0 === (int)123.0 </span>';
        var_dump((float)123.0 === (int)123.0);
        echo '<span>// Почему false? - Сравнение по значению и типу. 123.0 не равно 123.</span><br>';
        echo '<span>(int)0 === (int)"hello, world"</span>';
        var_dump((int)0 === (int)'hello, world');
        echo '<span>// Почему true? - Сравнение по значению и типу. Строка преобразованная к целому числу равна 0.
        </span><br>';
        echo '</br>';
        echo '<p class="task">4. Используя имеющийся HTML шаблон, сделать так, чтобы главная страница генерировалась<br> 
        через PHP. Создать блок переменных в начале страницы. Сделать так, чтобы h1, title<br> 
        и текущий год генерировались в блоке контента из созданных переменных.</p><br>';
        echo '<p class="task">5. *Используя только две переменные, поменяйте их значение местами.<br> 
        Например, если a = 1, b = 2, надо, чтобы получилось: b = 1, a = 2.<br> 
        Дополнительные переменные использовать нельзя. </p>';
        $a = 1;
        $b = 2;
        echo "<span>a = $a</span><br>";
        echo "<span>b = $b</span><br>";
        echo '</br>';
        $a = $a ^ $b;
        echo '<span>(a(3) = 0011) = (a(1) = 0001) ^ (b(2) = 0010)</span><br>';
        $b = $b ^ $a;
        echo '<span>(b(1) = 0001) = (b(2) = 0010) ^ (a(3) = 0011)</span><br>';
        $a = $a ^ $b;
        echo '<span>(a(2) = 0010 ) = (a(3) = 0011) ^ (b(1) = 0001)</span><br>';
        echo '</br>';
        echo "<span>a = $a</span><br>";
        echo "<span>b = $b</span><br>";
        ?>
    </div>
    <div class="clr"></div>
</div>
<footer class="footer">Все права защищены<?= " $year" ?></footer>
</body>
</html>