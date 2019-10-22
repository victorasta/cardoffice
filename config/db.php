<?php
class Database{
    private static $db;
    public static function initialize()
    {
       Database::$db = new mysqli("localhost","root","toor","cardoffice");
    }
    public static function get(){
        return Database::$db;
    }
}