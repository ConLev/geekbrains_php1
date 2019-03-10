<?php /** @noinspection PhpMissingBreakStatementInspection */

$title = 'lesson_2';
$header = 'lesson_2';
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
        echo '<p class="task">1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные 
        значения. <br>Затем написать скрипт, который работает по следующему принципу:<br>
        <br>если $a и $b положительные, вывести их разность;
        <br>если $а и $b отрицательные, вывести их произведение;
        <br>если $а и $b разных знаков, вывести их сумму;
        <br>Ноль можно считать положительным числом.</p>';

        function func1($a = 7, $b = 4)
        {
            if ($a >= 0 && $b >= 0) {
                $result = $a - $b;
                echo "Вы ввели положительные числа, \$a - \$b = ${result}";
            } else if ($a < 0 && $b < 0) {
                $result = $a * $b;
                echo "Вы ввели отрицательные числа, \$a * \$b = ${result}";
            } else {
                $result = $a + $b;
                echo "Вы ввели числа с разными знаками, \$a + \$b = ${result}";
            }
        }

        func1();
        echo '</br>';
        func1(-5, -3);
        echo '</br>';
        func1(10, -5);
        echo '</br>';

        echo '<br><p class="task"> 2. Присвоить переменной $а значение в промежутке [0..15].<br> 
        С помощью оператора switch организовать вывод чисел от $a до 15. </p>';

        function func2($a)
        {
            switch ($a) {
                case 0:
                    echo '0, ';
                case 1:
                    echo '1, ';
                case 2:
                    echo '2, ';
                case 3:
                    echo '3, ';
                case 4:
                    echo '4, ';
                case 5:
                    echo '5, ';
                case 6:
                    echo '6, ';
                case 7:
                    echo '7, ';
                case 8:
                    echo '8, ';
                case 9:
                    echo '9, ';
                case 10:
                    echo '10, ';
                case 11:
                    echo '11, ';
                case 12:
                    echo '12, ';
                case 13:
                    echo '13, ';
                case 14:
                    echo '14, ';
                case 15:
                    echo '15, ';
            }
        }

        $a = 7;
        echo "\$a = $a<br>";
        func2($a);
        echo '<br>';
        $a = 0;
        echo "\$a = $a<br>";
        func2($a);
        echo '<br>';

        echo '<br><p class="task">3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.<br> 
        Обязательно использовать оператор return. </p>';

        $a = 5;
        $b = 15;
        echo "\$a = $a<br>";
        echo "\$b = $b<br>";

        /**
         * Функция сложения чисел
         * @param int|float $a - первое число
         * @param int|float $b - второе число
         * @return int|float - возвращает сумму
         */
        function addition($a, $b)
        {
            return $a + $b;
        }

        /**
         * Функция вычитания чисел
         * @param int|float $a - первое число
         * @param int|float $b - второе число
         * @return int|float - возвращает разность
         */
        function subtraction($a, $b)
        {
            return $a - $b;
        }

        /**
         * Функция умножения чисел
         * @param int|float $a - первое число
         * @param int|float $b - второе число
         * @return int|float - возвращает произведение
         */
        function multiplication($a, $b)
        {
            return $a * $b;
        }

        /**
         * Функция деления чисел
         * @param int|float $a - первое число
         * @param int|float $b - второе число
         * @return int|float - возвращает частное
         */
        function division($a, $b)
        {
            if ($b !== 0) {
                return $a / $b;
            } else {
                return 'Деление на "0"';
            }
        }

        echo "<br>\$a + \$b = " . addition($a, $b);
        echo '<br>';
        echo '$a - $b = ' . subtraction($a, $b);
        echo '<br>';
        echo '$a * $b = ' . multiplication($a, $b);
        echo '<br>';
        echo '$a / $b = ' . division($a, $b);
        echo '<br>';

        echo '<br><p class="task">4. Реализовать функцию с тремя параметрами:<br> 
        function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, 
        $operation – строка с названием операции.<br> 
        В зависимости от переданного значения операции выполнить одну из арифметических операций<br> 
        (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).</p>';

        $arg1 = 7;
        $arg2 = 20;
        echo "\$arg1 = $arg1<br>";
        echo "\$arg2 = $arg2<br>";
        echo '<br>';

        /**
         * Функция основных математических операций
         * @param int|float $arg1 - первое число
         * @param int|float $arg2 - второе число
         * @param string $operation - выбор операции
         * @return int|float - результат вычисления
         */
        function mathOperation($arg1, $arg2, $operation)
        {
            switch ($operation) {
                case '+':
                case 'addition':
                    return addition($arg1, $arg2);
                    break;
                case '-':
                case 'subtraction':
                    return subtraction($arg1, $arg2);
                    break;
                case '*':
                case 'multiplication':
                    return multiplication($arg1, $arg2);
                    break;
                case '/':
                case 'division':
                    return division($arg1, $arg2);
                    break;
                default:
                    return 'Ошибка при выборе операции';

            }
        }

        echo '$arg1 + $arg2 = ' . mathOperation($arg1, $arg2, '+');
        echo '<br>';
        echo '$arg1 - $arg2 = ' . mathOperation($arg1, $arg2, 'subtraction');
        echo '<br>';
        echo '$arg1 * $arg2 = ' . mathOperation($arg1, $arg2, '*');
        echo '<br>';
        echo '$arg1 / $arg2 = ' . mathOperation($arg1, $arg2, 'division');
        echo '<br>';
        echo mathOperation($arg1, $arg2, 'abracadabra');
        echo '<br>';

        echo '<br><p class="task">5. Посмотреть на встроенные функции PHP.<br> 
        Используя имеющийся HTML-шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.</p>';
        echo '<br>';
        echo '<p class="task">6. *С помощью рекурсии организовать функцию возведения числа в степень.<br> 
        Формат: function power($val, $pow), где $val – заданное число, $pow – степень.</p>';

        /**Функция возведения в степень
         * @param int|float $val - число возводимое в степень
         * @param int $pow - степень возведения
         * @return int|float - результат возведения числа в степень
         */
        function power($val, $pow)
        {
            if ($pow >= 1) {
                return $val * power($val, (int)$pow - 1);
            } elseif ($pow <= -1) {
                return $val / power($val, (int)($pow - 1) * (-1));
            }
            return 1;
        }

        echo '2 в степени 5 = ' . power(2, 5.7);
        echo '<br>';
        echo '2 в степени 1 = ' . power(2, 1);
        echo '<br>';
        echo '2 в степени 0 = ' . power(2, 0);
        echo '<br>';
        echo '0.5 в степени 3 = ' . power(0.5, 3);
        echo '<br>';
        echo '2 в степени -1 = ' . power(2, -1);
        echo '<br>';
        echo '2 в степени -5 = ' . power(2, -5.7);
        echo '<br>';

        echo '<br><p class="task">7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате 
        с правильными склонениями, например:<br>
        22 часа 15 минут
        21 час 43 минуты</p>';

        date_default_timezone_set("Europe/Moscow");
        $hours = date('G');
        $minutes = date('i');
        $time_zone = date('e');

        /**
         * Функция для определения правильного склонения числительного
         * @param int $count - число
         * @param string $first - первый вариант склонения числительного
         * @param string $second - второй вариант склонения числительного
         * @param string $third - третий вариант склонения числительного
         * @return string - возвращает правильное склонение числительного
         */
        function wordDeclension($count, $first, $second, $third)
        {
            if ($count >= 5 && $count <= 20) {
                return $third;
            } else if ($count > 1 && $count < 5) {
                return $second;
            } else if ($count === 1) {
                return $first;
            } else if ($count >= 21) {
                $count = $count % 10;
                return wordDeclension($count, $first, $second, $third);
            } else {
                return $third;
            }
        }

        echo "$hours " . wordDeclension($count = $hours, 'час ', 'часа ', 'часов ') .
            "$minutes " . wordDeclension($count = $minutes, 'минута', 'минуты', 'минут') .
            " ($time_zone)";
        ?>
    </div>
    <div class="clr"></div>
</div>
<footer class="footer">Все права защищены<?= " $year" ?></footer>
</body>
</html>