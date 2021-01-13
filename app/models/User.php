<?php


namespace App\models;


class User
{
    private string $username;
    private string $email;
    private string $password;

    public function loadData(string $username, string $email, string $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    public function register()
    {
        echo "Creating new user";
    }
}