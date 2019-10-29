<?php
class Database{
    private static $db;
    public static function initialize()
    {
       Database::$db = new mysqli("localhost","root","toor","cardoffice");
       if(!(Database::$db->set_charset('utf8')) || !(Database::$db->query("SET NAMES 'utf8'")))
       throw new Exception(Database::$db->error);
    }
    public static function get(){
        return Database::$db;
    }
}