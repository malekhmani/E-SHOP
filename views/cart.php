
<?php require_once('C:\xampp\htdocs\tppr\views\includes\header.php'); 
if(isset($_GET['result'])){
    $result=$_GET['result'];
    if($result=="produitexiste"){
        include_once('includes/alerts/produitexiste.php');
}}    


?>
<div class="shopping-cart section">
<div class="container">
    <div class="row">
    <div class="col-12">
        <table class="table shopping-summery">
                <thead>
                <tr class="main-hading">
                       <th>Produit</th>
                        <th>Name</th>
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
                        <td class="image" data-title="No"><img src="../images/<?php echo $product["photo"]?>" alt="#"></td>
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
              
        </div>
        </diV>
        <div class="row">
				<div class="col-12">
					<!-- Total Amount -->
					<div class="total-amount">
						<div class="row">
							<div class="col-lg-8 col-md-5 col-12">
								<div class="left">
									<div class="coupon">
                                    <?php if(isset($_SESSION["count"]) && $_SESSION["count"] > 0 && (!isset($_SESSION["logged"]))):?>
                
										<form action="#" target="_blank">
											
											<button class="btn">Connectez vous pour terminer vos achats</button>
										</form>
                                        <?php endif;?>
									</div>
								
								</div>
							</div>
							<div class="col-lg-4 col-md-7 col-12">
								<div class="right">
									<ul>
										<li class="last">Produit <span><?php echo isset($_SESSION["count"]) ? $_SESSION["count"] : 0;?></span></li>
                                        <li class="last">You Pay<span><strong id="amount" data-amount="<?php echo $_SESSION["totaux"];?>">
                                <?php echo isset($_SESSION["totaux"]) ? $_SESSION["totaux"] : 0;?> <span class="bb-danger">dh</span>
                            </strong></li>

									</ul>
									<div class="button5">
                                    <a href="index.php" class="btn">Continue shopping</a>
                                    <?php if(isset($_SESSION["count"]) && $_SESSION["count"] > 0):?>
										<a href="index.php?action=addOrder&&controller=OrdersController" class="btn">Checkout</a>
										
                                        <a href="index.php?action=cancelcart&&controller=ProductController" class="btn">Cancel Shopping</a>
                                        <?php endif;?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--/ End Total Amount -->
				</div>
			</div>
		</div>
	</div>
  
<?php require_once('C:\xampp\htdocs\tppr\views\includes\footer.php');?>
