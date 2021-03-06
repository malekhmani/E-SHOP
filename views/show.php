
<?php


require_once('includes\header.php');
 
  
?>
<div class="container">
    <div class="row my-5">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12 mb-2">
                    <div class="card h-100 bg-white rounded p-2">
                        <div class="card-header bg-light">
                            <h3 class="card-title">
                                <?php
                                    echo $products->designation;
                                ?>
                            </h3>
                        </div>
                        <div class="card-img-top">
                            <img width="100%"
                             src="../images/<?php echo $products->photo?>" alt="" class="img-fluid rounded">
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <?php
                                    echo $products->description;
                                ?>
                            </p>
                        </div>
                        <?php
                                   if( $products->remise!=0):
                                ?>
                        <div class="card-footer">
                            <span class="badge badge-danger p-2">
                                <?php
                                    echo $products->remise;
                                ?>DT
                            </span>
                             <span class="badge badge-dark p-2">
                                <strike>
                                    <?php
                                        echo $products->prix;
                                    ?>DT
                                </strike>
                            </span>
                        </div>
                        <?php
                                   else:
                                ?>
                              <div class="card-footer"> 
                            <span class="badge badge-danger p-2">
                                <?php
                                    echo $products->prix;
                                ?>DT
                            </span>
                            </div>
                            
                            
                                <?php
                                   endif;
                                ?>
                            
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <h3 class="text-secondary m-3 text-center">
                Qt?? :
            </h3>
            <form method="get" action="index.php">
                <div class="form-group">
                    <input type="number" name="product_qte" id="product_qte" class="form-control" value="1">
                    <input type="hidden" name="product_title" value="<?php echo $products->designation;?>">
                    <input type="hidden" name="ref_p" value="<?php echo $products->ref_p;?>">
                    <input type="hidden" name="qte_stock" value="<?php echo $products->qte_stock;?>">
                    <input type="hidden" name="prix" value="<?php echo $products->prix;?>">
                    <input type="hidden" name="photo" value="<?php echo $products->photo;?>">

                </div>
                <div class="form-group">
                    <input type='hidden' name='action' value='checkout' >
                    <input type='hidden' name='controller' value='ProductController' >
                    <input type="submit" class="btn btn-primary" name ="panier" value="Ajouter au panier">
                </div>
            </form>
        </div>
    </div>
</div>
<?php require_once('includes\footer.php');?>
