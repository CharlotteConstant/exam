<?php 

namespace Model;

require_once "core/autoloading.php";

class Restaurant extends Model 
{
protected $table = "restaurants";
public $id;
public $name;
public $address;


/**
 * Ajoute un restaurant
 *
 * @param string $name
 * @param string $address
 * 
 * @return void
 */

    public function insert(string $name, string $address): void
    {
  
    $maRequete = $this->pdo->prepare("INSERT INTO restaurants(name, address) VALUES (:name, :address)");
    $maRequete->execute(['name' => $name, 'address' => $address]);

    }
}

?>