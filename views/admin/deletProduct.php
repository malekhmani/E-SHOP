<?php
require_once('C:\xampp\htdocs\tppr\controllers\ProductController.php');
//require_once('C:\xampp\htdocs\tppr\controllers\OrdersController.php');
require_once('C:\xampp\htdocs\tppr\models\product.php');
require_once('C:\xampp\htdocs\tppr\controllers\CategoriesController.php');

require_once('C:\xampp\htdocs\tppr\views\includes\header.php');
if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true){
    $data = new ProductController();
    $data->removeProduct();
}else{
    header('location: ./home.php');}
    ?>