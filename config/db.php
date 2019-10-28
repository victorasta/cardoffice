<?php
class Database{
    private static $db;
    public static function initialize()
    {
       Database::$db = new mysqli("localhost","root","","cardoffice");
    }
    public static function get(){
        return Database::$db;
    }
}