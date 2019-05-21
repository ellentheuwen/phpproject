<?php

abstract class Db
{
    private static $conn;

    private static function getConfig()
    {
        return parse_ini_file(__DIR__.'/../config/config.ini');
    }

    public static function getInstance()
    {
        if (self::$conn != null) {
            return self::$conn;
        } else {
            $config = self::getConfig();
            $database = $config['database'];
            $user = $config['user'];
            $password = $config['password'];

            /*
            Fills in itself
            with data from the
            config file
            */

            self::$conn = new PDO('mysql:host=localhost;dbname='.$database.';charset=utf8mb4', $user, $password, null);

            return self::$conn;
        }
    }
}
