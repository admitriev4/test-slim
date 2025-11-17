<?php
namespace App\Services\Book;

use App\Repository\BookRepository;
use Pimple\Psr11\Container;

class BookDeleteService {
    private BookRepository $bookRepository;

    public function __construct(Container $container)
    {
        $this->bookRepository = new BookRepository($container);
    }

    public function execute(int $id): bool
    {
        return $this->bookRepository->delete($id);
    }
}