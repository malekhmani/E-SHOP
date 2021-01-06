<?php
require_once('C:\xampp\htdocs\tppr\controllers\ProductController.php');
require_once('C:\xampp\htdocs\tppr\controllers\CategoriesController.php');

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

?>