<?php
require_once('C:\xampp\htdocs\tppr\models\Admin.php');
require_once('C:\xampp\htdocs\tppr\models\category.php');

class AdminController{
  
    public function getProductt(){
        $categories = category::getAll();
        $product = Admin::getProductById($_GET['ref_p']);
        $productToUpdate= $product[0]; 
     require ('C:\xampp\htdocs\tppr\views\admin\updatProduct.php');
   
}
    public function getAllProduct(){
        $products = Admin::getAll();
        require ('C:\xampp\htdocs\tppr\views\admin\products.php');  
    }

    public function getAllCategories(){
        $categories = category::getAll();
        //return $categories;
        require ('C:\xampp\htdocs\tppr\views\admin\addProduct.php');
    }
    
    public function updateProduct(){
        if(isset($_POST["submit"])){
            $oldImage = $_POST["product_current_image"];
            $data = array(
                "ref_p" => $_POST["reference"],
                "designation" => $_POST["Designation"],
                "qte_stock" => $_POST["Quantité"],
                "prix" => $_POST["Prix"],
                "photo" =>AdminController::uploadPhoto($oldImage),
                "tva" => $_POST["Tva"],
                "remise" => $_POST["Remise"],
                "categorie" => $_POST["categorie"],
                "description" => $_POST["Description"],
            );
            $result = Admin::editProduct($data);
            if($result === "ok"){
                Session::set("success","Produit modifié");
                header('location: ./index.php?action=getAllProduct&&controller=AdminController');
            }else{
                echo $result;
            }
        }
    }
    static public function uploadPhoto($oldImage = null){
        $dir = "admin/images";
        $time = time();
        $name = str_replace(' ','-',strtolower($_FILES["photo"]["name"]));
        $type = $_FILES["photo"]["type"];
        $ext = substr($name,strpos($name,'.'));
        $ext = str_replace('.','',$ext);
        $name = preg_replace("/\.[^.\s]{3,4}$/", "",$name);
        $imageName = $name.'-'.$time.'.'.$ext;
        if(move_uploaded_file($_FILES["photo"]["tmp_name"],$dir."/".$imageName)){
           return $imageName;
        }
        return $oldImage;}
  
    public function removeProduct(){
            $result = Admin::deleteProduct($_GET['id']);
            if($result === "ok"){
                Session::set("success","Produit supprimé");
                header('location: ./index.php?action=getAllProduct&&controller=AdminController');
            }else{
                echo $result;
            }
        }

        public function newProduct(){
            if(isset($_POST["submit"])){
                $data = array(
                    "ref_p" => $_POST["reference"],
                    "designation" => $_POST["Designation"],
                    "qte_stock" => $_POST["Quantité"],
                    "prix" => $_POST["Prix"],
                    "photo"=>AdminController::uploadPhoto(),
                    "tva" => $_POST["Tva"],
                    "remise" => $_POST["Remise"],
                    "categorie" => $_POST["categorie"],
                    "description" => $_POST["Description"],
                );
                
                $result = Admin::addProduct($data);
                if($result === "ok"){
                    Session::set("success","Produit ajouté");
                    header('location: ./index.php?action=getAllProduct&&controller=AdminController');}
                else{
                    
                    Session::set("success",$result);
                    header('location: ./index.php?action=getAllCategories&&controller=AdminController');
                }
            }
        }
    public function getAllOrders(){
        $orders = Admin::getAllor();   
        require ('C:\xampp\htdocs\tppr\views\admin\orders.php');
    }

    

    
}
?>