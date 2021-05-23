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
                echo "<script type='text/javascript'>document.location.replace('dash.php?r=o');</script>";
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
public function contactus(){
        if(isset($_POST['btn-send']))
    {
       $UserName = $_POST['name'];
       $Subject = $_POST['subject'];
       
       $Phone = $_POST['phone'];
       $Msg = $_POST['message'];
             // $headers .= 'From: Your name <dridiikram000@gmail.com>' . "\r\n";

       $headers =  'MIME-Version: 1.0' . "\r\n"; 
       $headers .= 'From: Your name <'.$Email = $_POST["email"]; '>' . "\r\n";
       $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
       if(empty($UserName) || empty($Email) || empty($Subject) || empty($Phone) || empty($Msg))
       {
        echo "<script type='text/javascript'>document.location.replace('contact.php?result=comptefailed');</script>";
    }
       else
       {
           $to = "dridiikram000@gmail.com";
           //$header=$Email;
           if(mail($to,$Subject,$Msg,$headers))
           {
            echo "<script type='text/javascript'>document.location.replace('contact.php?result=msgenvoyer');</script>";
        }
       }
    }
    else
    {
        echo "<script type='text/javascript'>document.location.replace('contact.php');</script>";
    }
}
}
