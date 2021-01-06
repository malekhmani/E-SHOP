<?php
require_once('C:\xampp\htdocs\tppr\database\DB.php');

class Product{
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM produit');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Product'); 
       // return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
       // $result=$conn->query("SELECT * FROM produit");
		

    }
    static public function getProductByCat($id){
       // $id = $data['id'];
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM produit WHERE categorie = ?');
            $stmt->execute([$id]);
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Product'); 
            //return $stmt->fetchAll();
            $stmt->close();
            $stmt =null;
        }catch(PDOException $ex){
            echo "erreur " .$ex->getMessage();
        }
    }
    static public function getProductById($data){
        //$id = $data['id'];
        try{
            $stmt = DB::connect()->prepare('SELECT * FROM produit WHERE ref_p = ?');
            //$stmt->execute([$ref]);
            $stmt->execute([$data]);
           //$product = $stmt->fetch(PDO::FETCH_OBJ);
           // $product = $stmt->fetchAll();
            //return $product;
            return $stmt->fetchAll(PDO::FETCH_CLASS, 'Product');
          
           //return $stmt->fetchAll();
            
           $stmt->close();
           $stmt =null;
        }catch(PDOException $ex){
            echo "erreur " .$ex->getMessage();
        }
    }
    static public function addProduct($data){
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
        }else{
            return 'error';
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
        $id = $data['id'];
        try{
            $stmt = DB::connect()->prepare('DELETE FROM produit WHERE ref_p = ?');
           // $stmt->execute(array(":id" => $id));
           $stmt->execute([$data]);
            $product = $stmt->fetch(PDO::FETCH_OBJ);
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
}