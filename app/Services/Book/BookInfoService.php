<?php
namespace App\Services\Book;

use App\Repository\BookRepository;
use Pimple\Psr11\Container;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class BookInfoService {

    private BookRepository $bookRepository;

    public function __construct(Container $container)
    {
        $this->bookRepository = new BookRepository($container);
    }

    public function getList(): array
    {
        return $this->bookRepository->getList();
    }

    public function getOne($id): array
    {
        return $this->bookRepository->getOne($id);
    }
}
