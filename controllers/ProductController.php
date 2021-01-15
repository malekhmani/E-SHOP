<?php
require_once('C:\xampp\htdocs\tppr\models\product.php');
require_once('C:\xampp\htdocs\tppr\models\category.php');
require_once('C:\xampp\htdocs\tppr\views\includes\header.php');

class ProductController{
    public function getAllProducts(){
        $products = Product::getAll();
        $categories = category::getAll();
        
        require ('C:\xampp\htdocs\tppr\views\home.php');
    }
    public function getAllProduct(){
        $products = Product::getAll();
        return $products;
        
    }
    public function getProductsByCategory(){
       
            $products = Product::getProductByCat($_GET['id']);
            $categories = category::getAll();
       
           require ('C:\xampp\htdocs\tppr\views\home.php');
        
    }
    public function checkout(){
        if(isset($_GET["ref_p"]) AND isset($_GET["product_title"]) AND isset($_GET["product_qte"]) ){
            $id = $_GET["ref_p"];
            $id1 = $_GET["product_title"];
            $id2 = $_GET["product_qte"];
            $id3 = $_GET["qte_stock"];
            $id4 = $_GET["prix"];
            if($_SESSION["products_".$id]["title"] == $id1){
                //$R="Vous avez déja ajouté ce produit au panier";
                //Session::set("success",$R);
                header('location: ./cart.php?result=produitexiste');}
            else{
                if($id3< $_GET["product_qte"]){
                  // $R="La quantité disponible est : $id3";
                  // Session::set("success",$R);
                   header('location: ./index.php?result=qte');}
                    
                    else{
                        $_SESSION["products_".$id] = array(
                            "id" => $id,
                            "title" => $id1,
                            "price" => $id4,
                            "qte" => $id2,
                            "total" => $id4 * $id2,
            
                            
                        );
                        $_SESSION["totaux"] += $_SESSION["products_".$id]["total"];
                        $_SESSION["count"] += 1;
                       
                       header('location: ./cart.php');   
                    }
                }
            }else{
                header('location: ./cart.php');   
               
            }
     
    }
    public function getProduct(){
            $product = Product::getProductById($_GET['ref_p']);
            $products= $product[0];
           
         require ('C:\xampp\htdocs\tppr\views\show.php');
    
    }
     
    public function cancelcart(){
    foreach($_SESSION as $name => $product){
    if(substr($name,0,9) == "products_"){
        unset($_SESSION[$name]);
        unset($_SESSION["count"]);
        unset($_SESSION["totaux"]);
        header('location: ./cart.php'); 
    }}}
  
           
    public function emptyCart($id,$price){
        unset($_SESSION["products_".$id]);
        $_SESSION["count"] -= 1;
        $_SESSION["totaux"] -= $price;
        header('location: ./cart.php');   
    }
    /*public function newProduct(){
        if(isset($_POST["submit"])){
            $data = array(
                "ref_p" => $_POST["reference"],
                "designation" => $_POST["Designation"],
                "qte_stock" => $_POST["Quantité"],
                "prix" => $_POST["Prix"],
                "photo"=>$this->uploadPhoto(),
                "tva" => $_POST["Tva"],
                "remise" => $_POST["Remise"],
                "categorie" => $_POST["categorie"],
                "description" => $_POST["Description"],
            );
            
            $result = Product::addProduct($data);
            if($result === "ok"){
                Session::set("success","Produit ajouté");
                header('location: ./products.php');}
            else{
                
                Session::set("success",$result);
                header('location: ./addProduct.php');
            }
        }
    }
    public function updateProduct(){
        if(isset($_POST["submit"])){
            $oldImage = $_POST["product_current_image"];
            $data = array(
                "ref_p" => $_POST["reference"],
                "designation" => $_POST["Designation"],
                "qte_stock" => $_POST["Quantité"],
                "prix" => $_POST["Prix"],
               
                "photo" => $this->uploadPhoto($oldImage),
                "tva" => $_POST["Tva"],
                "remise" => $_POST["Remise"],
                "categorie" => $_POST["categorie"],
                "description" => $_POST["Description"],
            );
            $result = Product::editProduct($data);
            if($result === "ok"){
                Session::set("success","Produit modifié");
                header('location: ./products.php');
            }else{
                echo $result;
            }
        }
    }
    public function uploadPhoto($oldImage = null){
        
        
        $dir = "images";
        $time = time();
        $name = str_replace(' ','-',strtolower($_FILES["photo"]["name"]));
        $type = $_FILES["photo"]["type"];
        //$target="img/".basename($_FILES["Photo"]["name"]);
        $ext = substr($name,strpos($name,'.'));
        $ext = str_replace('.','',$ext);
        $name = preg_replace("/\.[^.\s]{3,4}$/", "",$name);
        $imageName = $name.'-'.$time.'.'.$ext;
        if(move_uploaded_file($_FILES["photo"]["tmp_name"],$dir."/".$imageName)){
           return $imageName;
        }
        return $oldImage;}

    public function removeProduct(){
       
            $result = Product::deleteProduct($_GET['id']);
            if($result === "ok"){
                Session::set("success","Produit supprimé");
                header('location: ./products.php');
            }else{
                echo $result;
            }
        }
    //}*/
}