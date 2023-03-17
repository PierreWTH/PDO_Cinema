<?php

namespace Model;

abstract class Connect 
{
    const HOST = "localhost";
    const DB = "cinema_pierre";
    const USER = "root";
    const PASS = "";

    public static function seConneceter() 
    {
        try 
        {
            return new \PDO(
                "mysql:host=".self::HOST. ";dbname=".self::DB."charset=utf8", self::USER, self::PASS);
        }
            catch(\PDOException $ex)
            {
                return $ex->getMessage();
            }
        
    }

}





?>