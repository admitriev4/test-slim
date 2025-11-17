<?php
namespace App\Services\Book;


use App\Repository\BookRepository;
use Pimple\Psr11\Container;

class CreateOrUpdateService {

    private BookRepository $bookRepository;

    public function __construct(Container $container)
    {
        $this->bookRepository = new BookRepository($container);
    }

    public function insert(array $request) : string
    {
        $author = $request['author'] ?? "";
        $name = $request['name'] ?? "";
        return $this->bookRepository->insert($author, $name);
    }

    public function update(array $request): array
    {
        $id = $request['id'];
        $author = $request['author'] ?? "";
        $name = $request['name'] ?? "";
        return $this->bookRepository->update($id, $author, $name);
    }


}