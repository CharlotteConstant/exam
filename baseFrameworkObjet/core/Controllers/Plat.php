<?php

namespace Controllers;

class Plat extends Controller
{
    protected $modelName = \Model\Plat::class;

    public function supprApi(){
       if(!empty($_POST['id']) && ctype_digit($_POST['id']) ){
          $plat_id = $_POST['id'];
        }
        
        $plat = $this->model->find($plat_id, $this->modelName);

        $this->model->delete($plat_id);

        echo json_encode($plat_id);
    }

    public function createApi(){
        if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['description']) &&!empty($_POST['restaurantId']) && ctype_digit($_POST['restaurantId'])){
        $restaurant_id = $_POST['restaurantId'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];

        $this->model->insert($name, $price, $description, $restaurant_id);

        echo json_encode($restaurant_id);
    
        }
    }
}


?>