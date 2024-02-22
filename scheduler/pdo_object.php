<?php
class Db
{
       private static $db;
       public static function getDb()
{
    if (!self::$db)
    {
        try {
               $dsn = 'mysql:host=localhost;dbname=moviestore';
               // establish a connection
              self::$db = new PDO($dsn, 'root', '');

              // after each error, throw exceptions
              self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

             // set default fetch mode
             self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            die('Connection error: ' . $e->getMessage());
        }
     }
       return self::$db;
     }
}