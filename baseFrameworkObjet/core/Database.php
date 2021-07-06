<?php

/**
 * Connexion à la base de données
 * 
 * 
 */

 class Database
 {
    public static function getPdo(){

    $pdo = new PDO('mysql:host=localhost;dbname=testy', "chaConstant", "0605", [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION ,
       // PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ

        
    ]);

    return $pdo;


    }
 }




?>