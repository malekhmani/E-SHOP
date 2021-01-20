<?php
require_once('..\models\Admin.php');
require_once('..\models\category.php');

class AdminController{
    public function da(){
        $products = Admin::getAll();
        require ('admin\dashboard.php');  
    }
    public function getProductt(){
        $categories = category::getAll();
        $product = Admin::getProductById($_GET['ref_p']);
        $productToUpdate= $product[0]; 
     require ('admin\updatProduct.php');
   
}
    public function getAllProduct(){
        $products = Admin::getAll();
        require ('admin\products.php');  
    }
    public function getAllOrders(){
        $orders = Admin::getAllor();   
        require ('admin\or.php');

    }
    public function getAllCategories(){
        $categories = category::getAll();
        require ('admin\addProduct.php');
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
                echo "<script type='text/javascript'>document.location.replace('index.php?action=getAllProduct&&controller=AdminController&&result=ups');</script>";

               // header('location: ./index.php?action=getAllProduct&&controller=AdminController&&reult=ups');
            }else{
                echo $result;
                //header('location: ./index.php?action=getAllProduct&&controller=AdminController&&reult=upf');
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
                echo "<script type='text/javascript'>document.location.replace('index.php?action=getAllProduct&&controller=AdminController&&result=pd');</script>";

               // header('location: ./index.php?action=getAllProduct&&controller=AdminController&&reuslt=pd');
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
                    echo "<script type='text/javascript'>document.location.replace('index.php?action=getAllProduct&&controller=AdminController&&result=pa');</script>";}

                    //header('location: ./index.php?action=getAllProduct&&controller=AdminController&&result=pa');}
                else{
                    
                    echo "<script type='text/javascript'>document.location.replace('index.php?action=getAllCategories&&controller=AdminController&&result=comptefailed');</script>";

                    //header('location: ./index.php?action=getAllCategories&&controller=AdminController&&result=comptefailed');
                }
            }
        }
  
    public function logout(){
        session_destroy();
        echo "<script type='text/javascript'>document.location.replace('index.php?result=deconnexion');</script>";

       //header('location: ./index.php?result=deconnexion');
    }
    

    
}
?>