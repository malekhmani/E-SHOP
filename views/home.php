<?php
require_once('includes\header.php');

require_once('..\controllers\routeur.php');

    if(isset($_GET['result'])){
        $result=$_GET['result'];
        if($result=="cmdsucces"){
            include_once('includes/alerts/commandesucces.php');
        }    
        elseif($result=="con"){
            include_once('includes/alerts/signupsucces.php');

        }elseif($result=="deconnexion"){
            include_once('includes/alerts/deconnexion.php');
 
        }
        elseif($result=="qte"){
            include_once('includes/alerts/qtedispo.php');}

}  
?>
<div class="product-area section">
<?php //print_r($_SESSION);?>
            <div class="container">
				<div class="row">
					<div class="col-12">
						<div class="section-title">
							<h2>Trending Item</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="product-info">
							<div class="nav-main">
								<!-- Tab Nav -->
								<ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <?php foreach($categories as $category) :?>
									<li class="nav-item"><a class="nav-link" data-toggle="tab"  href="index.php?action=getProductsByCategory&&controller=ProductController&&id=<?php echo $category->code_cat;?>" role="tab"><?php echo $category->nom;?></a></li>
							       <?php endforeach ?>
								</ul>
								<!--/ End Tab Nav -->
							</div>
							<div class="tab-content" id="myTabContent">
								<!-- Start Single Tab -->
								<div class="tab-pane fade show active" id="man" role="tabpanel">
									<div class="tab-single">
										<div class="row">
                                        <?php foreach($products as $product) :?>
											<div class="col-xl-3 col-lg-4 col-md-4 col-12">
												<div class="single-product">
													<div class="product-img">
														<a href="index.php?action=getProduct&&controller=ProductController&&ref_p=<?php echo $product->ref_p;?>">
															<img class="default-img" src="../images/<?php echo $product->photo?>">
														</a>
														<div class="button-head">
															<div class="product-action">
																<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
																<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
																<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
															</div>
															<div class="product-action-2">
																<a title="Add to cart" href="index.php?action=getProduct&&controller=ProductController&&ref_p=<?php echo $product->ref_p;?>">Add to cart</a>
															</div>
														</div>
													</div>
													<div class="product-content">
														<h3><a href="index.php?action=getProduct&&controller=ProductController&&ref_p=<?php echo $product->ref_p;?>"><?php echo $product->designation; ?></a></h3>
														<div class="product-price">
															<span><?php echo $product->prix;?>DT</span>
														</div>
													</div>
												</div>
											</div>
											<?php endforeach; ?>
						
										</div>
									</div>
								</div>
								<!--/ End Single Tab -->
								
							</div>
						</div>
					</div>
				</div>
            </div>
    </div>
    <div class="product-area most-popular section">
        <div class="container">
            <div class="row">
				<div class="col-12">
					<div class="section-title">
						<h2>Hot Item</h2>
					</div>
				</div>
            </div>
            <div class="row">
            

                <div class="col-12">
                    <div class="owl-carousel popular-slider">
                    <?php foreach($solde as $product) :?>
						<!-- Start Single Product -->
						<div class="single-product">
							<div class="product-img">
								<a href="index.php?action=getProduct&&controller=ProductController&&ref_p=<?php echo $product->ref_p;?>">
                                <img class="default-img" src="../images/<?php echo $product->photo?>">
									<span class="out-of-stock">Hot</span>
								</a>
								<div class="button-head">
									<div class="product-action">
										<a data-toggle="modal" data-target="#exampleModal" title="Quick View" href="#"><i class=" ti-eye"></i><span>Quick Shop</span></a>
										<a title="Wishlist" href="#"><i class=" ti-heart "></i><span>Add to Wishlist</span></a>
										<a title="Compare" href="#"><i class="ti-bar-chart-alt"></i><span>Add to Compare</span></a>
									</div>
									<div class="product-action-2">
										<a title="Add to cart" href="index.php?action=getProduct&&controller=ProductController&&ref_p=<?php echo $product->ref_p;?>">Add to cart</a>
									</div>
								</div>
							</div>
							<div class="product-content">
								<h3><a href="index.php?action=getProduct&&controller=ProductController&&ref_p=<?php echo $product->ref_p;?>"><?php echo $product->designation;?></a></h3>
								<div class="product-price">
									<span class="old"><?php echo $product->prix;?>DT</span>
									<span><?php echo $product->remise;?>DT</span>
								</div>
							</div>
						</div>
						<!-- End Single Product -->
						
						<!-- End Single Product -->
						<!-- Start Single Product -->
						<?php
                    endforeach;
                ?>
						<!-- End Single Product -->
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!-- End Most Popular Area -->


<?php require_once('includes\footer.php');?>


