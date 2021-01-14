<?php
require_once('C:\xampp\htdocs\tppr\controllers\ProductController.php');
require_once('C:\xampp\htdocs\tppr\controllers\CategoriesController.php');
require_once('C:\xampp\htdocs\tppr\views\includes\header.php');

/*if(isset($_SESSION['admin']) && $_SESSION['admin'] == true){
    $categories = new CategoriesController();
        $categories = $categories->getAllCategorie();
        /*if(isset($_POST["submit"])){
            $product = new ProductController();
            $product =$product->newProduct();
            
        }
    }else{
       // header('location: ./home.php');
    }*/
 
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Ajouter un produit
                    </h3>
                </div>
                <div class="card-body">
                    <form method="post" action="index.php?action=newProduct&&controller=AdminController"class="mr-1" enctype="multipart/form-data">
                    
                        <div class="form-group">
                            <input type="text"
                            class="form-control"
                            name="reference" required autocomplete="off" placeholder="Réference" id="">
                        </div>
                        <div class="form-group">
                            <input type="text" autocomplete="off" class="form-control" name="Designation"
                            placeholder="Designation" id="">
                        </div>
                        <div class="form-group">
                            <input type="number" autocomplete="off" class="form-control" name="Quantité"
                            placeholder="Quantité" id="">
                        </div>
                        <div class="form-group">
                            <input type="number" autocomplete="off" class="form-control" name="Prix"
                            placeholder="Prix" id="">
                        </div>
                        <div class="form-group">
                            <input type="number" autocomplete="off" class="form-control" name="Tva"
                            placeholder="Tva" id="">
                        </div>
                        <div class="form-group">
                            <input type="number" autocomplete="off" class="form-control" name="Remise"
                            placeholder="Ancien Prix" id="">
                        </div>
                        <div class="form-group">
                           <select class="form-control" name="categorie" id="">
                           <?php foreach($categories as $category) :?>
                           <option value="<?php echo $category->code_cat;?>">
                           <?php echo $category->nom;?>
                           </option>
                           <?php endforeach?>

                           </select>
                        </div>
                        <div class="form-group">
                            <textarea row="5" clos="20" autocomplete="off" class="form-control" name="Description"
                            placeholder="Description" id=""></textarea>
                        </div>
                        <div class="form-group">
                            <input type="file"  class="form-control" name="photo">
                            <!--<div class="form-group">
                            <input type="text" autocomplete="off" class="form-control" name="photo"
                            placeholder="photo" id="">-->
                        </div>
                        </div>
                        <div class="form-group">
                            <button name="submit" class="btn btn-primary">
                                Ajouter
                            </button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
</div>