<?php

class Order{
     static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM les_commandes');
        $stmt->execute();
        return $stmt->fetchAll();
        $stmt->close();
        $stmt =null;
    }
    static public function createOrder($data){
        
        $stmt = DB::connect()->prepare('INSERT INTO les_commandes (nom,prix,qte,total,produit)
            VALUES (:nom,:prix,:qte,:total,:produit)');
            $stmt->bindParam(':nom',$data['fullname']);
            $stmt->bindParam(':prix',$data['price']);
            $stmt->bindParam(':qte',$data['qte']);
            $stmt->bindParam(':total',$data['total']);
            $stmt->bindParam(':produit',$data['product']);
            if($stmt->execute()){
                return 'ok';
            }else{
                return 'error';
            }
            $stmt->close();
            $stmt = null;
    }
}