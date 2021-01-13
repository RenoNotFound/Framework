<?php


namespace App\queries;


use App\Application;
use PDO;

class UserQueries
{

    public static function getPassByUsername(PDO $pdo, string $username)
    {
        $sql = "SELECT id, password
                    FROM users
				    WHERE username = :username";
        $statement = $pdo->prepare($sql);
        $statement->execute(["username" => $username]);
        return $statement->fetch();
    }
}