<?php

namespace MyApp;

class DBConnector
{
    private static $conn = null;
    public static function Connect() {
        self::$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        return self::$conn;
    }
    public static function Disconnect() {
        if(self::$conn !=null) {
            mysqli_close(self::$conn);
        }
    }
}