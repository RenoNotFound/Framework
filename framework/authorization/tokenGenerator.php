<?php


namespace Framework\authorization;


class tokenGenerator
{
    private static string $CHARS = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

    public static function generateToken(int $strength = 12)
    {
        $token_length = strlen(self::$CHARS);
        $random_token = "";
        for($i = 0; $i < $strength; $i++) {
            $random_character = self::$CHARS[mt_rand(0, $token_length - 1)];
            $random_token .= $random_character;
        }

        return $random_token;
    }
}