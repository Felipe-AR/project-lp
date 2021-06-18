<?php
    class Database {
        private static $dbName = '';
        private static $dbHost = '';
        private static $dbUser = '';
        private static $dbPassword = '';

        private static $connection = null;

        public function __construct() {
            die('A instância de Database não é permitida.');
        }

        public static function connect() {
            if(self::$connection == null) {
                try {
                    $dsn = 'mysql:host=' . self::$dbHost . 'dbname=' . self::$dbName;
                    self::$connection = new PDO($dsn, self::$dbUser, self::$dbPassword);
                } catch (PDOException $e) {
                    die($e->getMessage());
                }
            }
            return self::$connection;
        }
        public static function disconnect() {
            self::$connection = null;
        }
    }
?>