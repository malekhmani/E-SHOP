<?php
require_once('C:\xampp\htdocs\tppr\models\product.php');
require_once('C:\xampp\htdocs\tppr\models\category.php');
//require_once('C:\xampp\htdocs\tppr\images');
require_once('C:\xampp\htdocs\tppr\views\includes\header.php');
require_once('C:\xampp\htdocs\tppr\app\classes\Session.php');
require_once('C:\xampp\htdocs\tppr\app\classes\Redirect.php');
class ProductController{
    public function getAllProducts(){
        $products = Product::getAll();
        $categories = category::getAll();
        //return $products;
        
        require ('C:\xampp\htdocs\tppr\views\home.php');
    }
    public function getAllProduct(){
        $products = Product::getAll();
        //require ('C:\xampp\htdocs\tppr\views\admin\products.php');
        return $products;
        
    }
    public function getProductsByCategory(){
        /*if(isset($id)){
            $data = array(
                'id' => $id
            );*/
            $products = Product::getProductByCat($_GET['id']);
            $categories = category::getAll();
           // return $products;
           require ('C:\xampp\htdocs\tppr\views\home.php');
        
    }
    public function getProduct(){
        /*if(isset($_POST["ref_p"])){
            $data = array(
                'id' => $_POST["ref_p"]
            );*/
            $product = Product::getProductById($_GET['ref_p']);
            $products= $product[0];
           //return $products;
           //var_dump($products);
         require ('C:\xampp\htdocs\tppr\views\show.php');
       // }
    }
     public function getProductt(){
        /*if(isset($_POST["ref_p"])){
            $data = array(
                'id' => $_POST["ref_p"]
            );*/
            $product = Product::getProductById($_GET['ref_p']);
            $productToUpdate= $product[0];
           return $productToUpdate;
           //var_dump($products);
         require ('C:\xampp\htdocs\tppr\views\admin\updatProduct.php');
       // }
    }/*
     public function getProduct(){
       /* if(isset($_POST["product_id"])){
            $data = array(
                'id' => $_POST["product_id"]
            );*/
           // if(isset($_GET["ref"])){
           // $product = Product::getProductById($_GET['ref']);
         //return $product;
         //include_once ('C:\xampp\htdocs\tppr\views\show.php');
        
    //}}
    public function emptyCart($id,$price){
        unset($_SESSION["products_".$id]);
        $_SESSION["count"] -= 1;
        $_SESSION["totaux"] -= $price;
        header('location: ./cart.php');   
        //Redirect::to("cart");
    }
    public function newProduct(){
        if(isset($_POST["submit"])){
            $data = array(
                "ref_p" => $_POST["reference"],
                "designation" => $_POST["Designation"],
                "qte_stock" => $_POST["Quantité"],
                "prix" => $_POST["Prix"],
                //"photo" => $_POST["photo"],
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
                echo $result;
            }
        }
    }//$this->uploadPhoto(),
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
   /*if(move_uploaded_file($_FILES["Photo"]["tmp_name"],$target)){
       $msj="suuucc";
   }
        else{
            $msj="noooo";
        }
   // }*/
  /* $uploads_dir = 'images';
$name = $_FILES['photo']['name'];
if (is_uploaded_file($_FILES['photo']['tmp_name']))
{       
    //in case you want to move  the file in uploads directory
     move_uploaded_file($_FILES['photo']['tmp_name'], $uploads_dir.$name);
     echo 'moved file to destination directory';
     
}
    }*/
    public function removeProduct(){
        /*if(isset($_POST["delete_product_id"])){
            $data = array(
                "id" => $_POST["delete_product_id"]
            );*/
            $result = Product::deleteProduct($_GET['id']);
            if($result === "ok"){
                Session::set("success","Produit supprimé");
                header('location: ./products.php');
            }else{
                echo $result;
            }
        }
    //}
}