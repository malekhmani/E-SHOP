<?php
require_once('..\models\product.php');
require_once('..\models\category.php');
require_once('..\views\includes\header.php');

class ProductController{
    public function getAllProducts(){
        //$products = Product::getAll();
        $products = Product::g();
        $categories = category::getAll();
        $solde = Product::getSold();
        
        require ('home.php');
    }
    public function getp(){
        //$products = Product::getpluscomande();

        $products = Product::getAll();
        $categories = category::getAll();
        //return $products;
        
        require ('c.php');
    }

    public function getpls(){
        $products = Product::getpluscomande();
        $categories = category::getAll();
        //return $products;
        
        require ('c.php');
    }
    public function getpc(){
       
        $products = Product::getProductByCat($_GET['id']);
        $categories = category::getAll();
        require ('c.php');

    }
    public function getAllProduct(){
        $products = Product::getAll();
        return $products;
        
    }
    public function getProductsByCategory(){
       
            $products = Product::getProductByCat($_GET['id']);
            $categories = category::getAll();
            $solde = Product::getSold();
           require ('home.php');
        
    }
    public function checkout(){
        if(isset($_GET["ref_p"]) AND isset($_GET["product_title"]) AND isset($_GET["product_qte"]) ){
            $id = $_GET["ref_p"];
            $id1 = $_GET["product_title"];
            $id2 = $_GET["product_qte"];
            $id3 = $_GET["qte_stock"];
            $id4 = $_GET["prix"];
            $id5 = $_GET["photo"];
            if($_SESSION["products_".$id]["title"] == $id1){
                //$R="Vous avez déja ajouté ce produit au panier";
                //Session::set("success",$R);
                echo "<script type='text/javascript'>document.location.replace('cart.php?result=produitexiste');</script>";}

               // header('location: ./cart.php?result=produitexiste');}
            else{
                if($id3< $_GET["product_qte"]){
                  // $R="La quantité disponible est : $id3";
                  // Session::set("success",$R);
                   //header('location: ./index.php?result=qte');}
                   echo "<script type='text/javascript'>document.location.replace('index.php?result=qte');</script>";}

                    
                    else{
                        $_SESSION["products_".$id] = array(
                            "id" => $id,
                            "title" => $id1,
                            "price" => $id4,
                            "qte" => $id2,
                            "total" => $id4 * $id2,
                            "photo"=>$id5,
            
                            
                        );
                        $_SESSION["totaux"] += $_SESSION["products_".$id]["total"];
                        $_SESSION["count"] += 1;
                       
                       //header('location: ./cart.php');   
                       echo "<script type='text/javascript'>document.location.replace('cart.php');</script>";

                    }
                }
            }else{
                echo "<script type='text/javascript'>document.location.replace('cart.php');</script>";

                //header('location: ./cart.php');   
               
            }
     
    }
    public function getProduct(){
            $product = Product::getProductById($_GET['ref_p']);
            $products= $product[0];
           
         require ('show.php');
    
    }
     
    public function cancelcart(){
    foreach($_SESSION as $name => $product){
    if(substr($name,0,9) == "products_"){
        unset($_SESSION[$name]);
        unset($_SESSION["count"]);
        unset($_SESSION["totaux"]);
        echo "<script type='text/javascript'>document.location.replace('cart.php');</script>";

        //header('location: ./cart.php'); 
    }}}
  
           
    public function emptyCart($id,$price){
        unset($_SESSION["products_".$id]);
        $_SESSION["count"] -= 1;
        $_SESSION["totaux"] -= $price;
        echo "<script type='text/javascript'>document.location.replace('cart.php');</script>";

       // header('location: ./cart.php');   
    }
    
}