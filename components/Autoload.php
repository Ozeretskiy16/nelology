<?php

/**
 * Автоматическое подключение классов;
 */

function __autoload($class_name)
{
    // Массив папок, из которых возможно подключение классов;
    $array_paths = array
    (
        '/models/',
        '/components/',
        '/controllers/'
    );

    foreach ($array_paths as $path)
    {

        // Формируем имя и путь;
        $path = ROOT . $path . $class_name . '.php';

        // Если файл существует - подключаем его;
        if (is_file($path))
        {
            include_once $path;
        }
    }
}
