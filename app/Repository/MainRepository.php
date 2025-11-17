<?php
/**
 * @return PDO
 */
namespace App\Repository;

use PDO;
use Pimple\Psr11\Container;


class MainRepository {

    protected PDO $PDO;

    public function __construct(Container $container)
    {
        $settings = $container->get('settings')['db'];
        $host = $settings['host'];
        $dbname = $settings['database'];
        $username = $settings['username'];
        $password = $settings['password'];
        $charset = $settings['charset'];
        $flags = $settings['flags'];
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $this->PDO = new PDO($dsn, $username, $password, $flags);
    }
}


