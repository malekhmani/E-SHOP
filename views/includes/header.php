<!--<!DOCTYPE HTML>
<html>
	<head>
    <title> Mon Boutique E-commerce</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	
	<link type="text/css" rel="stylesheet" href="css/style.css" />
	</head>
	<body>
    <?php //include("navbar.php"); ?>
   <div class="row">
   
   
    </div>
    </div>
    </body>-->
	<?php session_start();
	
if(!isset($_SESSION["admin"]) OR (isset($_SESSION["logged"]) AND($_SESSION["nom"]!='admin')) ):  
		require_once('..\controllers\CategoriesController.php');
	$categories = new CategoriesController();
$categories = $categories->getAllCategorie();
endif;	
?>
	<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>Eshop</title>
	<!-- Favicon -->
	
	<link rel="icon" type="image/png" href="../images/favicon.png">
	
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="css/magnific-popup.min.css">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.css">
	<!-- Fancybox -->
	<link rel="stylesheet" href="css/jquery.fancybox.min.css">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="css/themify-icons.css">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="css/niceselect.css">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="css/animate.css">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="css/flex-slider.min.css">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="css/owl-carousel.css">
	<!-- Slicknav -->
    <link rel="stylesheet" href="css/slicknav.min.css">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

	
	
</head>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	
	<!-- Header -->
	<header class="header shop">
	
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
						
							<a href="index.html"><img src="../images/logo.png" alt="logo"></a>
						
							

						</div>
						<!--/ End Logo -->
						
					
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
		<div class="header-inner">
			<div class="container">
				<div class="cat-nav-head">
					
						<div class="col-lg-9 col-12">
							<div class="menu-area">
								<!-- Main Menu -->
								<nav class="navbar navbar-expand-lg">
									<div class="navbar-collapse">	
										<div class="nav-inner">	
											<ul class="nav main-menu menu navbar-nav">
                                            <?php if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true):?>
            <li><a href="dash.php?r=o">Admin</a></li>
			<?php if((isset($_GET["r"])) &&($_GET["r"]==='o') ):?>
            <li><a href="index.php?action=logout&&controller=AdminController">Deconnexion</a></li>
			<?php endif;?>
             <?php else:?>
													<li class="active"><a href="index.php">Home</a></li>
													<li><a href="index.php?action=getp&&controller=ProductController">Products</a></li>												
													
													<li><a href="#">Categorie</a>
														<ul class="dropdown">
                                                        <?php foreach($categories as $category) :?>
															<li><a href="index.php?action=getProductsByCategory&&controller=ProductController&&id=<?php echo $category->code_cat;?>"><?php echo $category->nom;?></a></li>
															<?php endforeach?>
														</ul>
													</li>
                                                    <?php if(!isset($_SESSION["logged"])):?>
													<li><a href="login.php">Login</a></li>									
													<li><a href="register.php">Register</a>
                                                    <?php endif;?>
													<?php if(isset($_SESSION["logged"]) && $_SESSION["logged"] === true):?>	
                                                        <li><a href="./index.php?action=logout&&controller=UsersController">Deconnexion</a></li>
                                                        <?php endif;?>
													</li>
													<li>
								<a href="cart.php" class="single-icon">Cart<i class="ti-bag"></i> <span class="total-count"> <?php if(isset($_SESSION["count"]) && $_SESSION["count"] > 0):?>
            <?php echo  '<span style="
                background: #ff4c4f;
                position:relative;
                top: 0px;
                left:0px;" class="badge badge-notify">';
                echo $_SESSION["count"];?>
          <?php endif;?></span></a></li>
                     <li><a href="contact.php">Contact</a></li>												


          <?php endif;?>
        
          

												</ul>
										</div>
									</div>
								</nav>
								<!--/ End Main Menu -->	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--/ End Header Inner -->
	</header>