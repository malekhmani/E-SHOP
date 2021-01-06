<?php
require_once('C:\xampp\htdocs\tppr\controllers\ProductController.php');
$id = $_GET["product_id"];
$price = $_GET["product_price"];
$data = new ProductController();
$data->emptyCart($id,$price);