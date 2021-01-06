<?php
require_once('C:\xampp\htdocs\tppr\controllers\OrdersController.php');
$order = new OrdersController();
foreach($_SESSION as $name => $product){
    if(substr($name,0,9) == "products_"){
       $data = array(
       "fullname" => $_SESSION["nom"],
        "product" => $product["title"],
        "qte" => $product["qte"],
        "price" => $product["price"],
        "total" => $product["total"]
       );
       $order->addOrder($data);
    }else{
        header('location: ./index.php');
    }
}