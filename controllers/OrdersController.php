<?php
require_once('..\models\Order.php');
require_once('..\views\includes\header.php');
class OrdersController{


    public function addOrder(){
        if(isset($_SESSION["logged"])){
            foreach($_SESSION as $name => $product){
                if(substr($name,0,9) == "products_"){
                   $data = array(
                   "fullname" => $_SESSION["nom"],
                    "product" => $product["title"],
                    "qte" => $product["qte"],
                    "price" => $product["price"],
                    "total" => $product["total"]
                   );
                   $result = Order::createOrder($data);
        if($result === "ok"){
            foreach($_SESSION as $name => $product){
                if(substr($name,0,9) == "products_"){
                    unset($_SESSION[$name]);
                    unset($_SESSION["count"]);
                    unset($_SESSION["totaux"]);
                }
            }
           
            echo "<script type='text/javascript'>document.location.replace('index.php?result=cmdsucces');</script>";

            //header('location: ./index.php?result=cmdsucces'); 
        }
                }}}else{
                    echo "<script type='text/javascript'>document.location.replace('login.php?result=cmdfailed');</script>";
 
                    //header('location: ./login.php?result=cmdfailed');
                    
                
            
            }
        
        
    }
}