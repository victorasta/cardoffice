<?php

class Database{
   private static $db = new mysqli("localhost","root","toor","cardoffice");
    public static function getConnection(){
        return Database::$db;
    }
}