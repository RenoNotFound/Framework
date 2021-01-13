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

    private function __construct()
    {
        $this->connect();
    }

    public static function configureDatabase(array $config) : void
    {
        $host = $config["database"]["host"];
        $name = $config["database"]["name"];
        $user = $config["database"]["user"];
        $host = $config["database"]["password"];
        $drivers = [
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

    /**
     * @param string $host
     */
    public function setHost(string $host): void
    {
        $this->host = $host;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user): void
    {
        $this->user = $user;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @param array $drivers
     */
    public function setDrivers(array $drivers): void
    {
        $this->drivers = $drivers;
    }



}