<?php
namespace Model;

abstract class Connect 
{
    // Informations de la base de donnée

    const HOST = "localhost";
    const DB = "cinema_pierre";
    const USER = "root";
    const PASS = "";

    // Fonction pour se connecter a la bdd

    public static function seConnecter() 
    {
        try 
        {
            return new \PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8", self::USER, self::PASS);
        }
            catch(\PDOException $ex)
            {
                return $ex->getMessage();
            }
        
    }

}



?>