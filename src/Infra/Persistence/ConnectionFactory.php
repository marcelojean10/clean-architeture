<?php


namespace Alura\Architecture\Infra\Persistence;

use PDO;

class ConnectionFactory
{

    public static function createConnection(): PDO
    {
        $databasePath = __DIR__ . '/../Database/banco.sqlite';
        return new PDO('sqlite:' . $databasePath);
    }
}