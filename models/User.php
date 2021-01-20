<?php
require_once('..\database\DB.php');
class User{

    public $nom = null;
    public $prenom = null;
    public $email = null;
    public $mp = null;
    
    static public function getclient($id){
       
         try{
             $stmt = DB::connect()->prepare('SELECT * FROM client WHERE nom = ?');
             $stmt->execute([$id]);
             $user = $stmt->fetch(PDO::FETCH_OBJ);
             return $user;
             
         }catch(PDOException $ex){
             echo "erreur " .$ex->getMessage();
         }
     } 
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
        if($data['nom']&& $data['email']&& $data['password']&& $data['telephone']&& $data['adresse']){
        $stmt = DB::connect()->prepare('INSERT INTO client (nom
        ,email,mp,telephone,adresse)
        VALUES (:nom,:email,:mp,:telephone,:adresse)');
       // $stmt->bindParam(':code',$data['code']);
        $stmt->bindParam(':nom',$data['nom']);
        $stmt->bindParam(':email',$data['email']);
        $stmt->bindParam(':mp',$data['password']);
        $stmt->bindParam(':telephone',$data['telephone']);
        $stmt->bindParam(':adresse',$data['adresse']);
       
        if($stmt->execute()){
            return 'ok';
        }}else{
            return 'veuillez remplir tous les champs';
        }
        $stmt->close();
        $stmt = null;
    }
}