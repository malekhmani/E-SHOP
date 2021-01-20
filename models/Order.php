<?php
require_once('..\database\DB.php');

class Order{
     
    static public function createOrder($data){
        
        $stmt = DB::connect()->prepare('INSERT INTO orders (client,produit,prix,qte,total)
            VALUES (:nom,:produit,:prix,:qte,:total)');
            $stmt->bindParam(':nom',$data['fullname']);
            $stmt->bindParam(':produit',$data['product']);
            $stmt->bindParam(':prix',$data['price']);
            $stmt->bindParam(':qte',$data['qte']);
            $stmt->bindParam(':total',$data['total']);
            if($stmt->execute()){
                return 'ok';
            }else{
                return 'error';
            }
            $stmt->close();
            $stmt = null;
    }
}