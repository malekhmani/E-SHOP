<?php
require_once('C:\xampp\htdocs\tppr\views\includes\header.php');
require_once('C:\xampp\htdocs\tppr\app\classes\Redirect.php');
require_once('C:\xampp\htdocs\tppr\app\classes\Session.php');
require_once('C:\xampp\htdocs\tppr\controllers\ProductController.php');
if(isset($_GET["ref_p"]) AND isset($_GET["product_title"]) AND isset($_GET["product_qte"]) ){
    $id = $_GET["ref_p"];
    $id1 = $_GET["product_title"];
    $id2 = $_GET["product_qte"];
    $id3 = $_GET["qte_stock"];
    $id4 = $_GET["prix"];
   

    /* echo $id;echo $id1;echo $id2;echo $id3;*/
    $data = new ProductController();
    $product = $data->getProduct();

    if($_SESSION["products_".$id]["title"] == $id1){
       
       Session::set("info","Vous avez déja ajouté ce produit au panier");
       //echo"Vous avez déja ajouté ce produit au panier";
       exit(header('location: ./cart.php'));
       ?>
       <script> location.replace("cart.php"); </script>
       
       <?php
    }else{
        if($id3< $_GET["product_qte"]){
            
            //Session::set("info","La quantité disponible est : $id3");
  //setcookie("info","La quantité disponible est :"<?php $product->qte_stock,time()+5,"/");
           //header('location: ./cart.php');   
           echo"La quantité disponible est : $id3";       
  //Redirect::to("cart");
        }else{
            $_SESSION["products_".$id] = array(
                "id" => $id,
                "title" => $id1,
                "price" => $id4,
                "qte" => $id2,
                "total" => $id4 * $id2,

                
            );
            $_SESSION["totaux"] += $_SESSION["products_".$id]["total"];
            $_SESSION["count"] += 1;
           // Redirect::to("cart");
           //print_r($_SESSION);
           header('location: ./cart.php');   
        }
    }
}else{
    header('location: ./cart.php');   
    //Redirect::to("cart");
}