<?php
namespace App\Controllers;

use App\Services\Book\BookDeleteService;
use App\Services\Book\BookInfoService;
use App\Services\Book\CreateOrUpdateService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Pimple\Psr11\Container;


class BookController
{
    public Container $container;
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getList(Request $request, Response $response): Response {
        $data = (new BookInfoService($this->container))->getList();
        $response->getBody()->write(json_encode($data));
        return $response;
    }

    public function getOne(Request $request, Response $response, $args): Response {
        $data = (new BookInfoService($this->container))->getOne($request->getAttribute('id'));
        $response->getBody()->write(json_encode($data));
        return $response;
    }

    public function insert(Request $request, Response $response, $args): Response {
        $data = (new CreateOrUpdateService($this->container))->insert($request->getParsedBody());
        $response->getBody()->write("insert book: " . $data);
        return $response;
    }

    public function update(Request $request, Response $response, $args): Response {
        $data = (new CreateOrUpdateService($this->container))->update($request->getParsedBody());
        $response->getBody()->write(json_encode($data));
        return $response;
    }

    public function delete(Request $request, Response $response, $args): Response {
        $id = $request->getParsedBody()['id'];
        $data = (new BookDeleteService($this->container))->execute($id);
        $response->getBody()->write("book delete : " . $data);
        return $response;
    }

}