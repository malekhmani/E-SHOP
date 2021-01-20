<?php
require_once('C:\xampp\htdocs\tppr\database\DB.php');
class User{

    public $nom = null;
    public $prenom = null;
    public $email = null;
    public $mp = null;
    

    static public function login($data){
        $username = $data["nom"];
        try {
            $query = "SELECT * FROM client WHERE nom = :username";
            $stmt = DB::connect()->prepare($query);
            $stmt->execute(array(":username"=>$username));
            $user = $stmt->fetch(PDO::FETCH_OBJ);
            return $user;
        } catch (PDOException $ex) {
            echo "error : ".$ex.getMessage();
        }
    }

    static public function createUser($data){
        if($data['nom']&&$data['prenom']&&$data['email']&&$data['password']){
        $stmt = DB::connect()->prepare('INSERT INTO client (nom
        ,prenom,email,mp)
        VALUES (:nom,:prenom,:email,:mp)');
       // $stmt->bindParam(':code',$data['code']);
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':prenom',$data['prenom']);
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':mp',$data['password']);
        if($stmt->execute()){
            return 'ok';
        }}else{
            return 'veuillez remplir tous les champs';
        }
        $stmt->close();
        $stmt = null;
    }
}