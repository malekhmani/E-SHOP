<?php
require_once('C:\xampp\htdocs\tppr\controllers\UsersController.php');
//require_once('C:\xampp\htdocs\tppr\models\product.php');
require_once('C:\xampp\htdocs\tppr\views\includes\header.php');
require_once('C:\xampp\htdocs\tppr\app\classes\Redirect.php');
$user = new UsersController();
$user->logout();
header('location: ./index.php');