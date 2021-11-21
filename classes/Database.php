<?php

/**
 * Database connection class.
 */
class Database {

    public static $host = "localhost";
    public static $userName = "root";
    public static $password = "cci18271970M";
    public static $dbName = "sakila";


    public static function connect() {
        $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$dbName.";charset=utf8", self::$userName, self::$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;    
    }

    public static function query($sql, $params = [])
    {
        try {
            $stmt = self::connect()->prepare($sql);
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute($params);
            return $stmt;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

}