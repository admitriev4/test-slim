<?php

use Dotenv\Dotenv;

$baseDir = __DIR__ . '/../../';
$dotenv = Dotenv::createUnsafeImmutable($baseDir);
if (file_exists($baseDir . '.env')) {
    $dotenv->load();
}
$dotenv->required(['MYSQL_HOST', 'MYSQL_DATABASE', 'MYSQL_USER', 'MYSQL_PASSWORD']);