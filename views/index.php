<?php
//require_once('C:\xampp\htdocs\tppr\views\autoload.php');
//require_once('C:\xampp\htdocs\tppr\controllers\HomeController.php');
require_once('C:\xampp\htdocs\tppr\controllers\ProductController.php');
require_once('C:\xampp\htdocs\tppr\controllers\routeur.php');
require_once('C:\xampp\htdocs\tppr\models\product.php');
require_once('C:\xampp\htdocs\tppr\views\includes\header.php');


$routeur = new Routeur();
$routeur->routerRequete();
//;
require_once('C:\xampp\htdocs\tppr\views\includes\footer.php');