<?php
interface DB {
    public static function connect();
    public static function query($sql);
    public static function execute();
}

class Database implements DB {
    public static $host = "localhost";
    public static $db = "phpdb";
    public static $user = "root";
    public static $pass = ""; 
    public static $query = null;
    public static $connection = null;

    public static function connect() {
        if (is_null(self::$connection)) {
            self::$connection = mysqli_connect(self::$host, self::$user, self::$pass, self::$db);
        }

        return self::$connection;
    }

    public static function query($sql) {
        if (strlen($sql) > 0) {
            self::$query = $sql;
        }

        return false;
    }

    public static function execute() {
        if (!is_null(self::$query)) {
            return mysqli_query(self::$connection, self::$query);
        }

        return false;
    }
}