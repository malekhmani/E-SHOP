
<?php require_once('C:\xampp\htdocs\tppr\views\includes\header.php'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 bg-white">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>Produit</th>
                        <th>Prix</th>
                        <th>Quantité</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($_SESSION as $name => $product) :?>
                    <?php if(substr($name,0,9) == "products_"):?>
                    <tr>
                        <td><?php echo $product["title"];?></td>
                        <td><?php echo $product["price"];?></td>
                        <td><?php echo $product["qte"];?></td>
                        <td><?php echo $product["total"];?> DT</td>
                        <td>
                            <form method="get" action="index.php">
                                <input type="hidden" name="product_id" value="<?php echo $product["id"];?>">
                                <input type="hidden" name="product_price" value="<?php echo $product["total"];?>">
                                <input type='hidden' name='action' value='emptyCart'>
                                <input type='hidden' name='controller' value='ProductController'>
                                <button type="submit" name="cancel" class="btn btn-sm btn-danger text-white font-weight-bold p-1">
                                    &times;
                                </button>
                            </form>
                        </td>
                    </tr>
                    <?php endif;?>
                    <?php endforeach;?>
                </tbody>
            </table>
               <!-- <?php// if(isset($_SESSION["count"]) && $_SESSION["count"] > 0 && isset($_SESSION["logged"])):?>
                    <div id="paypal-button-container"></div>-->
                <?php if(isset($_SESSION["count"]) && $_SESSION["count"] > 0 && (!isset($_SESSION["logged"]))):?>
                    <a href="http://localhost:82/tppr/views/login.php" class="btn btn-link">Connectez vous pour terminer vos achats</a>
                <?php endif;?>
        </div>
        <div class="col-4 col-md-4 float-right bg-white">
           <table class="table table-bordered">
               <tbody>
                   <tr>
                       <th scope="row">Produits</th>
                       <td>
                        <?php echo isset($_SESSION["count"]) ? $_SESSION["count"] : 0;?>
                       </td>
                   </tr>
                   <tr>
                       <th scope="row">Total TTC</th>
                       <td>
                            <strong id="amount" data-amount="<?php echo $_SESSION["totaux"];?>">
                                <?php echo isset($_SESSION["totaux"]) ? $_SESSION["totaux"] : 0;?> <span class="bb-danger">dh</span>
                            </strong>
                       </td>
                   </tr>
               </tbody>
           </table>
            <?php if(isset($_SESSION["count"]) && $_SESSION["count"] > 0):?>
                <form method="post" action="index.php?action=cancelcart&&controller=ProductController">
                    <button type="submit" class="btn btn-primary">
                        Vider le panier
                    </button>
                </form>
                <form method="post" id="addOrder" action="index.php?action=addOrder&&controller=OrdersController">
                    <button type="submit" class="btn btn-primary">
                    payer ici
                    </button>
                </form>
            <?php endif;?>
        </div>
    </div>
</div>
