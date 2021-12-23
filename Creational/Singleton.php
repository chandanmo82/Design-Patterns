<?php
class Database {
    private static $connection;
    private function __construct()
    {
        echo "connection created with database once\n";

    }
    public static function connection(){
        if(!isset(self::$connection)){
            self::$connection = new Database();
        }
        return self::$connection;
    }
}
$database = Database::connection();
$newdatabase = Database::connection();
?>