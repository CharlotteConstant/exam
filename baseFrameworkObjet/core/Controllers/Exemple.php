<?php

namespace Controllers;


class Exemple extends Controller
{
   // protected $modelName = \Model\Gateau::class;
   
    /**
     * affiche tous les gateaux
     */
    public function index(){
       
        //$userModel= new \Model\User();
        //$user = $userModel->getUser();
       // $donneesExemple = $this->model->findAll($this->modelName);
        //on fixe le titre de la page
        //$titreDeLaPage = "le titre de la page";

        //on affiche
       // \Rendering::render( "exemples/exemple", compact('user', 'donneesExemple', 'titreDeLaPage'));

    }


     public function indexApi(){
       
       // $userModel= new \Model\User();
       // $user = $userModel->getUser();
       // $donneesExemple = $this->model->findAll($this->modelName);
        //$donneesExemple = ["truc1" => "quelquechose", "truc2" => "autrechose"];

       // header('Access-Control-Allow-Origin: *');
        
        //echo json_encode($donneesExemple);

    }



        /**
     * supprime un gateau
     */
    public function suppr()
    {
         // $exemple_id = null;
        //verifie qu'il ne soit pas vide et que c'est un nombre
        //if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
       // $exemple_id = $_GET['id'];
       // }

       // if(!$exemple_id){
       // die("il faut rentrer un id valide en parametre dans l'url");
       //}


        //verifie que le gateau existe bien dans la base de données
       
        //$exemple = $this->model->find($exemple_id, $this->modelName );

       
        //si le gateau existe bien on fait la requete de suppression

       // $this->model->delete($exemple_id);

       // \Http::redirect('index.php?controller=gateau&task=index');
    }

      /**
     * montre un gateau
     */
    public function show()
    {
        //$userModel = new \Model\User();
        //$user = $userModel->getUser();
      //  $exemple_id = null;
       // if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
       // $exemple_id = $_GET['id'];
       // }

        
        
       // $unObjetExemple = $this->model->find($exemple_id, $this->modelName);
       // $titreDeLaPage = $unObjetExemple->name;
       // $modelAutreExemple = new \Model\AutreExemple(); // recupère le model Recette
       // $autresDonnees = $modelAutreExemple->findAllByGateau($exemple_id); //on doit passer le findAllByGateau pour que la recette se situe au bon gateau_id
        
       
       // \Rendering::render('exemples/exemple', compact('user', 'unObjetExemple', 'autresDonnees', 'titreDeLaPage'));
    }

public function showApi()
    {
        //$userModel = new \Model\User();
        //$user = $userModel->getUser();
        //$exemple_id = null;
       //if(!empty($_GET['id']) && ctype_digit($_GET['id']) ){
        //$exemple_id = $_GET['id'];
        //}
        
        
       // $exemple = $this->model->find($exemple_id, $this->modelName);
        
        //$modelAutreExemple = new \Model\AutreExemple(); // recupère le model Recette
        //$autresDonnees = $modelAutreExemple->findAllByExemple($exemple_id); //on doit passer le findAllByGateau pour que la recette se situe au bon gateau_id
        //header('Access-Control-Allow-Origin: *');

       // echo json_encode(['exemple' => $exemple, 'autresDonnees' => $autresDonnees]); //car envoi une chaine de caractère pure
    }




   

}

?>