<?php 

namespace Model;

require_once "core/autoloading.php";

class User extends Model {

    protected $table = "users";
    public $username;
    public $password;
    public $id;
    public $email;

  

    public function findByUsername(string $username){
        $maRequete = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
        $maRequete->execute(['username' => $username]);

        $user = $maRequete->fetchObject(\Model\User::class);
        if(!$user){
            return false;
        }else{
            return $user;
        }

    }

    public function signIn($username, $password)
    {
        $user = $this->findByUsername($username);
        if(!$user){
            die('existe pas');
        }
        if ($password == $user->password){

            $_SESSION['user'] = ["id" => $user->id, "username" => $user->username, "mail" => $user->mail];
            return true;
        } else{
            return false;
        }
    }

    public function signOut()
    {
        session_unset();
    }

   
    public function isLoggedIn(){
        if(isset($_SESSION['user']) && !empty($_SESSION['user']['id'])){
        return true;
        }else{
        return false;
        }
    }

    public function getUser(){

        if ($this->isLoggedIn()){
        $user = $this->find($_SESSION['user']['id'], \Model\User::class); //tableau dans un tableau
        return $user;
        }else {
        return false;
        }
    }

      public function signUp(string $username, string $email, string $password)
       {

        $maRequete = $this->pdo->prepare("INSERT INTO users (username, password, mail) 
        VALUES (:username, :password, :mail)");

          $maRequete->execute([
          'username' => $username,
          'password' => $password,
          'mail' => $email
       

          ]);

       }
       /**
        * est-ce que je suis l'auteur de ca? ca est le parametre: une recette ou un gateau
        */
       /*public function isAuthor(Gateau|Recette $gateauOuRecette)*/
       public function isAuthor(object $gateauOuRecette)
       {
            //on veut comparer $this->id au user_id
            if($this->id == $gateauOuRecette->user_id){
                return true;
            }else{
                return false;
            }
       }
    
    
}

?>