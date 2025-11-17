<?php

use Slim\Factory\AppFactory;
use \Pimple\Container;
use Slim\Psr7\Factory\ResponseFactory;
use \Pimple\Psr11\Container as PsrContainer;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/Handlers/EnvHandler.php';

$settings = require __DIR__ . '/../app/Config/settings.php';
$container = new Container(['settings' => $settings]);

$app  = AppFactory::create(new ResponseFactory(), new PsrContainer($container));
$customErrorHandler = require __DIR__ . '/../app/Handlers/ErrorHandler.php';
(require __DIR__ . '/../app/Middleware/MainMiddleware.php')($app, $customErrorHandler);


// Register routes
$routes = require __DIR__ . '/../app/Routes/web.php';
$routes($app);

$app->run();

