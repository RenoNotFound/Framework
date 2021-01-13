<?php


namespace Framework\database;


use PDO;
use PDOException;

class Database
{
    private PDO $pdo;

    private string $host;
    private string $name;
    private string $user;
    private string $password;
    private array $drivers;

    /**
     * Database constructor.
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->configureDatabase($config);
    }


    private function configureDatabase(array $config) : void
    {
        $this->host = $config["host"];
        $this->name = $config["name"];
        $this->user = $config["user"];
        $this->password = $config["password"];
        $this->drivers = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];
        $this->connect();
    }

    private function connect(): void
    {
        $dsn = "mysql:dbname={$this->name};host={$this->host};charset=utf8";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->password, $this->drivers);
        } catch (PDOException $e) {
            echo "Database failed: " . $e->getMessage();
        }
    }

    public function getPdo() : PDO
    {
        return $this->pdo;
    }
}

