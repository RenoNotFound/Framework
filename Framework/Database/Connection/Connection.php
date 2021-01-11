<?php


namespace Framework\Database\Connection;


use PDO;
use PDOException;

class Connection
{
    private static ?Connection $instance = null;
    private PDO $pdo;

    private string $host;
    private string $name;
    private string $user;
    private string $password;
    private array $drivers;

    private function __construct(array $configData)
    {
        $this->setProperties($configData);
        $this->connect();
    }

    private function setProperties(array $config) : void
    {
        $cfg = json_decode(file_get_contents("./Config/config.json"),true);
        $this->host = $cfg["database"]["host"];
        $this->name = $cfg["database"]["name"];
        $this->user = $cfg["database"]["user"];
        $this->password = $cfg["database"]["password"];
        $this->drivers = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ];
    }

    private function connect(): void
    {
        $dsn = "mysql:dbname={$this->name};host={$this->host};charset=utf8";
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->password, $this->drivers);
//            echo "Connected successfully" . "\n";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage() . "\n";
        }
    }

    public static function getInstance(array $configData) : Connection
    {
        if(!self::$instance) {
            self::$instance = new Connection($configData);
        }

        return self::$instance;
    }

    public function getConnection() : PDO
    {
        return $this->pdo;
    }

}