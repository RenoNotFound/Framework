<?php


namespace Framework\Database\Connection;


use PDO;
use PDOException;

class Connection
{

    public static function getConnection(array $config) : PDO
    {
        $host = $config["database"]["host"];
        $name = $config["database"]["name"];
        $user = $config["database"]["user"];
        $password = $config["database"]["password"];
        $drivers = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];

        $pdo = null;
        $dsn = "mysql:dbname={$name};host={$host};charset=utf8";
        try {
            $pdo = new PDO($dsn, $user, $password, $drivers);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "\n";
        }
        return $pdo;
    }

}