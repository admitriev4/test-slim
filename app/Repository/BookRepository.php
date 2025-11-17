<?php
namespace App\Repository;

use PDOException;
use Pimple\Psr11\Container;



class BookRepository extends MainRepository
{
    public function __construct(Container $container)
    {
        parent::__construct($container);
    }

    public function getList(): array
    {
        $sql = $this->PDO->prepare('SELECT * FROM `books` ORDER BY `id` ASC');
        $sql->execute();
        return $sql->fetchAll();
    }

    public function getOne($id): array
    {
        $sql = $this->PDO->prepare('SELECT * FROM `books` WHERE `id` = ' . $id);
        $sql->execute();
        return $sql->fetchAll();
    }

    public function insert(string $author, string $name): string
    {
        $sth = $this->PDO->prepare("INSERT INTO `books` SET `author` = :author, `name` = :name");
        $sth->execute(['author' => $author, 'name' => $name]);
        return $this->PDO->lastInsertId();
    }

    public function update(string $id, string $author, string $name): array
    {
        $sth = $this->PDO->prepare("UPDATE `books` SET `author` = :author, `name` = :name WHERE `id` = :id");
        $sth->execute(array('id' => $id, 'author' => $author, 'name' => $name));
        return $this->getOne($id);
    }

    public function delete($id): bool
    {
        try {
            $sth = $this->PDO->prepare("DELETE FROM `books` WHERE `id` = :id");
            $sth->execute(array('id' => $id));
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

}