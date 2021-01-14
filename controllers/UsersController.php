<?php
require_once('C:\xampp\htdocs\tppr\models\User.php');
require_once('C:\xampp\htdocs\tppr\views\includes\header.php');
require_once('C:\xampp\htdocs\tppr\app\classes\Session.php');
require_once('C:\xampp\htdocs\tppr\app\classes\Redirect.php');
class UsersController{
    public function auth(){
        if(isset($_POST["submit"])){
            $data["nom"] = $_POST["nom"];
            $result = User::login($data);
           // $result= $results[0];

            if($result->nom === $_POST["nom"] && $_POST["password"]===$result->mp){
                $_SESSION["logged"] = true;
                $_SESSION["prenom"] = $result->prenom;
                $_SESSION["nom"] = $result->nom;
               $_SESSION["admin"] = $result->admin;
                //echo"bravooo";
              //Redirect::to("home.php");
              header('location: ./index.php');
            }else{
               
                Session::set("error","Pseudo ou mot de passe est incorrect");
               //Redirect::to("login");
               //require('C:\xampp\htdocs\tppr\views\login.php');
               header('location: ./login.php');
               //echo"Pseudo ou mot de passe est incorrect";
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
            Session::set("success","Compte crée");
           // echo"suceee";
            //Redirect::to("login");
           header('location: ./login.php');
           //require('C:\xampp\htdocs\tppr\views\login.php');
        }else{
            //echo $result;
            Session::set("success",$result);
            header('location: ./register.php');

        }
    }
    public function logout(){
        session_destroy();
        header('location: ./index.php');
    }
}