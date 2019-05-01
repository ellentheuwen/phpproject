<?php

    class Db {
        private static $conn;

        /*
            @return PDO connection
            -> if exists -> return existing
            -> if !exists -> return new PDO 
        */
        public static function getInstance() {
            
            include_once("settings/db.php");
            
            if( self::$conn == null ){
                self::$conn = new PDO("mysql:host=localhost;port=8889;dbname=talktype", "root", "root", null);
                // echo "💩";
                return self::$conn;
                
            }
            else {
                // echo "🚀";
                return self::$conn;
            }
        }

    }