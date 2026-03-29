<?php

class Connect {
    private static $host = 'localhost';
    private static $user = 'root';
    private static $db = 'ip';
    private static $pass = '';
    private static $conn = null;

    private function __contruct() {
    }

    private function __clone() {
    }
    public static function getConnection()
 {
        if ( self::$conn == null ) {
            try {
                self::$conn = new PDO( 'mysql:host='.self::$host.';dbname='.self::$db.';charset=utf8mb4', self::$user, self::$pass );
                self::$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

            } catch( PDOException $e )
 {
                echo 'Loi:'.$e->getMessage();
            }
        }
        return self::$conn;
    }
}
?>