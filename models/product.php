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
    static public function g(){
        $stmt = DB::connect()->prepare( "SELECT * from produit where designation in (select produit from orders group by produit having COUNT('produit') >1)
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_CLASS, 'Product'); 
        $stmt->close();
        $stmt =null;} 
    static public function getSold(){
        $stmt = DB::connect()->prepare('SELECT * FROM produit where remise!=0');
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
    
    
}