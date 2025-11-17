<?php
use App\Controllers\BookController;
use Slim\App;


return function (App $app) {

    $app->get('/', [BookController::class, "getList"]);
    $app->get('/book/{id}/', [BookController::class, "getOne"]);
    $app->post('/book/insert/', [BookController::class, "insert"]);
    $app->post('/book/update/', [BookController::class, "update"]);
    $app->post('/book/delete/', [BookController::class, "delete"]);

};

