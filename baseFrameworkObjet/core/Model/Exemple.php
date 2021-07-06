<?php 

namespace Model;

require_once "core/autoloading.php";

class Exemple extends Model 
{

protected $table = "exemples";
public $id;
public $propiete1;
public $propriete2;
public $user_id;

/**
 * Ajoute un gateau
 *
 * @param string $propriete1
 * @param string $propriete2
 * 
 * @return void
 */

    public function insert(string $propiete1, string $propriete2): void
    {
  
    //$maRequete = $this->pdo->prepare("INSERT INTO exemples(propriete1, propriete2) VALUES (:propriete1, :propriete2)");
    //$maRequete->execute(['propriete1' => $propriete1, 'propriete2' => $propriete2]);

    }

/**
 * modifie un gateau
 * @param integer $propriete1
 * @param string $propriete2
 * @param string $id
 * 
 * @return void
 */

    public function update(string $propriete1, string $propriete2, int $id): void
    {
  

    //$maRequete = $this->pdo->prepare("UPDATE exemples SET propriete1 = :propriete1, propriete2 = :propriete2 WHERE id =:id");
    //$maRequete->execute(['propriete1' => $propriete1, 'propriete2' => $propriete2, "id" => $id]);

    }

    public function findAuthor()
    {
       // return $this->find($this->user_id, \Model\User::class, "autreTables");
    }

}