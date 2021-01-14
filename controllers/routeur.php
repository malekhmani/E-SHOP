<?php
require_once('C:\xampp\htdocs\tppr\controllers\ProductController.php');
require_once('C:\xampp\htdocs\tppr\controllers\CategoriesController.php');
require_once('C:\xampp\htdocs\tppr\controllers\OrdersController.php');
require_once('C:\xampp\htdocs\tppr\controllers\UsersController.php');
require_once('C:\xampp\htdocs\tppr\controllers\AdminController.php');


/*
//On recupère l'action passée dans l'URL
if (isset($_GET["action"]) && !empty($_GET["action"])){
	$action = $_GET['action'];
}
else{ 
	$action= "getAllProducts";
}
if (isset($_POST["submitProduit"])){
	$action = $_POST['action'];
}
if (isset($_GET["ref_p"])){
	$action = "getProduct";}

	
ProductController::$action(); // Appel de la méthode statique $action de ControllerVoiture
//CategoriestController::$getAllCategories();
*/



class Routeur{
	public function routerRequete(){

			if (isset($_GET["cancel"])){
				$action =$_GET['action'];
				$id = $_GET["product_id"];
                $price = $_GET["product_price"];
				ProductController::$action($id,$price);}
		if (isset($_GET["action"]) && !empty($_GET["action"]) && isset($_GET["controller"]) && !empty($_GET["controller"])){
			$action = $_GET['action'];
			$controller = $_GET['controller'];
			$controller::$action();}
		
		if ((!isset($_GET["action"]))&&(!isset($_GET["controller"]))){ProductController::getAllProducts();}
}
}