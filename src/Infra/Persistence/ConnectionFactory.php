<?php


namespace Alura\Architecture\Infra\Persistence;


use PDO;

class ConnectionFactory
{

    public static function createConnection(): PDO
    {
        $databasePath = __DIR__ . '../Database/banco.sqlite';
        $pdo = new PDO('sqlite:' . $databasePath);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }
}