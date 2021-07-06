<?php 

namespace Model;
use PDO;
require_once "core/autoloading.php";

class Plat extends Model 
{
protected $table = "plats";

public $id;
public $name;
public $price;
public $description;
public $restaurant_id;


/**
 * trouve tous les plats pour un restaurant
 * @param integer $restaurant_id
 * @return array|bool
 * 
 */
public function findAllByRestaurant(int $restaurant_id){
 $maRequete = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE restaurant_id= :restaurant_id");
  $maRequete->execute(['restaurant_id'=> $restaurant_id]);
  $plats = $maRequete->fetchAll(PDO::FETCH_CLASS, \Model\Plat::class);
  return $plats;
}

/**
 * ajoute un nouveau plat dans la bdd
 * @param string $name
 * @param integer $price
 * @param string $description
 * @param integer $restaurant_id
 * @return void
 * 
 */
public function insert(string $name, int $price, string $description, int $restaurant_id): void
{
    $maRequete = $this->pdo->prepare("INSERT INTO plats(name, price, description, restaurant_id) VALUES (:name, :price, :description, :restaurant_id)");
    $maRequete->execute(['name' => $name, 'price' => $price, 'description' => $description, 'restaurant_id' => $restaurant_id]);
}


}



?>