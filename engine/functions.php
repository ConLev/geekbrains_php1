<?php

/**
 * Функция шаблонизатора. Получает шаблон из файла и заменяет ключи типа {{KEY}} на значение
 * @param string $file - путь к файлу с шаблоном
 * @param array $variables - массив подставляемых значений
 * @return string
 */
function render($file, $variables = [])
{
    //если файл не существует, выкидываем ошибку
    if (!is_file($file)) {
        echo 'Template file "' . $file . '" not found';
        exit();
    }

    //если файл пустой, выкидываем ошибку
    if (filesize($file) === 0) {
        echo 'Template file "' . $file . '" is empty';
        exit();
    }

    //получаем содержимое шаблона
    $templateContent = file_get_contents($file);

    //если переменны не заданны, возвращаем шаблон как есть
    if (empty($variables)) {
        return $templateContent;
    }

    //проходимся по всем переменным
    foreach ($variables as $key => $value) {
        //преобразуе ключ из key в {{KEY}}
        $key = '{{' . strtoupper($key) . '}}';

        //заменяем все ключи в шаблоне
        $templateContent = str_replace($key, $value, $templateContent);
    }

    //возвращаем получившийся шаблон
    return $templateContent;
}

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
    if (!$b) {
        return 'Деление на "0"';
    }
    return ($a / $b);
}

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
            return '0';

    }
}