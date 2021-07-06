<?php

namespace Controllers;


class Restaurant extends Controller
{
 protected $modelName = \Model\Restaurant::class;

    public function indexApi(){
        $restaurants = $this->model->findAll($this->modelName);
        header('Access-Control-Allow-Origin: *');
        
        echo json_encode($restaurants);
    }

    public function showApi()
    {
       
        $restaurant_id = null;
       if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
        $restaurant_id = $_GET['id'];
        }

       if (!$restaurant_id){
        die("il faut entrer un id dans l'url");
        }
        
        
        $restaurant = $this->model->find($restaurant_id, $this->modelName);
        
        $modelPlat = new \Model\Plat(); // recupère le model Plat
        $plats = $modelPlat->findAllByRestaurant($restaurant_id); //on doit passer le findAllByRestaurant pour que le plat se situe au bon restaurant_id
        header('Access-Control-Allow-Origin: *');

        echo json_encode(['restaurant' => $restaurant, 'plats' => $plats]); //car envoi une chaine de caractère pure
    }



}

?>