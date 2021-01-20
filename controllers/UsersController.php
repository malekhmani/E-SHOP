<?php
require_once('..\models\User.php');
require_once('..\views\includes\header.php');

class UsersController{
    public function auth(){
        if(isset($_POST["submit"])){
            $data["nom"] = $_POST["nom"];
            $result = User::login($data);
     
            if($result->nom === $_POST["nom"] && $_POST["password"]===$result->mp){
                $_SESSION["logged"] = true;
               // $_SESSION["prenom"] = $result->prenom;
                $_SESSION["nom"] = $result->nom;
                $_SESSION["admin"] = $result->admin;

               // if($_SESSION["nom"]=='admin'&& $_SESSION["prenom"]=='admin'){
             if($_SESSION["admin"] == '1' && $_SESSION["nom"]=='admin' && $_SESSION["logged"] = true){
                echo "<script type='text/javascript'>document.location.replace('admin/dashboard.php?r=o');</script>";
            }
               else{
                //header('location: ./index.php?result=con');

              echo "<script type='text/javascript'>document.location.replace('index.php?result=con');</script>";

            }
              


                //header('location: ./index.php?action=getAllProduct&&controller=AdminController');

               
               
              
            }else{
              
                echo "<script type='text/javascript'>document.location.replace('login.php?result=conf');</script>";

              // header('location: ./login.php?result=conf');
               
            }
        }
    }
    public function register(){
       
        //$mp = password_hash($_POST["mp"],PASSWORD_BCRYPT,$options);
        $r= User::getclient($_POST["nom"]);

        if($r->nom === $_POST["nom"] && $r->email===$_POST["email"]){
            echo "<script type='text/javascript'>document.location.replace('register.php?result=compteexiste');</script>";

        } 
        else{
        $data = array(
            "nom" => $_POST["nom"],
           // "prenom" => $_POST["prenom"],
            "email" => $_POST["email"],
            "password" => $_POST["password"],
            "telephone" => $_POST["telephone"],
            "adresse" => $_POST["adresse"],


        );
        
        $result = User::createUser($data);
        
        if($result === "ok"){
           //header('location: ./login.php?result=comptecree');
           echo "<script type='text/javascript'>document.location.replace('login.php?result=comptecree');</script>";

        }else{
            echo "<script type='text/javascript'>document.location.replace('register.php?result=comptefailed');</script>";

            //header('location: ./register.php?result=comptefailed');
        }
    }}
    public function logout(){
        session_destroy();
        echo "<script type='text/javascript'>document.location.replace('index.php?result=deconnexion');</script>";

       //header('location: ./index.php?result=deconnexion');
    }
}