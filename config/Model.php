<?php
/**
 * Created by PhpStorm.
 * User: Diallo
 * Date: 10/04/2019
 * Time: 11:52
 */
namespace config;

class  Model
{
    public static function getConnectionOracle()
    {
        $tns = " 
                (DESCRIPTION = (ADDRESS_LIST = (ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.180.61)(PORT = 1521)))
                (CONNECT_DATA = (SERVER = DEDICATED)(SID = EADB)))
            ";
            
        $db_username = "odasendaily";
        $db_password = "odasendaily2018";
        try{
            $conn = new \PDO("oci:dbname=".$tns,$db_username,$db_password);
            return $conn;
        }catch(\PDOException $e){
            echo ("Erreur d'accès à la base de données !");
        }
    }

    public static function getConnectionMySQL()
    {
        $host = 'localhost';
        $dbname = 'db_agences';
        $user = 'root';
        $password = '';

        $dsn = "mysql:/host=$host;dbname=$dbname";
        // 'mysql:host=192.168.180.40;dbname=requiz', 'root', 'Expresso2015'
        try {
            $db = new \PDO($dsn, $user, $password);
        } catch (Exception $ex) {
            die("Error : lors de la connexion avec le serveur de base de données !");
        }
        return $db;
    }
    

}
