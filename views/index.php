<?php
//require_once('C:\xampp\htdocs\tppr\views\autoload.php');
//require_once('C:\xampp\htdocs\tppr\controllers\HomeController.php');
require_once('C:\xampp\htdocs\tppr\controllers\ProductController.php');
require_once('C:\xampp\htdocs\tppr\controllers\routeur.php');
require_once('C:\xampp\htdocs\tppr\models\product.php');
require_once('C:\xampp\htdocs\tppr\views\includes\header.php');
//require_once('C:\xampp\htdocs\tppr\controllers\AdminController.php');
//require_once('C:\xampp\htdocs\tppr\views\includes\header.php');


/*$home = new HomeController();

//$home->index('home');
$pages =['home','cart','dashboard','updateProduct','deleteProduct', 'addProduct',
'emptyCart','show','cancelCart','register', 
'login','checkout','logout','products','orders','addOrder' ];

if(isset($_GET['page'])) { 
    if(in_array($_GET['page'],$pages)){
         $page=$_GET['page'];
         if($page === "dashboard" || $page === "deleteProduct" || $page ==="addProduct" || $page ==="products" || $page === "orders")
         {
              if(isset( $_SESSION['admin']) && $_SESSION ['admin'] ==true)
              {
                  $admin=new AdminController();
                  $admin->index($page);
         } else{
             include('C:\xampp\htdocs\tppr\views\includes\404.php');
         }
        }else{
            $home->index($page);
        }
    }else{
        include('C:\xampp\htdocs\tppr\views\includes\404.php');
    }
}else{
    require('C:\xampp\htdocs\tppr\controllers\routeur.php');
   // $home->index('home');
}
//echo "pkkkkkkkkkk"<?php require ("controller/routeur.php") ;
*/

$routeur = new Routeur();
$routeur->routerRequete();
//;
require_once('C:\xampp\htdocs\tppr\views\includes\footer.php');