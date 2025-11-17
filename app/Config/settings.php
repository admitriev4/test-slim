<?php


return [
    'displayErrorDetails' => getenv('DISPLAY_ERRORS_SLIM'),
    'addContentLengthHeader' => false,
    'db' => [
        'driver' => "mysql",
        'host' => getenv('MYSQL_HOST'),
        'username' => getenv('MYSQL_USER'),
        'password' => getenv('MYSQL_PASSWORD'),
        'database' => getenv('MYSQL_DATABASE'),
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'flags' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => true,
            // Отключаем постоянные соединения
            PDO::ATTR_PERSISTENT => false,
            // Включаем исключения
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // Эмулируем подготовленные выражения
            PDO::ATTR_EMULATE_PREPARES => true,
            // Устанавливаем режим выборки по умолчанию на массив
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            // Устанавливаем кодировку символов по умолчанию
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci'
        ],
    ],
];