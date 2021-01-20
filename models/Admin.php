
<?php
require_once('..\database\DB.php');

class Admin{
  
    

        static public function getAll(){
            $stmt = DB::connect()->prepare('SELECT * FROM produit');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Admin'); 
            $stmt->close();
            $stmt =null;
        }
        static public function getAllor(){
            $stmt = DB::connect()->prepare('SELECT * FROM orders');
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Admin'); 
            $stmt->close();
            $stmt =null;
        }
        static public function getProductById($data){
            try{
                $stmt = DB::connect()->prepare('SELECT * FROM produit WHERE ref_p = ?');
                $stmt->execute([$data]);
                return $stmt->fetchAll(PDO::FETCH_CLASS, 'Admin');
               $stmt->close();
               $stmt =null;
            }catch(PDOException $ex){
                echo "erreur " .$ex->getMessage();
            }
        }
static public function addProduct($data){
        if($data['ref_p']&&$data['designation']&&$data['prix']&&$data['qte_stock']&&$data['photo']&&$data['categorie']&&$data['tva']&&$data['remise']&&$data['description']){
        $stmt = DB::connect()->prepare('INSERT INTO produit (ref_p,designation,qte_stock
        ,prix,photo,tva,remise,categorie,description) VALUES (:ref_p,:designation,:qte_stock,:prix,
        :photo,:tva,:remise,:categorie,:description)');
        $stmt->bindParam(':ref_p',$data['ref_p']);
        $stmt->bindParam(':designation',$data['designation']);
        $stmt->bindParam(':qte_stock',$data['qte_stock']);
        $stmt->bindParam(':prix',$data['prix']);
        $stmt->bindParam(':photo',$data['photo']);
        $stmt->bindParam(':tva',$data['tva']);
        $stmt->bindParam(':remise',$data['remise']);
        $stmt->bindParam(':categorie',$data['categorie']);
        $stmt->bindParam(':description',$data['description']);
        if($stmt->execute()){
            return 'ok';
        }}else{
            return 'erreur';
        }
        $stmt->close();
        $stmt = null;
    }
    static public function editProduct($data){
        $stmt = DB::connect()->prepare('UPDATE produit SET
                designation = :designation,
                qte_stock=:qte_stock,
                prix=:prix,
                photo=:photo,
                tva=:tva,
                remise=:remise,
                categorie=:categorie,
                description=:description
                WHERE ref_p=:ref_p
        ');
        $stmt->bindParam(':ref_p',$data['ref_p']);
        $stmt->bindParam(':designation',$data['designation']);
        $stmt->bindParam(':qte_stock',$data['qte_stock']);
        $stmt->bindParam(':prix',$data['prix']);
        $stmt->bindParam(':photo',$data['photo']);
        $stmt->bindParam(':tva',$data['tva']);
        $stmt->bindParam(':remise',$data['remise']);
        $stmt->bindParam(':categorie',$data['categorie']);
        $stmt->bindParam(':description',$data['description']);
      
        if($stmt->execute()){
            return 'ok';
        }else{
            return 'error';
        }
        $stmt->close();
        $stmt = null;
    }
    static public function deleteProduct($data){
        try{
            $stmt = DB::connect()->prepare('DELETE FROM produit WHERE ref_p = ?');
           $stmt->execute([$data]);
            if($stmt->execute()){
                return 'ok';
            }else{
                return 'error';
            }
            $stmt->close();
            $stmt =null;
        }catch(PDOException $ex){
            echo "erreur " .$ex->getMessage();
        }
    }
    /*static public function getAllor(){
        $stmt = DB::connect()->prepare('SELECT * FROM orders');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }*/
   
   
}