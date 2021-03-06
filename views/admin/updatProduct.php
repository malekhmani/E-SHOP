<?php
require_once('includes\header.php');
?>
<div class="container">
    <div class="row my-4">
        <div class="col-md-6 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        Modifier un produit
                    </h3>
                </div>
                <div class="card-body">
                    <form method="post"  action="index.php?action=updateProduct&&controller=AdminController" class="mr-1" enctype="multipart/form-data">
                    
                        <div class="form-group">
                            <input readonly type="text"
                            class="form-control"
                            name="reference" required autocomplete="off" placeholder="Réference" id="" 
                            value="<?php echo $productToUpdate->ref_p;?>">
                        </div>
                        <div class="form-group">
                            <input type="text" autocomplete="off" class="form-control" name="Designation"
                            placeholder="Designation" id=""value="<?php echo $productToUpdate->designation;?>">
                        </div>
                        <div class="form-group">
                            <input type="number" autocomplete="off" class="form-control" name="Quantité"
                            placeholder="Quantité" id=""value="<?php echo $productToUpdate->qte_stock;?>">
                        </div>
                        <div class="form-group">
                            <input type="number" autocomplete="off" class="form-control" name="Prix"
                            placeholder="Prix" id=""value="<?php echo $productToUpdate->prix;?>">
                        </div>
                        <div class="form-group">
                            <input type="number" autocomplete="off" class="form-control" name="Tva"
                            placeholder="Tva" id=""value="<?php echo $productToUpdate->tva;?>">
                        </div>
                        <div class="form-group">
                            <input type="number" autocomplete="off" class="form-control" name="Remise"
                            placeholder="Ancien Prix" id=""value="<?php echo $productToUpdate->remise;?>">
                        </div>
                        <div class="form-group">
                        <div class="form-control" > <?php foreach($categories as $category) :?>
                            <label><input type="checkbox" name="categorie" id="" value="<?php echo $category->code_cat;?>"><?php echo $category->nom;?>
                              </label><?php endforeach?>
                        </div>
                        </div>
                        <!--
                        <div class="form-group">
                           <select class="form-control" name="categorie" id="">
                           <?php //foreach($categories as $category) :?>
                           <option value="<?php //echo $category->code_cat;?>">
                           <?php //echo $category->nom;?>
                           </option>
                           <?php //endforeach?>

                           </select>
                        </div>-->
                        <?php //echo substr($product->description,0,50)."....";?>
                        <div class="form-group">
                            <textarea row="5" clos="20" autocomplete="off" class="form-control" name="Description"
                            placeholder="Description" id=""> <?php echo $productToUpdate->description;?></textarea>
                        </div>
                        <input type="hidden"
                            name="ref_p"
                            value="<?php echo $productToUpdate->ref_p;?>">
                        <input type="hidden" name="product_current_image"
                            value="<?php echo $productToUpdate->photo;?>">
                        
                        <div class="form-group">
                            <img src="admin/images/<?php echo $productToUpdate->photo;?>" width="200" height="200" alt="" class="img-fluid rounded">
                        </div>
                         <div class="form-group">
                            <input type="file"
                            class="form-control" name="photo" >
                        </div>
                        <div class="form-group">
                            <button name="submit" class="btn btn-primary">
                                Valider
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once('includes\footer.php');?>
