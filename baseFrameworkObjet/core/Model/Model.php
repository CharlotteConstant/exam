<?php

namespace Model;

use PDO; // comme un require_once doit etre tout en haut

abstract class Model{
    protected $pdo;
    protected $table;

    public function __construct(){
        
    $this->pdo = \Database::getPdo();
    }


/**
 * trouver un item par son id
 * renvoie un tableau contenant un garage ou un booleen
 * si inexistant
 * @param integer $id
 * @param string $className
 * @return array|bool
 * 
 */
public function find( int $id, string $className, ? string $table = null) //$className parametre de la function, ? parametre optionnel
{
   $sql = "SELECT * FROM {$this->table} WHERE id =:id";

   if(!empty($table)){
       $sql = "SELECT * FROM $table WHERE id=:id";
   }

    $maRequete = $this->pdo->prepare($sql);
    $maRequete->execute(['id' => $id]);

    $item = $maRequete->fetchObject($className); //deja fait pour l'objet il sait qu'on va lui donner une classe;

    return $item;
}

    /**
 * renvoie un tableau contenant tous les items
 * de la table garages
 * @return array
 */

public function findAll(string $className) : array 
{
    
    $resultatRequete = $this->pdo->query("SELECT * FROM {$this->table}");

    $items = $resultatRequete->fetchAll(PDO::FETCH_CLASS, $className);

    return $items;
}




/**
 * supression d'un item via son id
 * @param integer $id
 * @return void
 * 
 */

public function delete(int $id): void
{
    

    $maRequete = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id =:id");

    $maRequete->execute(['id' => $id]);
}

}

?>