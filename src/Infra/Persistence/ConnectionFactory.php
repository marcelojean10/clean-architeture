<?php


namespace Alura\Architecture\Infra\Persistence;

use PDO;

class ConnectionFactory
{

    public static function createConnection(): PDO
    {
        $databasePath = __DIR__ . '/../Database/banco.sqlite';
        $connection =  new PDO('sqlite:' . $databasePath);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $connection;
    }
}