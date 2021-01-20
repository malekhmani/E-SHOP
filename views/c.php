<?php require_once('includes\header.php');
	require_once('..\controllers\ProductController.php');

	//$products = new ProductController();
//$products = $products->getp();

?> 


<section class="product-area shop-sidebar shop section">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-4 col-12">
						<div class="shop-sidebar">
								<!-- Single Widget -->
								<div class="single-widget category">
									<h3 class="title">Categories</h3>
									<ul class="categor-list">
                                    <?php foreach($categories as $category) :?>
                                        <li><a href="index.php?action=getpc&&controller=ProductController&&id=<?php echo $category->code_cat;?>" role="tab"><?php echo $category->nom;?></a></li>
                                        <?php endforeach ?>
									
									</ul>
								</div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-12">

                <div class="row">
                    <?php foreach($products as $product) :?>
							<div class="col-lg-4 col-md-6 col-12">
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
															<span><?php echo $product->prix;?>dh</span>
														</div>
													</div>
												</div>
											</div>
											<?php endforeach; ?>
						
								</div>
							</div>
				</div>
            </div>
         </div>
</section>

    <?php require_once('includes\footer.php'); 
