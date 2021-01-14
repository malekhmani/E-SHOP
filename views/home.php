<?php

define('BASE_URL','http://localhost:82/tppr/views/');
require_once('C:\xampp\htdocs\tppr\controllers\ProductController.php');
require_once('C:\xampp\htdocs\tppr\controllers\CategoriesController.php');
require_once('C:\xampp\htdocs\tppr\controllers\routeur.php');

require_once('C:\xampp\htdocs\tppr\models\product.php');

//echo "hoommme";
//$data= new ProductController();
//$products=$data->getALLProducts();

//print_r($products);

    //$categories = new CategoriesController();
    /*$categories = $categories->getAllCategories();
    /*if(isset($_POST["code_cat"])){
        $products = new ProductController();
        $products = $products->getProductsByCategory($_POST['code_cat']);

        
    }/*else{
        $data = new ProductController();
        $products = $data->getAllProducts();
    }*/
   // $products = new ProductController();
    //$products = $data->getAllProducts();
    
?>
<div class="container">
    <div class="row my-5">
        <div class="col-md-8">
            <div class="row">
                <?php
                    if(count($products) > 0) :
                       // print_r($_SESSION);
                ?>
                <?php
                    foreach($products as $product) :
                ?>
                <div class="col-md-4 mb-3">
                    <div class="card h-100 bg-white rounded p-2">
                        <div class="card-header bg-light">
                       <!-- <form id="form" method="post" action="<?php //echo BASE_URL;?>show.php">
                                <input type="hidden" name="ref_p" id="ref_p">
                            </form>
                            <h3 onclick="submitForm(<?php// echo $product['ref_p'];?>)" class="card-title">-->
                           
                             <a href="index.php?action=getProduct&&controller=ProductController&&ref_p=<?php echo $product->ref_p;?>" class="card-title">
                                <?php
                                    echo $product->designation;
                                ?>
                            
                            </h3>
                        </div>
                        <a href="#" class="prod-img">
								<img src="../images/<?php echo $product->photo?>" class="img-fluid" alt="">
							</a>
                        <!--<div class="card-img-top">
                            <img src="./images/<?php echo $product->designation?>" alt="" class="img-fluid">
                        </div>-->
                        <div class="card-body">
                            <p class="card-text">
                                <?php
                                    echo substr($product->description,0,100)."....";
                                ?>
                            </p>
                        </div>
                        <div class="card-footer">
                      
                            <span class="badge badge-danger p-2 text-center bg-info block text-white">
                                <?php
                                    echo $product->prix;
                                ?>dh
                            </span>
                             <span class="badge badge-dark p-2 badge badge-danger p-2 text-center bg-info block text-red ">
                                <strike>
                                    <?php
                                        echo $product->remise;
                                    ?>dh
                                </strike>
                            </span>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach;
                ?>
                <?php
                    else :
                ?>
                <div class="alert alert-info">
                    aucun produit trouvé
                </div>
                <?php
                    endif;
                ?>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="text-secondary m-3 text-center">
                Catégories
            </h3>
            <ul class="list-group">
                <?php
                    foreach($categories as $category) :
                ?>
                    
                    <li class="list-group-item text-center">
                        <!--<form id="catPro" method="post" action="">
                            <input type="hidden" name="code_cat" id="code_cat">
                        </form>-->
                        <a href="index.php?action=getProductsByCategory&&controller=ProductController&&id=<?php echo $category->code_cat;?>" class="btn btn-link text-secondary" style="text-decoration:none;font-size:24px;cursor:pointer">
                            <?php
                                echo $category->nom;
                                echo $category->code_cat;
                            ?>
                          
                            
                            
                            
                        </a>
                    </li>
                <?php
                    endforeach;
                ?>
            </ul>
        </div>
    
    </div>
</div>
<script>
function submitForm($id) {
    const input = document.querySelector("#ref_p");
    const form = document.querySelector("#form");
    input.value = $id;
    form.submit();
  }
  </script>