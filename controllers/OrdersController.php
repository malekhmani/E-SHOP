<?php
require_once('C:\xampp\htdocs\tppr\models\product.php');
require_once('C:\xampp\htdocs\tppr\models\category.php');
require_once('C:\xampp\htdocs\tppr\models\Order.php');
require_once('C:\xampp\htdocs\tppr\views\includes\header.php');
require_once('C:\xampp\htdocs\tppr\app\classes\Session.php');
class OrdersController{
    public function getAllOrders(){
        $orders = Order::getAll();
        return $orders;
    }
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
            Session::set("success","Commande effectuée");
            header('location: ./index.php'); 
        }
                }}}else{
                    Session::set("success","Vous devez connectez pour terminer vos achat");
                    header('location: ./login.php');
                
            
            }
        
        
    }
}