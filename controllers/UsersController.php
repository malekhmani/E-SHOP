<?php
require_once('C:\xampp\htdocs\tppr\models\User.php');
require_once('C:\xampp\htdocs\tppr\views\includes\header.php');

class UsersController{
    public function auth(){
        if(isset($_POST["submit"])){
            $data["nom"] = $_POST["nom"];
            $result = User::login($data);
     
            if($result->nom === $_POST["nom"] && $_POST["password"]===$result->mp){
                $_SESSION["logged"] = true;
                $_SESSION["prenom"] = $result->prenom;
                $_SESSION["nom"] = $result->nom;
               $_SESSION["admin"] = $result->admin;
               
              header('location: ./index.php?result=con');
              
            }else{
              
               
               header('location: ./login.php?result=conf');
               
            }
        }
    }
    public function register(){
        $options = [
            "cost" => 12
        ];
        //$mp = password_hash($_POST["mp"],PASSWORD_BCRYPT,$options);
        $data = array(
            "nom" => $_POST["nom"],
            "prenom" => $_POST["prenom"],
            "email" => $_POST["email"],
            "password" => $_POST["password"],
        );
        
        $result = User::createUser($data);
        if($result === "ok"){
           header('location: ./login.php?result=comptecree');
        }else{
            header('location: ./register.php?result=comptefailed');
        }
    }
    public function logout(){
        session_destroy();
    
       header('location: ./index.php?result=deconnexion');
    }
}